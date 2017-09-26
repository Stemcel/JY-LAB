<?php

namespace app\modules\basicinfo\controllers;

use app\models\Student;
use Yii;
use app\models\search\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class StudentController extends Controller
{
	const MODULE_NAME = "学生管理";
	public function actionIndex()
	{
		$searchModel = new StudentSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryparams);

		$dataProvider->sort->attributes['classes_name'] =
			[
				'asc' => ['classes.name' => SORT_ASC],
				'desc' => ['classes.name' => SORT_DESC],
			];
		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionView($id)
	{
		$model = Student::find()->where(['studentID' => $id])->with('classes')->one();
		return $this->render('view', [
			'model' => $model,
		]);
	}

	public function actionCreate()
	{
		$model = new Student();
		if ($model->load(Yii::$app->request->post())) {
			if($model->validate()){
				$result = $model->createOrUpdateOne(StudentController::MODULE_NAME);
				Yii::$app->session->setFlash($result['type'], $result['msg']);
				return $this->redirect(['index', 'id' => $model->studentID]);
			}
		}
		return $this->render('create-update', [
			'model' => $model,
		]);
	}

	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$result = $model->createOrUpdateOne(StudentController::MODULE_NAME);
			Yii::$app->session->setFlash($result['type'], $result['msg']);
			return $this->redirect(['index', 'id' => $model->studentID]);
		} else {
			return $this->render('create-update', [
				'model' => $model,
			]);
		}
	}

	public function actionDelete($id)
	{
		$errorStr = "";
		$model = new Student();
		$moduleIdsArr = explode(",", $id);
		$result = $model->deleteBatch($moduleIdsArr, StudentController::MODULE_NAME);
		Yii::$app->session->setFlash($result['type'], $result['msg'] . $errorStr);
		return $this->redirect(['index']);
	}

	protected function findModel($id)
	{
		if (($model = Student::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}


