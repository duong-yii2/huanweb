<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use common\assets\Html5shiv;
use rmrevin\yii\fontawesome\NpmFreeAssetBundle;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Frontend application asset
 */
class FrontendAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@frontend/web';

    /**
     * @var array
     */
    public $css = [
        'css/font5all.css',
        'css/bootstrap.min.css',
        'css/light.css',
        'css/loading.css',
        'css/owl.carousel.min.css',
        'css/swiper.min.css',
        'css/jquery-ui.css',
        'css/main.css',
        'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap',
        'css/select2.css',
        'css/custom.css',
        'css/customselect2.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css',
        'css/croppie.css',
        'css/quangcss.css',
        'https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css'

    ];

    /**
     * @var array
     */
    public $js = [
        '/js/jquery.lazy.min.js',
        '/js/utils.js',
        "/js/popper.min.js",
        "/js/bootstrap.min.js",
        "/js/template.min.js",
        "/js/owl.carousel.min.js",
        "/js/jquery-ui.js",
        "/js/jquery.twenty.js",
        "/js/main.js",
        "/js/sweet.js",
        "/js/jquery.event.move.js",
        '/js/jquery.twenty.js',
        "/js/swiper.min.js",
        "/js/multi-animated-counter.js",
        "/js/app.js",
        "/js/custom.js",
        "/js/javascript.js",
        "/js/croppie.js",
        "/js/croppie.min.js",
    ];

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        Html5shiv::class,
        NpmFreeAssetBundle::class,
    ];
}
