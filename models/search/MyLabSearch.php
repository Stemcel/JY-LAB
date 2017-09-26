<?php

namespace app\models\search;

use app\models\LaboratoryRoom;
use app\models\Room;
use Yii;
use yii\base\model;
use yii\data\ActiveDataProvider;
use app\models\Laboratory;

class MyLabSearch extends Laboratory
{
	public function rules()
	{
		return [
			[['laboratoryID','manager','laboratoryCategoryID','departmentID'],'integer'],
			[['code','name','type','schoolType','createDate','approveDate','buildDate','URL','phone','description','status','remark',],'safe'],
			[['budget'],'number'],
		];
	}

//	public function scenarios()
//	{
//		// bypass scenarios() implementation in the parent class
//		return Model::scenarios();
//	}

	public function search($params)
	{
		$query = Laboratory::find()->joinWith("department")->joinWith('teacher');

		$dataProvider = new ActiveDataProvider([
			'query'=>$query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		$query->andFilterWhere([
			'laboratoryID' => $this->laboratoryID,
			'code' => $this->code,
			'laboratoryCategoryID' => $this->laboratoryCategoryID,
			'department.departmentID' => $this->departmentID,
			'budget' => $this->budget,
		]);

		$query->andFilterWhere(['like', 'laboratory.name', $this->name])
			->andFilterWhere(['like', 'manager', $this->manager])
			->andFilterWhere(['like', 'type', $this->type])
			->andFilterWhere(['like', 'schoolType', $this->schoolType])
			->andFilterWhere(['like', 'remark', $this->remark])
			->andFilterWhere(['like', 'createDate', $this->createDate])
			->andFilterWhere(['like', 'budget', $this->budget])
			->andFilterWhere(['like', 'status', $this->status])
			->andFilterWhere(['like', 'approveName', $this->approveName]);
//			->andFilterWhere(['like', 'handlerName', $this->handlerName]);

		return $dataProvider;
	}

//²éÑ¯ÉêÇë×´Ì¬
	public function naSearch($params)
	{
		$query = Laboratory::find()->joinWith("department")->joinWith('teacher');

		$dataProvider = new ActiveDataProvider([
			'query'=>$query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		$query->andFilterWhere([
			'laboratoryID' => $this->laboratoryID,
			'code' => $this->code,
			'laboratoryCategoryID' => $this->laboratoryCategoryID,
			'department.departmentID' => $this->departmentID,
			'budget' => $this->budget,
		]);

		$query->andFilterWhere(['like', 'laboratory.name', $this->name])
			->andFilterWhere(['like', 'manager', $this->manager])
			->andFilterWhere(['like', 'type', $this->type])
			->andFilterWhere(['like', 'schoolType', $this->schoolType])
			->andFilterWhere(['like', 'remark', $this->remark])
			->andFilterWhere(['like', 'createDate', $this->createDate])
			->andFilterWhere(['like', 'budget', $this->budget])
			->andFilterWhere(['like', 'laboratory.status', 'NA'])
			->andFilterWhere(['like', 'approveName', $this->approveName]);
//			->andFilterWhere(['like', 'handlerName', $this->handlerName]);

		return $dataProvider;
	}
//²éÑ¯Åú×¼×´Ì¬
public function opSearch($params)
{
	$query = Laboratory::find()->joinWith("department")->joinWith('teacher');

	$dataProvider = new ActiveDataProvider([
		'query'=>$query,
	]);

	$this->load($params);

	if (!$this->validate()) {
		// uncomment the following line if you do not want to return any records when validation fails
		// $query->where('0=1');
		return $dataProvider;
	}

	$query->andFilterWhere([
		'laboratoryID' => $this->laboratoryID,
		'code' => $this->code,
		'laboratoryCategoryID' => $this->laboratoryCategoryID,
		'department.departmentID' => $this->departmentID,
		'budget' => $this->budget,
	]);

	$query->andFilterWhere(['like', 'laboratory.name', $this->name])
		->andFilterWhere(['like', 'manager', $this->manager])
		->andFilterWhere(['like', 'type', $this->type])
		->andFilterWhere(['like', 'schoolType', $this->schoolType])
		->andFilterWhere(['like', 'remark', $this->remark])
		->andFilterWhere(['like', 'createDate', $this->createDate])
		->andFilterWhere(['like', 'budget', $this->budget])
		->andFilterWhere(['like', 'laboratory.status', 'OP'])
		->andFilterWhere(['like', 'approveName', $this->approveName]);
//			->andFilterWhere(['like', 'handlerName', $this->handlerName]);

	return $dataProvider;
}
}