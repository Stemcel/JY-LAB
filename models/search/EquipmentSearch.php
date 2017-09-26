<?php

namespace app\models\search;

use Yii;
use app\models\Equipment;
use Yii\base\Model;
use yii\data\ActiveDataProvider;

class EquipmentSearch extends Equipment{

	public function rules()
	{
		return[
			[['equipmentID','teacherID','supplier','departmentID','user','managerID','laboratoryID','roomID'],'integer'],
			[['price','transptation','foreignPrice'],'number'],
			[['code','name','modell','specification','purchaseDate','feeSubject','endDate','checkPeriod','purchasePerson','nation','sourceFrom','feeCode','purpose','picture','maker','makeDate','makeCode','description','status','remark'],'safe'],
		];
	}

	public function scenarios()
	{
		return Model::scenarios();
	}

	public function search($params)
	{
		$query = Equipment::find()/*->joinWith("teacher","department")->joinWith("laboratory","room")*/;

		$dataProvider = new ActiveDataProvider([
			'query'=>$query,
		]);

		$this->load($params);

		if(!$this->validate()){
			return $dataProvider;
		}
		$query->andFilterWhere([
			'equipmentID'=>$this->equipmentID,
			'code'=>$this->code,
//			'purchaseDate'=>$this->purchaseDate,
			'feeSubject'=>$this->feeSubject,
			'teacherID'=>$this->teacherID,
			'endDate'=>$this->endDate,
			'checkPeriod'=>$this->checkPeriod,
			'purchasePerson'=>$this->purchasePerson,
			'nation'=>$this->nation,
			'sourceFrom'=>$this->sourceFrom,
			'feeCode'=>$this->feeCode,
			'price'=>$this->price,
			'transptation'=>$this->transptation,
			'foreignPrice'=>$this->foreignPrice,
			'picture'=>$this->picture,
			'makeDate'=>$this->makeDate,
			'departmentID'=>$this->departmentID,
			'user'=>$this->user,
			'managerID'=>$this->managerID,
			'laboratoryID'=>$this->laboratoryID,
			'roomID'=>$this->roomID,
		]);

		$query->andFilterWhere(['like','name',$this->name])
			->andFilterWhere(['like','modell',$this->modell])
			->andFilterWhere(['like','specification',$this->specification])
			->andFilterWhere(['like','purpose',$this->purpose])
			->andFilterWhere(['like','maker',$this->maker])
			->andFilterWhere(['like','makeCode',$this->makeCode])
			->andFilterWhere(['like','supplier',$this->supplier])
			->andFilterWhere(['like','description',$this->description])
			->andFilterWhere(['like','remark',$this->remark])
			->andFilterWhere(['like', 'purchaseDate', $this->purchaseDate])
			->andFilterWhere(['like', 'status', $this->status]);
		return $dataProvider;
	}

}