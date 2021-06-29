<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use backend\modules\socnho\components\RouteRule;
use backend\modules\socnho\components\Configs;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel backend\modules\socnho\models\searchs\AuthItem */
/* @var $context backend\modules\socnho\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('rbac-admin', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Configs::authManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>


<h1><?= Html::encode($this->title) ?></h1>
<a class="btn btn-success" href="/admincp/admin/role/create" title="Add New"><i class="glyphicon glyphicon-plus"></i> Thêm mới</a>
<br>
<br>
<div id="tree" class="ztree">
    
</div>
<!-- <div class="role-index">
    <h2>Dạng bảng</h2>
    <?php
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'name',
            'label' => Yii::t('rbac-admin', 'Name'),
        ],
        [
            'attribute' => 'ruleName',
            'label' => Yii::t('rbac-admin', 'Rule Name'),
            'filter' => $rules
        ],
        [
            'attribute' => 'description',
            'label' => Yii::t('rbac-admin', 'Description'),
        ],
        [
            'class' => 'backend\components\xPActionColumn',
            'dropdown' => false,
            'vAlign'=>'middle',
            'template' => '{view} {update}',
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
           // '{export}',
            '{toggleData}'
        ],
        'pjax' => false,
        'id' => 'permission_grid',
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

</div> -->
<?php
$urlDelete = Url::toRoute('delete-one');
$create = Url::toRoute('create');
$update = Url::toRoute('update');
$view = Url::toRoute('view');

$js = <<<XP
    $(document).ready(function(){
        var setting = {
            view : {
                showIcon : false,
                expandSpeed:"fast",
                addHoverDom: addHoverDom,
                removeHoverDom: removeHoverDom,
                selectedMulti: false
            },
            edit: {
                enable: false,
            },
        };

        $.fn.zTree.init($("#tree"), setting, $treeView);

        var treeObj = $.fn.zTree.getZTreeObj("tree");
        treeObj.expandAll(true);

        function addHoverDom(treeId, treeNode) {
            var sObj = $("#" + treeNode.tId + "_span");
            if (treeNode.editNameFlag || $("#addBtn_"+treeNode.tId).length>0) return;

            var addStr = "<span class='button view' id='viewBtn_" + treeNode.tId
                + "' title='view node' onfocus='this.blur();'></span>";

            addStr += "<span class='button add' id='addBtn_" + treeNode.tId
                + "' title='add node' onfocus='this.blur();'></span>";

            addStr += "<span class='button edit' id='editBtn_" + treeNode.tId
                + "' title='edit node' onfocus='this.blur();'></span>";

            addStr += "<span class='button remove' id='removeBtn_" + treeNode.tId
                + "' title='remove node' onfocus='this.blur();'></span>";

            sObj.after(addStr);

            var btnAdd = $("#addBtn_"+treeNode.tId);
            var btnEdit = $("#editBtn_"+treeNode.tId);
            var btnRemove = $("#removeBtn_"+treeNode.tId);
            var btnView = $("#viewBtn_"+treeNode.tId);

            if (btnAdd) btnAdd.bind("click", function(){
                let current_url = window.location.href;
                window.location.href = '$create'+'?parent_id='+treeNode.id+'&parent_name='+treeNode.name
            });            

            if (btnView) btnView.bind("click", function(){
                let current_url = window.location.href;
                window.location.href = '$view'+'?id='+treeNode.name
            });

            if (btnEdit) btnEdit.bind("click", function(){
                let current_url = window.location.href;
                window.location.href = '$update'+'?id='+treeNode.name;
            });
            if (btnRemove) btnRemove.bind("click", function(){
                swal({
                    title: "Thông báo",
                    text: "Bạn có chắc muốn xóa!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            jQuery.post(
                                "$urlDelete",
                                {
                                    id : treeNode.name
                                },
                            );
                        }
                    });
            });
        };

        function removeHoverDom(treeId, treeNode) {
            $("#addBtn_"+treeNode.tId).unbind().remove();
            $("#editBtn_"+treeNode.tId).unbind().remove();
            $("#removeBtn_"+treeNode.tId).unbind().remove();
            $("#viewBtn_"+treeNode.tId).unbind().remove();
        };

    })

XP;
$this->registerJs($js);
?>
