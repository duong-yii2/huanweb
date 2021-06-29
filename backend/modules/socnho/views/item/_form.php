<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\socnho\components\RouteRule;
use backend\modules\socnho\AutocompleteAsset;
use yii\helpers\Json;
use backend\modules\socnho\components\Configs;

/* @var $this yii\web\View */
/* @var $model backend\modules\socnho\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
/* @var $context backend\modules\socnho\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$rules = Configs::authManager()->getRules();
$roles = Configs::authManager()->getRoles();

unset($rules[RouteRule::RULE_NAME]);
$source = Json::htmlEncode(array_keys($rules));
$sourceParentName = Json::htmlEncode(array_keys($roles));

$paramParent = Yii::$app->request->get();
// echo "<pre>";print_r($paramParent);die;
$js = <<<JS
    $('#rule_name').autocomplete({
        source: $source,
    });    
    $('#role-parent_name').autocomplete({
        source: $sourceParentName,
    });

JS;
AutocompleteAsset::register($this);
$this->registerJs($js);
?>

<div class="auth-item-form">
    <?php $form = ActiveForm::begin(['id' => 'item-form']); ?>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

            <?php if (isset($paramParent['parent_name'])): ?>
                <?php $modelRole->parent_name = $paramParent['parent_name']; ?>
            <?php endif ?>

            <?= $form->field($modelRole, 'parent_name')->textInput(['maxlength' => 64]) ?>

            <?= $form->field($modelRole, 'code_role')->textInput(['maxlength' => 64]) ?>

<!--            --><?//= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
        </div>
        <div class="col-sm-12">
<!--            --><?//= $form->field($model, 'ruleName')->textInput(['id' => 'rule_name']) ?>
<!---->
<!--            --><?//= $form->field($model, 'data')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="form-group">
        <?php
        echo Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
            'name' => 'submit-button'])
        ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
