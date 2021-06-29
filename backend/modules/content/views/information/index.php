<?php

use common\grid\EnumColumn;
use common\models\Article;
use common\models\ArticleCategory;
use kartik\date\DatePicker;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use rmrevin\yii\fontawesome\FAS;

/**
 * @var yii\web\View $this
 * @var backend\modules\content\models\search\ArticleSearch $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('backend', 'Thông tin người truy cập');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-header">
        <?php echo Html::a(FAS::icon('user-plus').' '.Yii::t('backend', 'Add New {modelClass}', [
            'modelClass' => 'Thông tin người truy cập',
        ]), ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="card-body p-0">
        <?php echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{pager}",
            'options' => [
                'class' => ['gridview', 'table-responsive'],
            ],
            'tableOptions' => [
                'class' => ['table', 'text-nowrap', 'table-striped', 'table-bordered', 'mb-0', 'table-sm'],
            ],
            'columns' => [
                [
                    'attribute' => 'id',
                    'options' => ['style' => 'width: 5%'],
                ],
                [
                    'attribute' => 'email',
                    'options' => ['style' => 'width: 15%'],
                ],
                [
                    'attribute' => 'phone_number',
                    'options' => ['style' => 'width: 15%'],
                ],
                [
                    'class' => \common\widgets\ActionColumn::class,
                    'options' => ['style' => 'width: 5%'],
                    'template' => '{update} {delete}',
                ],
            ],
        ]); ?>
    </div>

    <div class="card-footer">
        <?php echo getDataProviderSummary($dataProvider) ?>
    </div>
</div>


