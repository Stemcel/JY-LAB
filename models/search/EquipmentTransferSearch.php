<?php

namespace app\models\search;

use app\models\EquipmentTransfer;
use Yii;
use Yii\base\Model;
use yii\data\ActiveDataProvider;

class EquipmentTransferSearch extends EquipmentTransfer
{
	public function rules()
	{
		return [
			[['equipmentTransferID','equipmentID','oldLaboratoryID','newLaboratoryID','newRoomID','oldRoomID'],'integer'],
			[['brokerageID','description','remark','brokerageDate','brokerage'],'safe'],
		];
	}

	public function scenarios()
	{
		return Model::scenarios();
	}

	public function search($params)
	{
		$query = EquipmentTransfer::find();

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
		]);

		$query->andFilterWhere(['like','brokerage',$this->brokerage])
			->andFilterWhere(['like','brokerageDate',$this->brokerageDate])
			->andFilterWhere(['like','description',$this->description])
			->andFilterWhere(['like','oldLaboratoryID',$this->oldLaboratoryID])
			->andFilterWhere(['like','newLaboratoryID',$this->newLaboratoryID])
			->andFilterWhere(['like','newroomID',$this->newRoomID])
			->andFilterWhere(['like','oldroomID',$this->oldRoomID])
			->andFilterWhere(['like','description',$this->description])
			->andFilterWhere(['like','remark',$this->remark]);
		return $dataProvider;
	}
}