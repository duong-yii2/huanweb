<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this  yii\web\View */
/* @var $model backend\modules\socnho\models\BizRule */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel backend\modules\socnho\models\searchs\BizRule */

$this->title = Yii::t('rbac-admin', 'Rules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">
    <?php
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'name',
            'label' => Yii::t('rbac-admin', 'Name'),
        ],
        [
            'class' => 'backend\components\xPActionColumn',
            'dropdown' => false,
            'vAlign'=>'middle',
            'template' => '{view} {update} {delete}',
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
        'id' => 'rule_grid',
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
