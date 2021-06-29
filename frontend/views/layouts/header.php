<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\User;
use yii\bootstrap\Modal;
use common\models\Category;
use common\models\UserProfile;



$nameRole = null;
$id = Yii::$app->user->identity == null ? null : Yii::$app->user->identity->id;
if($id != null) {
    $modelProfile = UserProfile::findOne($id);
}
$nameCurrentUser = Yii::$app->user->identity == null ? null : Yii::$app->user->identity->username;
foreach ( Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()) as $key => $value) {
    if ($key != 'guest' && $key != 'user') {
        $nameRole = $value->name;
    }
}



?>
<header class="header">
    <div class="top-header topmenu custommenu">
        <div class="container">
            <nav class="navbar navbar-light">
                <ul class="list-topmenu">
                    <!-- <li><a href="/tim-cong-su/cac-loai-tuyen-dung-khac.html">Các vị trí tìm cộng sự</a></li> -->
                    <li><a href="#" class="">Đã được chứng nhận bởi hơn một triệu người chơi, là trang giải trí trực tuyến có thực lực nhất hiện nay!!</a></li>
                </ul>

                <div class="box-right-header">
                    <div class="show-sm icon-user-mobile">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="hidden-sm dropdown-header-mobile flex flex-jc-between flex-ai-center" id="div-login">
                            <div class="box-join-header box-default-header">
                                <a class="txt-name get-border-text" href="#" data-toggle="modal" data-target="#modalUserInfo">Đăng nhập</a></li>
                            </div>
                            <div class="box-user-header dropdown box-default-header">
                                <a class="txt-name get-border-text-2" href="#" data-toggle="modal" data-target="#modalUserInfo">Đăng ký</a></li>
                            </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="top-header <?= Yii::$app->controller->id == 'site' ? 'no-border-bottom' : '' ?>">
        <div class="container">
            <nav class="navbar navbar-light">
                <a class="navbar-brand" href="<?= Url::toRoute(['site/index']); ?>"><img src="/images/logo.png" width="" height="" alt="Logo"></a>

                <div class="main-menu navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon d-flex align-items-center justify-content-center"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="text-center show-mobile logo-mobile">
                            <a href="#"><img src="/images/logo.png" width="" height="" alt="Logo"></a>
                        </div>

                        <a href="#" class="button-adv show-mobile"><i class="far fa-search-plus"></i>Advanced search</a>

                        <ul class="nav justify-content-center w-100pc flex-ai-center">
                            <li class="nav-item <?= Yii::$app->controller->id == 'art-gallery' ? 'active' : null ?>">
                                <div class="d-flex flex-ai-center">
                                    <a class="nav-link change-images"  href="/">
                                        <span class="text">Trang chủ</span>
                                    </a>
                                    <span class="icon-toggle-menu hidden-md"></span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="d-flex flex-ai-center">
                                    <a class="nav-link change-images" href="#">
                                        <span class="text">Hướng dẫn</span>
                                    </a>
                                    <span class="icon-toggle-menu hidden-md"></span>
                                </div>
                                
                            </li>
                            <li class="nav-item" >
                                <a class="nav-link change-images" href="#">
                                    <span class="text">Link vào kubet- ku casino</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <div class="d-flex flex-ai-center">
                                    <a class="nav-link change-images" href="#">
                                        <span class="text">Sổ xố</span>
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item nav-item-blog ">
                                <a class="nav-link change-images" href="/">
                                    <span class="text">Thể thao</span>
                                </a>
                                
                            </li>
                            <li class="nav-item nav-item-blog ">
                                <a class="nav-link change-images" href="/">
                                    <span class="text">Ku Casino</span>
                                </a>
                                
                            </li>
                            <li class="nav-item nav-item-blog ">
                                <a class="nav-link change-images" href="/">
                                    <span class="text">Sổ xố ưu đãi</span>
                                </a>
                            </li>
                        </ul>

                        <ul class="box-share-header show-mobile">
                            <li><a href="#"><i class="fab fa-pinterest-square"></i></a> </li>
                            <li><a href="#"><i class="fab fa-facebook-square"></i></a> </li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a> </li>
                        </ul>

                        <div class="top-header topmenu show-mobile">
                            <ul class="d-block">
                                <!-- <li><a href="/tim-cong-su/cac-loai-tuyen-dung-khac.html">Các vị trí tìm cộng sự</a></li> -->
                                <li><a class="in_development">Hỏi chuyên gia</a></li>
                                <li><a class="in_development">Viết đánh giá</a></li>
                                <li><a class="in_development">Bảo đảm AGOhomestyle</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
