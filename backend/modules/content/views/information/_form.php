<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\web\JsExpression;
use rmrevin\yii\fontawesome\FAS;

/**
 * @var yii\web\View $this
 * @var common\models\Article $model
 * @var common\models\ArticleCategory[] $categories
 */
?>

<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => true,
]) ?>
    <div class="card">
        <div class="card-body">
            <?php echo $form->errorSummary($model) ?>
            <?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="card-footer">
            <?php echo Html::submitButton(
                $model->isNewRecord? FAS::icon('save').' '.Yii::t('backend', 'Tạo mới'):FAS::icon('save').' '. Yii::t('backend', 'Lưu thay đổi'),
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
            ) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
