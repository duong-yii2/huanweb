<?php

/**
 * @var yii\web\View $this
 * @var common\models\Article $model
 * @var common\models\ArticleCategory[] $categories
 */
$this->title = Yii::t('backend', 'Update {modelClass}: ', [
        'modelClass' => 'Thông tin người truy cập',
    ]) . ' ' . $model->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Thông tin người truy cập'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');

?>

<?php echo $this->render('_form', [
    'model' => $model,
]) ?>
