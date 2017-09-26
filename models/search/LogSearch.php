<?php

namespace app\models\search;

use app\models\ActLog;
use yii\base\model;
use yii\data\ActiveDataProvider;

class LogSearch extends ActLog
{
    public function rules()
    {
        return [
          [['logID',],'integer'],
          [['name', 'moduleName', 'id', 'functionName','date'],'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = ActLog::find();

        $dataProvider = new ActiveDataProvider([
           'query'=> $query,
        ]);

        $this->load($params);

        if(!$this->validate())
        {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'logID' => $this->logID,

        ]);

        $query->andFilterWhere(['like','name',$this->name])
                ->andFilterWhere(['like','moduleName',$this->moduleName])
                ->andFilterWhere(['like','id',$this->id])
                ->andFilterWhere(['like','functionName',$this->functionName])
                ->andFilterWhere(['like','date',$this->date]);
        return $dataProvider;
    }
}