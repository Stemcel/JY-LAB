<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Functions;

/**
 * FunctionSearch represents the model behind the search form of `app\models\Functions`.
 */
class FunctionSearch extends Functions
{
    public $query;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['functionID', 'sort', 'moduleID'], 'integer'],
            [['functionCode', 'name', 'icon', 'url', 'remark'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = $this->query ? $this->query : Functions::find()->joinWith('module');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'functionID' => SORT_DESC
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'functions.functionID' => $this->functionID,
            'functions.sort' => $this->sort,
            'functions.moduleID' => $this->moduleID,
        ]);

        $query->andFilterWhere(['like', 'functions.functionCode', $this->functionCode])
            ->andFilterWhere(['like', 'functions.name', $this->name])
            ->andFilterWhere(['like', 'functions.icon', $this->icon])
            ->andFilterWhere(['like', 'functions.url', $this->url])
            ->andFilterWhere(['like', 'functions.remark', $this->remark])
            ->andFilterWhere(['like', 'functions.sort', $this->sort]);

        return $dataProvider;
    }
}
