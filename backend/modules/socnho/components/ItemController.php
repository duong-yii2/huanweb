<?php

namespace backend\modules\socnho\components;

use Yii;
use backend\modules\socnho\models\AuthItem;
use backend\modules\socnho\models\searchs\AuthItem as AuthItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\base\NotSupportedException;
use yii\filters\VerbFilter;
use yii\rbac\Item;
use common\models\Role;
use common\models\RbacAuthItem;

/**
 * AuthItemController implements the CRUD actions for AuthItem model.
 *
 * @property integer $type
 * @property array $labels
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class ItemController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'assign' => ['post'],
                    'remove' => ['post'],
                    'syncdb' => ['get']
                ],
            ],
        ];
    }

    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthItemSearch(['type' => $this->type]);
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        $allRole = Role::getAllRoleArray();
        $treeView = Role::buildTree($allRole);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'treeView' => json_encode($treeView)
        ]);
    }

    public function actionSyncDb(){
        $private_key = Yii::$app->request->get('private_key');
        if ($private_key == 'ffee1a8fe5e6cb8c6fe309e0d4ff68b2') {
            $allItemRbac = RbacAuthItem::find()->where(['type' => 1])->all();
            foreach ($allItemRbac as $key => $value) {
                $newRole = new Role();
                $newRole->name = $value->name;
                $newRole->depth = 0;
                $newRole->save(false);
            }
            return true;
        } else {
            throw new \yii\web\HttpException(403, 'Bạn không có quyền truy cập vào tính năng này, vui lòng liên hệ với người quản lý hệ thống');
        }
        
    }

    /**
     * Displays a single AuthItem model.
     * @param  string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $modelRole = Role::find()->where(['name' => $id])->one();
        $allRoute = $model->getAllRoute();
        $allAssigned = $model->getItemsAssigned();
        $allField = $model->getAllFeild($allRoute);

        // echo "<pre>";print_r(Yii::$app->request->post());die;
        
        if (Yii::$app->request->post()){
            $assigned = $model->getItemsAssigned();
            $model->removeChildren($assigned);
            $items = Yii::$app->getRequest()->post('routes', []);
            $model->addChildren($items);
            $saveField = json_encode(Yii::$app->request->post()['PermissionField']);
            $modelRole->field_permission = $saveField;
            $modelRole->save();
        }
        return $this->render('view', [
            'model' => $model,
            'modelRole' => $modelRole,
            'allRoute' => $allRoute,
            'allAssigned' => $allAssigned,
            'allField' => $allField

        ]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem(null);
        $modelRole = new Role();
        $model->type = $this->type;
        // echo "<pre>";print_r(Yii::$app->getRequest()->post());die;
        if ($model->load(Yii::$app->getRequest()->post()) && $model->save()) {
            $modelRole->name = $model->name;
            $modelRole->parent_name = Yii::$app->getRequest()->post()['Role']['parent_name'];
            $modelRole->code_role = Yii::$app->getRequest()->post()['Role']['code_role'];
            $modelRole->save();
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelRole' => $modelRole
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param  string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelRole = Role::find()->where(['name' => $id])->one();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        }

        return $this->render('update', ['model' => $model,'modelRole' => $modelRole]);
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param  string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        Configs::authManager()->remove($model->item);
        Helper::invalidate();

        return $this->redirect(['index']);
    }

    /**
     * Assign items
     * @param string $id
     * @return array
     */
    public function actionAssign($id)
    {
        $items = Yii::$app->getRequest()->post('items', []);
        $model = $this->findModel($id);
        $success = $model->addChildren($items);
        Yii::$app->getResponse()->format = 'json';
        return array_merge($model->getItems(), ['success' => $success]);
    }

    /**
     * Assign or remove items
     * @param string $id
     * @return array
     */
    public function actionRemove($id)
    {
        $items = Yii::$app->getRequest()->post('items', []);
        $model = $this->findModel($id);
        $success = $model->removeChildren($items);
        Yii::$app->getResponse()->format = 'json';

        return array_merge($model->getItems(), ['success' => $success]);
    }

    /**
     * @inheritdoc
     */
    public function getViewPath()
    {
        return $this->module->getViewPath() . DIRECTORY_SEPARATOR . 'item';
    }

    /**
     * Label use in view
     * @throws NotSupportedException
     */
    public function labels()
    {
        throw new NotSupportedException(get_class($this) . ' does not support labels().');
    }

    /**
     * Type of Auth Item.
     * @return integer
     */
    public function getType()
    {
        
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $auth = Configs::authManager();
        $item = $this->type === Item::TYPE_ROLE ? $auth->getRole($id) : $auth->getPermission($id);
        if ($item) {
            return new AuthItem($item);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDeleteOne()
    {
        $model = $this->findModel(Yii::$app->getRequest()->post()['id']);
        Configs::authManager()->remove($model->item);
        Helper::invalidate();

        return $this->redirect(['index']);
    }
}
