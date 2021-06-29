<?php

use backend\models\LoginForm;
use backend\models\UserForm;
use common\models\Category;
use common\models\CompanyInformation;
use common\models\TCountries;
use kartik\select2\Select2;
use kekaadrenalin\recaptcha3\ReCaptchaWidget;
// use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

// $companyInfo = CompanyInformation::find()->one();

// $listNameCol = Category::getAllFooterFrontEnd();
// $dataCountries = TCountries::getCountries();
$model = new UserForm();
$modelUserProfile = new \common\models\UserProfile();
$modelLogin = new LoginForm();

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
