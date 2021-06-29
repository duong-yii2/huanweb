<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $content string */

\frontend\assets\FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--<html lang="--><?php //echo Yii::$app->language ?><!--">-->
<html lang="Vi">

<head>
    <meta charset="<?php echo Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo Html::encode(Yii::$app->name) ?></title>
    <?php $this->head() ?>
    <?php echo Html::csrfMetaTags() ?>

    <?php $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/images/favicon.png']) ?>
    <script src="/js/jquery-1.10.2.min.js"></script>

<!--    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/fontawesome.min.css">
    <link rel="stylesheet" href="/css/light.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/custom.css">-->
    <script>
        var mainajaxurl = '<?=Url::to(['site/mainajax'], true)?>';
    </script>
</head>
<body class="<?=Yii::$app->controller->id?>_page">
<?php $this->beginBody() ?>
    <?php echo $this->render('header'); ?>
<!--    <div id="loader-wrapper">-->
<!--        <div id="loader"></div>-->
<!---->
<!--        <div class="loader-section section-left"></div>-->
<!--        <div class="loader-section section-right"></div>-->
<!---->
<!--    </div>-->
    <?php echo $content ?>
<?php $this->endBody() ?>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f90ee96dd2afb20"></script>
</body>
</html>
<?php $this->endPage() ?>
