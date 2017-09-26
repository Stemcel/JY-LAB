<?php

namespace app\models\search;

use app\models\LaboratoryTeacher;
use app\models\Laboratory;
use Yii;
use yii\base\model;
use yii\data\ActiveDataProvider;

class LaboratoryTeacherSearch extends LaboratoryTeacher
{
    public function rules()
    {
        return [
            [['laboratoryTeacherID', 'laboratoryID','teacherID'], 'integer'],
            [['type','position','remark'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = LaboratoryTeacher::find()->joinWith("teacher")->joinWith("laboratory");

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'laboratoryTeacherID' => $this->laboratoryTeacherID,
            'laboratoryID' => $this->laboratoryID,
            'teacherID' => $this->teacherID,
            'type' => $this->type,
            'position' => $this->position,
            'remark' => $this->remark,
        ]);

        $query->andFilterWhere(['like', 'laboratoryTeacherID', $this->laboratoryTeacherID])
            ->andFilterWhere(['laboratoryID' => $this->laboratoryID])
            ->andFilterWhere(['like', 'teacher.teacherID', $this->teacherID])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }

}