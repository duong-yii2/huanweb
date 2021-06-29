<?php

use common\models\Article;
use common\models\ArticleLike;
use frontend\components\LikeArticleWidget;
use yii\helpers\Url;

?>
<?php if($defaultBlog != null): ?>
<?php foreach ($defaultBlog as $key => $value): ?>
    <div class="item-blog-news mb-0">
        <div class="images images-form">
            <a href="<?= Url::toRoute(['blog/postdetail', 'url' => $value->slug ]); ?>" class="img-item">
                <img src="<?= $value->getImage(511, 390) ?>" alt="<?= $value->title ?>" width="" height="">
            </a>
            <?= LikeArticleWidget::widget(['article_id' => $value->id, 'type' => ArticleLike::TYPE_LIKE_BLOG, 'user_id' => ArticleLike::isLikedBlog(Yii::$app->user->id, $value->id)]); ?>
        </div>
        <div class="info">
            <h4 class="title-2"><a href="<?= Url::toRoute(['blog/postdetail', 'url' => $value->slug ]); ?>"><?= $value->title ?></a></h4>
            <div class="flex flex-jc-between info-category">
            <a href="<?= Url::toRoute(['blog/postcategory', 'cateurl' => $value->category->alias ]); ?>"
               class="category">
               <img src="<?= $value->category->icon_path != null ? $value->category->icon_base_url.'/'.$value->category->icon_path : null ?>" width="25px" height="25px">
               <?= $value->category != NULL ? $value->category->title : "" ?>
           </a>
                <span class="date"><i class="fas fa-calendar-alt"></i><?=$value->dateup?></span>
            </div>
        </div>
        <ul class="box-active flex">
            <li class="count-like" data-id="<?= $value->id ?>"><span class="icon-default icon-heart-2"></span>(<?= Article::getLike($value->id)?>)</li>
            <li><span class="icon-default icon-comment"></span>(<?= $value->commentcount ?>)</li>
        </ul>
    </div>
<?php endforeach ?>
<?php else: ?>
    <div class="box-no-message">
        <p class="message-txt">Hiện chưa có bài viết nào</p>
    </div>
<?php endif; ?>
