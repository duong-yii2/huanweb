<?php

use backend\modules\socnho\AnimateAsset;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\YiiAsset;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\socnho\models\AuthItem */
/* @var $context backend\modules\socnho\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
    'items' => $model->getItems(),
]);

$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';

$css = <<<CSS
    td.level-2{
        padding-left: 20px !important;
    }
    td.level-3 label{
        padding-right: 20px !important;
    }
CSS;
$this->registerCss($css);
?>
<div class="auth-item-view">
    <h1><?= Html::encode($this->title); ?></h1>
    <p>
        <?= Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']); ?>
        <?= Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('rbac-admin', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]); ?>
        <?= Html::a(Yii::t('rbac-admin', 'Create'), ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <div class="row">
        <div class="col-sm-11">
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
//        'description:ntext',
//        'ruleName',
//        'data:ntext',
                ],
                'template' => '<tr><th style="width:25%">{label}</th><td>{value}</td></tr>',
            ]);
            ?>
        </div>
    </div>
    <?php $form = ActiveForm::begin(['id' => 'item-form']); ?>
    <div class="row">
        <div class="col-sm-12">
            <table id='permissionTable' class='table table-condensed table-striped table-hover table-bordered'>
                <?php
                if (!empty($allRoute)) {
                    foreach ($allRoute as $k => $v) {
                        $k_ = strtoupper($k);
                        if ($k == '*') {
                            $is_checked = in_array($v, $allAssigned) ? ' checked' : '';
                            echo "<tr><td colspan='2'><label><input name='routes[]' class='all' type='checkbox' value='{$v}'{$is_checked}> ALL</label></td></tr>";
                        } else
                            echo "<tr><td colspan='2'><label>{$k_}</label></td></tr>";

                        if (!empty($v) && is_array($v)) {
                            $html = '';
                            foreach ($v as $k1 => $v1) {

                                if (!empty($v1) && is_array($v1)) {
                                    $is_checked = in_array($v1, $allAssigned) ? ' checked' : '';
                                    if ($k1 == '*') {
                                        $k1 = 'All ' . $k;
                                        echo "<tr><td class='level-2' colspan='2'><label><input name='routes[]' type='checkbox' class='all_{$k1}' value='{$v1}'{$is_checked}> " . ucfirst($k1) . "</label></td>";
                                    } else {
                                        echo "<tr class='all_{$k}'><td class='level-2'><label>" . ucfirst($k1) . "</label></td>";
                                    }

                                    echo "<td class='level-3 all_{$k1}'>";
                                    foreach ($v1 as $k2 => $v2) {
                                        $is_checked = in_array($v2, $allAssigned) ? ' checked' : '';
                                        if ($k2 == '*') {
                                            $k2 = 'All ';
                                            echo "<label><input name='routes[]' type='checkbox' class='all_{$k1}' value='{$v2}'{$is_checked}> {$k2}</label>";
                                        } else {
                                            echo "<label><input name='routes[]' type='checkbox' class='{$k2}' value='{$v2}'{$is_checked}> {$k2}</label>";
                                        }
                                    }
                                    echo '</td></tr>';
                                } else {
                                    $is_checked = in_array($v1, $allAssigned) ? ' checked' : '';
                                    if ($k1 == '*') {
                                        $k1 = 'All ';
                                        $html .= "<label><input name='routes[]' type='checkbox' class='all_{$k}' value='{$v1}'{$is_checked}> {$k1}</label>";
                                    } else {
                                        $html .= "<label><input name='routes[]' type='checkbox' class='{$k1}' value='{$v1}'{$is_checked}> {$k1}</label>";
                                    }
                                }
                            }
                            if (!empty($html))
                                echo "<tr><td class='level-2'></td><td class='level-3 all_{$k}' colspan='2'>{$html}</td></tr>";
                        }
                    }
                }
                ?>
            </table>
        </div>
    </div>
    <?php if ($modelRole->field_permission != null): ?>
        <?php $dataPermission = json_decode($modelRole->field_permission); ?>
        <?php if (!empty($allField)): ?>
            <?php foreach ($allField as $key => $value): ?>
                <h4 class="name-modules"><?= $key ?></h4>
                <?php foreach ($value as $key1 => $oneField): ?>
                    <div class="one-row-field">
                        <p class="name-field"><?= $oneField ?></p>
                        <input type="hidden" value="<?= $oneField ?>"
                               name="PermissionField[<?= $key ?>][<?= $key1 ?>][name]">
                        <?php if (isset($dataPermission->$key->$key1->setting)): ?>
                            <input type="radio" name="PermissionField[<?= $key ?>][<?= $key1 ?>][setting]"
                                   value="hidden" <?= $dataPermission->$key->$key1->setting == 'hidden' ? 'checked' : null ?> >
                            <label for="male">Ẩn</label>

                            <input type="radio" name="PermissionField[<?= $key ?>][<?= $key1 ?>][setting]"
                                   value="read-only" <?= $dataPermission->$key->$key1->setting == 'read-only' ? 'checked' : null ?>>
                            <label for="female">Chỉ đọc</label>

                            <input type="radio" name="PermissionField[<?= $key ?>][<?= $key1 ?>][setting]"
                                   value="edit" <?= $dataPermission->$key->$key1->setting == 'edit' ? 'checked' : null ?>>
                            <label for="other">Chỉnh sửa</label>

                        <?php else: ?>
                            <input type="radio" name="PermissionField[<?= $key ?>][<?= $key1 ?>][setting]"
                                   value="hidden">
                            <label for="male">Ẩn</label>

                            <input type="radio" name="PermissionField[<?= $key ?>][<?= $key1 ?>][setting]"
                                   value="read-only">
                            <label for="female">Chỉ đọc</label>

                            <input type="radio" name="PermissionField[<?= $key ?>][<?= $key1 ?>][setting]" value="edit"
                                   checked>
                            <label for="other">Chỉnh sửa</label>
                        <?php endif; ?>
                    </div>
                <?php endforeach ?>
            <?php endforeach ?>
        <?php endif; ?>
    <?php else: ?>
        <?php if (!empty($allField)): ?>
            <?php foreach ($allField as $key => $value): ?>
                <h4 class="name-modules"><?= $key ?></h4>
                <?php foreach ($value as $key1 => $oneField): ?>
                    <div class="one-row-field">
                        <p class="name-field"><?= $oneField ?></p>
                        <input type="hidden" value="<?= $oneField ?>"
                               name="PermissionField[<?= $key ?>][<?= $key1 ?>][name]">
                        <input type="radio" name="PermissionField[<?= $key ?>][<?= $key1 ?>][setting]" value="hidden">
                        <label for="male">Ẩn</label>

                        <input type="radio" name="PermissionField[<?= $key ?>][<?= $key1 ?>][setting]"
                               value="read-only">
                        <label for="female">Chỉ đọc</label>

                        <input type="radio" name="PermissionField[<?= $key ?>][<?= $key1 ?>][setting]" value="edit"
                               checked>
                        <label for="other">Chỉnh sửa</label>
                    </div>
                <?php endforeach ?>
            <?php endforeach ?>
        <?php endif; ?>
    <?php endif ?>
    <div class="form-group static-button-form">
        <?php echo Html::submitButton(Yii::t('backend', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
