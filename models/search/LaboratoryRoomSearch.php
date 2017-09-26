<?php

namespace app\models\search;

use app\models\LaboratoryRoom;
use app\models\Laboratory;
use Yii;
use yii\base\model;
use yii\data\ActiveDataProvider;

class LaboratoryRoomSearch extends LaboratoryRoom
{
    public function rules()
    {
        return [
            [['laboratoryRoomID', 'laboratoryID','roomID'], 'integer'],
            [['remark'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = LaboratoryRoom::find()->joinWith("room")->joinWith("laboratory");

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'laboratoryRoomID' => $this->laboratoryRoomID,
            'laboratoryID' => $this->laboratoryID,
            'roomID' => $this->roomID,
            'remark' => $this->remark,
        ]);

        $query->andFilterWhere(['like', 'name', $this->laboratoryRoomID])
            ->andFilterWhere(['laboratoryID' => $this->laboratoryID])
            ->andFilterWhere(['like', 'roomID', $this->roomID])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }

}