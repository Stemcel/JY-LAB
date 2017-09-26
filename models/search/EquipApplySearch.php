<?php

namespace app\models\search;

use Yii;
use app\models\EquipmentMaintain;
use Yii\base\Model;
use yii\data\ActiveDataProvider;

class EquipApplySearch extends EquipmentMaintain
{
	public function rules()
	{
		return [
			[['equipmentMaintainID','equipmentID','checker'],'integer'],
			[['applyDate','description','checkDate','status','remark','applier'],'safe'],
		];
	}

	public function scenarios()
	{
		return Model::scenarios();
	}

	public function search($params)
	{
		$query = EquipmentMaintain::find()->joinWith("teacher");

		$dataProvider = new ActiveDataProvider([
			'query'=>$query,
		]);

		$this->load($params);

		if(!$this->validate()){
			return $dataProvider;
		}
		$query->andFilterWhere([
			'equipmentID'=>$this->equipmentID,
			'status'=>$this->status,
		]);

		$query->andFilterWhere(['like','applier',$this->applier])
			->andFilterWhere(['like','applyDate',$this->applyDate])
			->andFilterWhere(['like','description',$this->description])
//			->andFilterWhere(['like','checker',$this->checker])
//			->andFilterWhere(['like','checkDate',$this->checkDate])
			->andFilterWhere(['like','remark',$this->remark]);
		return $dataProvider;
	}
}