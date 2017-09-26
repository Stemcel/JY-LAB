<?php

namespace app\models\search;

use app\models\TeacherAchievement;
use Yii;
use yii\base\model;
use yii\data\ActiveDataProvider;
use app\models\Laboratory;

class TeacherAchievementSearch extends TeacherAchievement
{
    public function rules()
    {
        return [
            [['teacherAchievementID', 'laboratoryID'], 'integer'],
            [['name', 'achieveDate', 'type', 'level', 'remark'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = TeacherAchievement::find()->joinWith("teacher")->joinWith("laboratory");

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'teacherAchievementID' => $this->teacherAchievementID,
            'laboratoryID' => $this->laboratoryID,
            'name' => $this->name,
            'achieveDate' => $this->achieveDate,
            'type' => $this->type,
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['laboratoryID' => $this->laboratoryID])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'achieveDate', $this->achieveDate]);

        return $dataProvider;
    }

}