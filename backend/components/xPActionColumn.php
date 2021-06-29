<?php
namespace backend\components;

use Yii;
use yii\helpers\ArrayHelper;
use kartik\grid\ActionColumnAsset;
use kartik\grid\ActionColumn;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;

class xPActionColumn extends ActionColumn
{
    protected function initDefaultButtons()
    {
        if (!isset($this->buttons['login'])) {
            $this->buttons['login'] = function ($url) {
                $options = $this->viewOptions;
                $title = Yii::t('kvgrid', 'View');
                $icon = '<span class="btn btn-default btn-xs"><i class="glyphicon glyphicon-log-in"></i></span>';
                $label = ArrayHelper::remove($options, 'label', ($this->_isDropdown ? $icon . ' ' . $title : $icon));
                $options = array_replace_recursive(['title' => $title, 'data-pjax' => '0', 'onclick' => 'swal({
            title: "Xác nhận",
            text: "Bạn có chắc muốn đăng nhập bằng tài khoản này?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDo) => {
                if (willDo) {
                    window.location.href = "'.$url.'";
                }
            });'], $options);
                if ($this->_isDropdown) {
                    $options['tabindex'] = '-1';
                    return '<li>' . Html::a($label, 'javascript:;', $options) . '</li>' . PHP_EOL;
                } else {
                    return Html::a($label, 'javascript:;', $options);
                }
            };
        }

        if(!isset($this->buttons['list'])) {
            $this->buttons['list'] = function ($url) {
                $options = $this->viewOptions;
                $title = Yii::t('kvgrid', 'List');
                $icon = '<span class="btn btn-warning btn-xs"><i class="glyphicon glyphicon glyphicon-file"></i></span>';
                $label = ArrayHelper::remove($options, 'label', ($this->_isDropdown ? $icon . ' ' . $title : $icon));
                $options = array_replace_recursive(['title' => $title, 'data-pjax' => '0'], $options);
                if ($this->_isDropdown) {
                    $options['tabindex'] = '-1';
                    return '<li>' . Html::a($label, $url, $options) . '</li>' . PHP_EOL;
                } else {
                    return Html::a($label, $url, $options);
                }
            };
        }

        if(!isset($this->buttons['detail'])) {
            $this->buttons['detail'] = function ($url) {
                $arrayUrl = explode('=',$url);
                $newUrl = '/admincp/content/job-candidate/view?id='.$arrayUrl[1];
                $options = $this->viewOptions;
                $title = Yii::t('kvgrid', 'Detail');
                $icon = '<span class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i></span>';
                $label = ArrayHelper::remove($options, 'label', ($this->_isDropdown ? $icon . ' ' . $title : $icon));
                $options = array_replace_recursive(['title' => $title, 'data-pjax' => '0'], $options);
                if ($this->_isDropdown) {
                    $options['tabindex'] = '-1';
                    return '<li>' . Html::a($label, $newUrl, $options) . '</li>' . PHP_EOL;
                } else {
                    return Html::a($label, $newUrl, $options);
                }
            };
        }

        if(!isset($this->buttons['preview'])) {
            $this->buttons['preview'] = function ($url,$model) {
                // echo "<pre>";print_r($model->slug);die;
                // $arrayUrl = explode('=',$url);
                $newUrl = '/blogs/xem-truoc/'.$model->slug.'.html';
                $options = $this->viewOptions;
                $title = Yii::t('kvgrid', 'Detail');
                $icon = '<span class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i></span>';
                $label = ArrayHelper::remove($options, 'label', ($this->_isDropdown ? $icon . ' ' . $title : $icon));
                $options = array_replace_recursive(['title' => $title, 'data-pjax' => '0','target' => '_blank'], $options);
                if ($this->_isDropdown) {
                    $options['tabindex'] = '-1';
                    return '<li>' . Html::a($label, $newUrl, $options) . '</li>' . PHP_EOL;
                } else {
                    return Html::a($label, $newUrl, $options);
                }
            };
        }

        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url) {
                $options = $this->viewOptions;
                $title = Yii::t('kvgrid', 'View');
                $icon = '<span class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i></span>';
                $label = ArrayHelper::remove($options, 'label', ($this->_isDropdown ? $icon . ' ' . $title : $icon));
                $options = array_replace_recursive(['title' => $title, 'data-pjax' => '0'], $options);
                if ($this->_isDropdown) {
                    $options['tabindex'] = '-1';
                    return '<li>' . Html::a($label, $url, $options) . '</li>' . PHP_EOL;
                } else {
                    return Html::a($label, $url, $options);
                }
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url) {
                $options = $this->updateOptions;
                $title = Yii::t('kvgrid', 'Update');
                $icon = '<span class="btn btn-success btn-xs"><i class="glyphicon glyphicon-pencil"></i></span>';
                $label = ArrayHelper::remove($options, 'label', ($this->_isDropdown ? $icon . ' ' . $title : $icon));
                $options = array_replace_recursive(['title' => $title, 'data-pjax' => '0'], $options);
                if ($this->_isDropdown) {
                    $options['tabindex'] = '-1';
                    return '<li>' . Html::a($label, $url, $options) . '</li>' . PHP_EOL;
                } else {
                    return Html::a($label, $url, $options);
                }
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url) {
                $options = $this->deleteOptions;
                $title = Yii::t('kvgrid', 'Delete');
                $icon = '<span class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></span>';
                $label = ArrayHelper::remove($options, 'label', ($this->_isDropdown ? $icon . ' ' . $title : $icon));
                $defaults = ['title' => $title, 'data-pjax' => 'false', 'onclick' => "swal({
            title: 'Xác nhận',
            text: 'Bạn có chắc muốn xóa!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.post(
                        '".$url."',
                        {
                            pk : jQuery('#province_grid').yiiGridView('getSelectedRows')
                        },
                        function () {
                            jQuery.pjax.reload({container:'#province_grid'});
                        }
                    );
                }
            });"];
                $pjax = $this->grid->pjax ? true : false;
                $pjaxContainer = $pjax ? $this->grid->pjaxSettings['options']['id'] : '';
                if ($pjax) {
                    $defaults['data-pjax-container'] = $pjaxContainer;
                }
                $options = array_replace_recursive($defaults, $options);
                $css = $this->grid->options['id'] . '-action-del';
                Html::addCssClass($options, $css);
                $view = $this->grid->getView();
                ActionColumnAsset::register($view);
                if ($this->_isDropdown) {
                    $options['tabindex'] = '-1';
                    return '<li>' . Html::a($label, 'javascript:;', $options) . '</li>' . PHP_EOL;
                } else {
                    return Html::a($label, 'javascript:;', $options);
                }
            };
        }
    }
}