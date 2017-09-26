<?php

namespace app\modules\basicinfo\controllers;

use app\models\Department;
use Yii;
use app\models\search\DepartmentSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


/**
 * Default controller for the `basicinfo` module
 */
class DepartmentController extends Controller
{
    const MODULE_NAME = "行政单位管理";
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Department::find(),
        ]);
        $data = (Department::getCategoryTree());
        return $this->render('index', [
            'data' => $data,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Modules model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Modules model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Department();
        $post = Yii::$app->request->post();
        if (isset($post['parentDepartmentID']) && $post['name']){
            $model->parentDepartmentID = $post['parentDepartmentID'];
            $model->name = $post['name'];
            $ret = $model->save(false);
            if ($ret) {
                return 1;
            }
        }
        return 0;
    }
    /**
     * Creates a new Modules model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateM()
    {
         $model = new Department();
         if ($model->load(Yii::$app->request->post())) {
             if($model->validate()){
                 $result = $model->createOrUpdateOne(DepartmentController::MODULE_NAME);
                 Yii::$app->session->setFlash($result['type'], $result['msg']);
                 return $this->redirect(['index', 'id' => $model->departmentID]);
             }
         }
         return $this->render('create-update', [
             'model' => $model,
         ]);
    }

    /**
     * Updates an existing School model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();
        if (isset($post['name']) && !empty($post['name'])) {
            $model->name = $post['name'];
            $ret = $model->save(false);
            if ($ret) {
                return 1;
            }
        }
        return 0;
    }
    /**
     * Updates an existing Department model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpda()
    {
        $id = Yii::$app->request->post('id', '');
        if (!$id) {
            return '数据格式不正确';
        }
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $result = $model->createOrUpdateOne(DepartmentController::MODULE_NAME);
            Yii::$app->session->setFlash($result['type'], $result['msg']);
            return $this->redirect(['index', 'id' => $model->departmentID]);
        } else {
            return $this->render('create-update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Modules model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
       /* $errorStr = "";
        $model = new Department();
        $moduleIdsArr =  explode(",",$id);
        $result = $model->deleteBatch($moduleIdsArr,DepartmentController::MODULE_NAME);
        Yii::$app->session->setFlash($result['type'], $result['msg'].$errorStr);
        return $this->redirect(['index']);*/
        $id = Yii::$app->request->post('id', '');
        if (!$id) {
            return '数据格式不正确';
        }
        $categorys = Department::find()->where(['parentDepartmentID' => $id])->orWhere(['departmentID' => $id])->all();
        if (!$categorys) {
            return '请选择正确的分类';
        }
        return $this->batchDelete($categorys, 100);
    }

    private function batchDelete($recordArrs, $batchNum = 100)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $count = 0;
            foreach ($recordArrs as $recordArr) {
                $recordArr->delete();
                if (++$count % $batchNum == 0) {
                    $transaction->commit();
                    sleep(1);
                    $transaction = Yii::$app->db->beginTransaction();
                }
            }
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
            return '删除失败';
        }
        return false;
    }

    /**
     * Finds the Modules model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Department the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Department::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
