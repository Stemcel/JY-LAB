<?php

namespace app\models\search;

use app\models\EquipmentScrap;
use Yii;
use Yii\base\Model;
use yii\data\ActiveDataProvider;

class EquipmentScrapSearch extends EquipmentScrap
{
	public function rules()
	{
		return [
			[['equipmentScrapID','equipmentID'],'integer']	,
			[['brokerageDate','description','status','remark','brokerage'],'safe'],
		];
	}

	public function scenarios()
	{
		return Model::scenarios();
	}

	public function search($params)
	{
		$query = EquipmentScrap::find();

		$dataProvider = new ActiveDataProvider([
			'query'=>$query,
		]);

		$this->load($params);
		if(!$this->validate())
		{
			return $dataProvider;
		}
		$query->andFilterWhere([
			'equipmentID'=>$this->equipmentID,
			'status'=>$this->status,
		]);

		$query->andFilterWhere(['like','brokerage',$this->brokerage])
			->andFilterWhere(['like','brokerageDate',$this->brokerageDate])
			->andFilterWhere(['like','description',$this->description])
			->andFilterWhere(['like','remark',$this->remark]);
		return $dataProvider;
	}
}