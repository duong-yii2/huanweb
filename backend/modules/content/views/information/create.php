<?php

/**
 * @var $this       yii\web\View
 * @var $model      common\models\Article
 * @var $categories common\models\ArticleCategory[]
 */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Thông tin người truy cập',
]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Thông tin người truy cập'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo $this->render('_form', [
    'model' => $model,
]) ?>
