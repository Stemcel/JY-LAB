<?php

namespace app\modules\purchase\controllers;

use app\models\PurchaseCatalogue;
use Yii;
use app\models\search\PurchaseCatalogueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

class PurchaseCatalogueController extends Controller
{
    const MODULE_NAME = "物资采购目录管理";

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        // $searchModel = new PurchaseCatalogueSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
        $dataProvider = new ActiveDataProvider([
            'query' => PurchaseCatalogue::find(),
        ]);
        $data = (PurchaseCatalogue::getCategoryTree());
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
     * Creates a new PurchaseCatalogue model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateM()
    {
        $model = new PurchaseCatalogue();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $result = $model->createOrUpdateOne(PurchaseCatalogueController::MODULE_NAME);
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['index', 'id' => $model->purchaseCatalogueID]);
            }
        }
        return $this->render('create-update', [
            'model' => $model,
        ]);
    }
    /**
     * Creates a new Modules model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PurchaseCatalogue();
        $post = Yii::$app->request->post();
        if (isset($post['parentCode']) && $post['name']){
            $model->parentCode = $post['parentCode'];
            $model->name = $post['name'];
            $ret = $model->save(false);
            if ($ret) {
                return 1;
            }
        }
        return 0;
    }

    /**
     * Updates an existing PurchaseCatalogue model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        // $model = $this->findModel($id);

        // if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        //     $result = $model->createOrUpdateOne(VendorController::MODULE_NAME);
        //     Yii::$app->session->setFlash($result['type'], $result['msg']);
        //     return $this->redirect(['index', 'id' => $model->purchaseCatalogueID]);
        // } else {
        //     return $this->render('create-update', [
        //         'model' => $model,
        //     ]);
        // }
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

    public function actionCreatee($id)
    {
        $fa = $this->findModel($id);
        $parentCode = $fa->code;
        $model = new PurchaseCatalogue();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->parentCode =$parentCode;
                $result = $model->createOrUpdateOne(VendorController::MODULE_NAME);
                Yii::$app->session->setFlash($result['type'], $result['msg']);
                return $this->redirect(['index', 'id' => $model->purchaseCatalogueID]);
            }
        }
        return $this->render('create-update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PurchaseCatalogue model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        // $errorStr = "";
        // $model = new PurchaseCatalogue();
        // $moduleIdsArr = explode(",", $id);
        // $result = $model->deleteBatch($moduleIdsArr, VendorController::MODULE_NAME);
        // Yii::$app->session->setFlash($result['type'], $result['msg'] . $errorStr);
        // return $this->redirect(['index']);
     $id = Yii::$app->request->post('id', '');
        if (!$id) {
            return '数据格式不正确';
        }
        $categorys = PurchaseCatalogue::find()->where(['parentCode' => $id])->orWhere(['purchaseCatalogueID' => $id])->all();
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
     * @return PurchaseCatalogue the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PurchaseCatalogue::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
