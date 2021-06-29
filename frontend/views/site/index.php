<?php
/* @var $this yii\web\View */
//$this->title = Yii::$app->name;
use common\models\Article;
use common\models\ArticleCategory;
use frontend\components\LikeArticleWidget;
use yii\helpers\Url;
use common\models\About;
use kartik\select2\Select2;
use frontend\components\DropdownCheckboxWidget;
use frontend\components\SelectMinMaxWidget;
use frontend\components\TagSearchWidget;
use common\models\Projects;
use common\models\Category;
use common\models\Banner;
use common\models\ManagerMaterial;
use yii\web\View;
use backend\helpers\AcpHelper;
$indexUrl = \yii\helpers\Url::toRoute('art-gallery/index', 'https');
$this->registerJs("var url =  new URL(window.location.href)", View::POS_HEAD, 'url');
$actileIndex = Article::find()->where(['category_id' => 2])->all();
?>

<div class="main-page">
    <div class="box-slide">
        <div class="swiper-index-slide">
            <div class="swiper-wrapper">
            <?php if(!empty($defaultBanner) && $defaultBanner != NULL):?> 
                <?php foreach($defaultBanner as $key => $banner): ?>
                <div class="swiper-slide">
                    <?php if($banner->use_contructor == Banner::USE_CONTRUCTOR):?>
                        <div class="item-carousel item-banner item-banner-form item-banner-1 d-flex swiper-lazy" data-background="<?=$banner->getImageBanner($banner->contructor_id)?>" style="">
                    <?php else: ?>
                        <div class="item-carousel item-banner item-banner-form item-banner-1 d-flex swiper-lazy" data-background="<?=$banner->getImageBanner()?>" style="">
                    <?php endif;?>
                        <div class="main-slider-banner container">
                            <h2 class="title color-white text-center"><?=$banner->title?></h2>
                            <p class="text"><?=$banner->content?></p>
                            <?php if($banner->button != NULL && !empty($banner->button)): ?>
                                <div class="box-info-filter" style="display: flex;justify-content: center;">
                                    <div class="box-filter-1 flex mt-20 box-list-filter filter-banner-index search_artgallery_div" id="search_artgallery_div" style="justify-content: center;">
                                        <?php foreach ($banner->button as $key => $button) :?>
                                                <?php if($button != Banner::LABEL_SEARCH_TYPE_BUTTON):?>
                                                    <?php if (Yii::$app->user->isGuest): ?>
                                                    <?= Banner::renderButton($button) ?>
                                                    <?php else : ?>
                                                        <?php if($button != Banner::LABEL_REGISTRATION):?>
                                                            <?= Banner::renderButton($button) ?>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php else:?>
                                                    <div class="form-group" style="width: max-content!important;min-width: unset!important;margin-right: 0px;margin-bottom: 0px;">
                                                        <?php 
                                                            $url_link_search = '';
                                                            if($banner->url_search_button){
                                                                $url_link_search =  $banner->url_search_button;
                                                            }
                                                        ?>
                                                        <?= Banner::renderButton($button,$url_link_search) ?>
                                                    </div>
                                                <?php endif;?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if($banner->use_contructor == Banner::USE_CONTRUCTOR):?>
                        <div class="nameContructor font-italic"><span>Ảnh: <?php echo Banner::getNameContructor($banner->contructor_id)?></span></div>
                        <?php endif;?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-pagination-white color-white"></div>
            <div class="swiper-button-prev swiper-pagination-white color-white"></div>
            <!-- <div class="swiper-pagination swiper-pagination-white"></div> -->
            <?php else: ?>
                <div class="swiper-slide">
                    <div class="item-carousel item-banner item-banner-form item-banner-1 d-flex lazy" data-src="https://agohomestyle.com/images/Banner_home_01.jpg" style="">
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class='box-index-acticle'>
        <?php foreach ($actileIndex as $key => $value):?>
            <div class="container">
                <div class="row group">
                    <div class="col-md-12">
                        <h2 style="text-align: center;"><span style="font-family: 'times new roman', times, serif; color: #000000;"><strong><?php echo $value->title?></strong></span></h2>
                        <div><span><?php echo $value->body?></span></div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div> 
        <!-- box-slide-->
        <div class="modal fade" id="modalDetailArt" tabindex="-1" aria-labelledby="modalDetailArt" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width: 100%;max-width: 100%">
                <div class="modal-content">

                </div>
            </div>
        </div>
</div>
<!--main-page-->

