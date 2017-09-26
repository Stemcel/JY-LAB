<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/11 0011
 * Time: 14:57
 */

namespace app\models\search;

use Yii;
use Yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Classes;


class ClassesSearch extends Classes{

	public function rules()
	{
		return[
			[['classesID','majorID'],'integer'],
			[['code','grade','name','remark','campusID',],'safe'],
		];
	}


	public function scenarios()
	{
		return Model::scenarios();
	}

	public function search($params)
	{
		$query = Classes::find()->joinWith("major","campus");

		$dateProvider = new ActiveDataProvider([
			'query'=>$query,
		]);

		$this->load($params);

		if(!$this->validate()){
			return $dateProvider;
		}
		$query->andFilterWhere([
			'classes.campusID'=>$this->campusID,
			'classesID'=>$this->classesID,
			'classes.majorID'=>$this->majorID,
		]);

		$query->andFilterWhere(['like','classes.code',$this->code])
			->andFilterWhere(['like','grade',$this->grade])
			->andFilterWhere(['like','classes.name',$this->name])
			->andFilterWhere(['like','remark',$this->remark]);
		return $dateProvider;
	}
}
