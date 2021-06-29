<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel backend\modules\socnho\models\searchs\Menu */

$this->title = Yii::t('rbac-admin', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <?php
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        [
            'attribute' => 'menuParent.name',
            'filter' => Html::activeTextInput($searchModel, 'parent_name', [
                'class' => 'form-control', 'id' => null
            ]),
            'label' => Yii::t('rbac-admin', 'Parent'),
        ],
        'route',
        'order',
        [
            'class' => 'backend\components\xPActionColumn',
            'dropdown' => false,
            'vAlign'=>'middle',
            'template' => '{update} {delete}',
            'options' => ['style' => 'width: 120px']
        ]
    ];

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        'toolbar' =>  [
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i> Thêm mới', ['create'], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'Add New')])
            ],
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-repeat"></i> Tải lại & Xóa lọc trang', ['index'], ['data-pjax'=>0, 'class'=>'btn btn-info', 'title'=>Yii::t('app', 'Reset Grid')])
            ],
            ['content'=>
                Html::button('<i class="glyphicon glyphicon-remove-circle"></i> Xóa chọn', ['data-pjax'=>0, 'type'=>'button', 'title'=>Yii::t('app', 'Add New'), 'class'=>'btn btn-danger delete-checked', 'onclick' => 'swal({
            title: "Thông báo",
            text: "Bạn có chắc muốn xóa!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    jQuery.post(
                        "'.Url::toRoute('delete-multiple').'",
                        {
                            pk : jQuery("#province_grid").yiiGridView("getSelectedRows")
                        },
                        function () {
                            location.reload();
                        }
                    );
                }
            });'])
            ],
//            '{export}',
            '{toggleData}'
        ],
        'pjax' => false,
        'id' => 'menu_grid',
        'bordered' => true,
        'striped' => false,
        'condensed' => false,
        'responsive' => false,
        'hover' => true,
        'showPageSummary' => false,
        'panel' => [
            'type' => GridView::TYPE_INFO
        ],
//        'floatHeader' => true,
    ]);
    ?>

</div>
