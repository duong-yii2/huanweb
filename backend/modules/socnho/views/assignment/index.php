<?php

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel backend\modules\socnho\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = Yii::t('rbac-admin', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignment-index">

    <?php
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
        $usernameField,
    ];
    if (!empty($extraColumns)) {
        $columns = array_merge($columns, $extraColumns);
    }
    $columns[] = [
        'class' => 'backend\components\xPActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'template' => '{view}',
    ];

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
        'toolbar' =>  false,
        'pjax' => false,
        'id' => 'assignment_grid',
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
