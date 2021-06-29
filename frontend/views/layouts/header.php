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
                        <div class="box-contractors box-default-header">
                            <a href="#" class="box-text flex flex-ai-center">
                                <?php if (Yii::$app->user->isGuest): ?>
                                <!-- <div class="icon-notification box-icon-header">
                                    <span class="icon-default icon-user-plus"></span>
                                </div>
                                <span class="text in_development">Tham gia mạng lưới chuyên gia AGOpro</span> -->
                                <?php endif; ?>
                            </a>
                        </div>
                        <?php if (Yii::$app->user->isGuest): ?>
                            <div class="box-join-header box-default-header">
                                <a class="txt-name get-border-text" href="#" data-toggle="modal" data-target="#register">Đăng nhập</a></li>
                            </div>
                            <div class="box-user-header dropdown box-default-header">

                                <a class="txt-name get-border-text-2" href="#" data-toggle="modal" data-target="#login">Đăng ký</a></li>
                            </div>
                            <!--box-project-header-->
                        <?php else: ?>
                            <div class="box-premium-header box-default-header">
                                <span class="in_development">Dùng thử Premium 1 tháng</span>
                            </div>
                            <div class="box-notification-header dropdown box-default-header">
                                <div class="box-text dropdown-toggle flex flex-ai-center" id="dropdownNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="icon-notification box-icon-header">
                                        <span class="icon-default icon-notification-xs"></span>
                                        <span class="badge"></span>
                                    </div>
                                    <div class="icon-notification box-icon-header">
                                        <span class="fas fa-shopping-cart"></span>
                                        <span class="badge"></span>
                                    </div>
                                </div>
                            </div>
                            <!--box-notification-header-->
                            <div class="box-project-header dropdown box-default-header">
                                <div class="box-text dropdown-toggle flex flex-ai-center box-text-move-agopro" id="dropdownProject" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text in_development">Chuyển tới AGOpro</span>
                                </div>
                            </div>
                            <!--box-project-header-->

                            <div class="box-user-header dropdown box-default-header">
                                <div class="box-text dropdown-toggle flex flex-ai-center" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="box-icon-header">
                                        <div class="images-avatar">


                                            <img data-src="<?= $modelProfile->getAvarUser(); ?>" alt="" width="" height="" src="images/loadingimg.png" class="lazy">

                                        </div>
                                    </div>
                                    <span class="text"><i class="fas fa-chevron-down"></i></span>
                                </div>
                                <div class="dropdown-default dropdown-menu dropdown-menu-right" aria-labelledby="dropdownUser">
                                    <div class="main-user">
                                    <?php 
                                    if($nameRole == \common\models\User::ROLE_CONTRUCTOR){
                                        $url = Url::toRoute(['sign-in/profile-view-user-contructor','slug' => $nameCurrentUser]);
                                    } elseif ($nameRole == \common\models\User::ROLE_BASIC) {
                                        $url = Url::toRoute(['sign-in/profile-view-basic-user','slug' => $nameCurrentUser]);
                                    } else {
                                        $url = '';
                                    }
                                    ?>
                                        <a href="<?=$url?>" class="info-user flex flex-ai-center">
                                                <span class="images">
                                                <img data-src="<?= $modelProfile->getAvarUser(); ?>" alt="" width="" height="" src="images/loadingimg.png" class="lazy">
                                                </span>
                                            <div class="content">
                                                <h4 class="name">Agohomestyle</h4>
                                                <p class="txt-name"><?php echo Yii::$app->user->identity->username ?></p>
                                            </div>
                                        </a>

                                        <ul class="list-active-user">
                                            <?php if($nameRole == \common\models\User::ROLE_CONTRUCTOR): ?>
                                                <li><?= Html::a(Yii::t('frontend', 'Chỉnh sửa thông tin'), ['sign-in/profile-edit-user-contructor','slug' => $nameCurrentUser]) ?></li>
                                            <?php elseif($nameRole == \common\models\User::ROLE_BASIC): ?>
                                                <li><?= Html::a(Yii::t('frontend', 'Chỉnh sửa thông tin'), ['sign-in/profile-edit-basic-user','slug' => $nameCurrentUser]) ?></li>
                                            <?php endif; ?>
                                            <li><?= Html::a(Yii::t('frontend', 'Đăng xuất'), ['site/logout'], ['data-method' => 'post']) ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--box-project-header-->
                        <?php endif ?>
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
                            <li class="nav-item in_development">
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
                            <li class="nav-item in_development">
                                <div class="d-flex flex-ai-center">
                                    <a class="nav-link change-images" href="#">
                                        <span class="text">Sổ xố</span>
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item nav-item-blog <?= Yii::$app->controller->id == 'blog' ? 'active' : null ?>">
                                <a class="nav-link change-images <?= Yii::$app->controller->id == 'blog' ? 'active' : null ?>" href="<?= Url::toRoute(['blog/index']); ?>">
                                    <span class="text">Thể thao</span>
                                </a>
                                
                            </li>
                            <li class="nav-item nav-item-blog <?= Yii::$app->controller->id == 'blog' ? 'active' : null ?>">
                                <a class="nav-link change-images <?= Yii::$app->controller->id == 'blog' ? 'active' : null ?>" href="<?= Url::toRoute(['blog/index']); ?>">
                                    <span class="text">Ku Casino</span>
                                </a>
                                
                            </li>
                            <li class="nav-item nav-item-blog <?= Yii::$app->controller->id == 'blog' ? 'active' : null ?>">
                                <a class="nav-link change-images <?= Yii::$app->controller->id == 'blog' ? 'active' : null ?>" href="<?= Url::toRoute(['blog/index']); ?>">
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

<?php

$js = <<<JS

$(document).ready(function(){
    let allListChild = $('.nav-item-blog').find('.list-menu-child');
    allListChild.each((index,item) => {
        if(!$.trim($(item).html()).length == true) {
            $(item).parents('.child').remove();
        }
    })
})

JS;

$this->registerJs($js)
?>
