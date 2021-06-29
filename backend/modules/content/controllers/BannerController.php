<?php

namespace backend\modules\content\controllers;

use Yii;
use common\models\Banner;
use backend\modules\content\models\search\BannerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BannerController implements the CRUD actions for Banner model.
 */
class BannerController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Banner models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BannerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Banner model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Banner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Banner();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Banner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Banner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Banner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Banner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Banner::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUpdateStatus(){
        $id = Yii::$app->request->post('id');
        $model = $this->findModel($id);
        if($model){
            $model->status = $model->status == 1 ? 0 : 1;
            $model->save(false);
        }
    }

    public function actionUpdateSort(){
        $id = Yii::$app->request->post('id');
        $sort = Yii::$app->request->post('sort');
        $model = $this->findModel($id);
        if($model){
            $model->banner_order = $sort;
            $model->save();
        }
    }
    public function actionApprovalStatusOn(){
        $pk = Yii::$app->request->post('pk'); // Array or selected records primary keys
        if (!$pk) {
            return '';
        }
        $query = Banner::find()->where(['id' => $pk])->all();
        foreach ($query as $value){
            $value->status = 1;
            $value->update(false);
        }
    }
    public function actionApprovalStatusOff(){
        $pk = Yii::$app->request->post('pk'); // Array or selected records primary keys
        if (!$pk) {
            return '';
        }
        $query = Banner::find()->where(['id' => $pk])->all();
        foreach ($query as $value){
            $value->status = 0;
            $value->update(false);
        }
    }
}
