<?php

namespace app\modules\log\controllers;

use app\models\search\LogSearch;
use Yii;
use yii\web\Controller;
use app\models\ActLog;
use yii\web\NotFoundHttpException;


/**
 * Default controller for the `log` module
 */
class LogController extends Controller
{
    const MODULE_NAME= "日志管理";
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index',[
           'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view',
            ['model' => $this->findModel($id),
            ]);
    }

    protected function findModel($id)
    {
        if(($model = ActLog::findOne($id))!== null) {
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
