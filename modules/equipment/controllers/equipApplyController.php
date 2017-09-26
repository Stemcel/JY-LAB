<?php

namespace app\modules\equipment\controllers;

use app\models\EquipmentMaintain;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\search\EquipApplySearch;
use app\models\Equipment;

class EquipApplyController extends Controller
{
	const MODULE_NAME ="设备管理";
	public function actionIndex()
	{
		$searchModel = new EquipApplySearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryparams);

		return $this->render('index',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	public function actionCreate()
	{
		$model = new EquipmentMaintain();
		if ($model->load(Yii::$app->request->post()))
		{
			$post=Yii::$app->request->post();
			$eqId = $post['EquipmentMaintain']['equipmentID'];
			if ($model->load($post)&&$model->validate()){
				$result = $model->createOrUpdateOne(EquipApplyController::MODULE_NAME);
				//修改状态
				$ep = new EquipmentMaintain();
				$name = 'handlerDate';
				$et = $ep->autoCreateStatus($name, $model->equipmentMaintainID);
//				print_r($et);die;
				if($result){
					$eqObj=Equipment::find()->where(['EquipmentId'=>$eqId])->one();
					$eqObj->status = $et;
//					print_r($eqObj);die;
					$eqObj->save();
				}
				Yii::$app->session->setFlash($result['type'], $result['msg']);
				return $this->redirect(['index', 'id' => $model->equipmentMaintainID]);
			}
		}
		return $this->render('create-update',[
			'model' => $model,
		]);
	}

	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		if($model->load(Yii::$app->request->post()) && $model->validate()){
			$result = $model->createOrUpdateOne(EquipApplyController::MODULE_NAME);
			Yii::$app->session->setFlash($result['type'], $result['msg']);
			return $this->redirect(['index','id' => $model->equipmentMaintainID]);
		}else{
			return $this->render('create-update',[
				'model'=>$model,
			]);
		}
	}

	public function actionDelete($id)
	{
		$errorStr = "";
		$model = new EquipmentMaintain();
		$moduleIdsArr = explode(",",$id);
		$result = $model->deleteBatch($moduleIdsArr,EquipApplyController::MODULE_NAME);
		Yii::$app->session->setFlash($result['type'], $result['msg'].$errorStr);
		return $this->redirect(['index']);
	}

	public function findModel($id)
	{
		if(($model = EquipmentMaintain::findOne($id)) !== null){
			return $model;
		}else{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}