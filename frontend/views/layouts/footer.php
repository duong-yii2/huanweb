<?php

use common\models\Information;
use backend\models\UserForm;
use common\models\Category;
use common\models\CompanyInformation;
use common\models\TCountries;
use kartik\select2\Select2;
use kekaadrenalin\recaptcha3\ReCaptchaWidget;
// use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

// $companyInfo = CompanyInformation::find()->one();

// $listNameCol = Category::getAllFooterFrontEnd();
// $dataCountries = TCountries::getCountries();
$model = new Information();

?>
<footer class="footer">
    <div class="content-footer">
        <div class="container">
            <div class="main-content-footer d-flex flex-wrap justify-content-between">
                <div class="left-content-footer">
                    <a href="#" class="logo-footer">
                        <img src="/images/logotrang.png" alt="" width="" height="">
                    </a>
                    <p class="text">Bản Quyền Thuộc Về 2021 © KUBET.TOP </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Modal Register New-->
<div class="modal fade" id="modalUserInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Đăng ký</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'form-register', 'enableAjaxValidation' => true,'validationUrl' => Url::toRoute(['site/validate-register'])]) ?>
        <div class="form-group">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'input-form input-form-round-sm input-form-sm1']) ?>
        </div>

        <div class="form-group">
            <?= $form->field($model, 'phone_number')->textInput(['class' => 'input-form input-form-round-sm input-form-sm1','onkeypress' => 'validate(event)']) ?>
        </div>

        <a href="#" class="button button-type01 button-regiter-information w-100 button-rounded-sm button-md-3 fw-700 text-transform">Đăng ký ngay</a>
        <?php ActiveForm::end() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
$urlGetInformation = \yii\helpers\Url::to(['site/register']);
$js = <<<JS
$('.button-regiter-information').on('click', function(event) {
        let phone_number = $('#information-phone_number').val();
        let email  = $('#information-email').val()
        $.ajax({
            url: '$urlGetInformation',
            data: {
                phone_number : phone_number,
                email : email
            },
            type: 'post',
            success: function(data) {
                if (data.status == 200) {
                    $('#modalUserInfo').modal('hide');
                    swal("Thành công", "Cảm ơn bạn đã đăng ký!", "success");
                } else {
                    swal("Thất bại", "Vui lòng kiểm tra lại thông tin!", "warning");
                }
            },
        });
        return false;
    });

JS;

$this->registerJs($js)
?>
