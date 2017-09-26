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
use app\models\Student;

class StudentSearch extends Student{

	public $classes_name;

	public function rules()
	{
		return[
			[['studentID'],'integer'],
			[['classes_name','code','classesID','password','name','type','sex','status','email','phone','remark'],'safe'],
		];
	}

	public function scenarios()
	{
		return Model::scenarios();
	}

	public function search($params)
	{
		$query = Student::find()->joinWith('classes');

		$dateProvider = new ActiveDataProvider([
			'query'=>$query,
		]);

		$this->load($params);

		if(!$this->validate()){
			return $dateProvider;
		}
		$query->andFilterWhere([
			'studentID'=>$this->studentID,
		]);

		$query->andFilterWhere(['like','student.code',$this->code])
			->andFilterWhere(['like','password',$this->password])
			->andFilterWhere(['like','student.name',$this->name])
			->andFilterWhere(['like','sex',$this->sex])
			->andFilterWhere(['like','type',$this->type])
			->andFilterWhere(['like','status',$this->status])
			->andFilterWhere(['like','email',$this->email])
			->andFilterWhere(['like','phone',$this->phone])
			->andFilterWhere(['like','remark',$this->remark])
			->andFilterWhere(['like','classes.name',$this->classes_name]);

		return $dateProvider;
	}
}
