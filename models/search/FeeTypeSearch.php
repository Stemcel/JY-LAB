<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FeeType;

/**
 * FunctionSearch represents the model behind the search form of `app\models\Functions`.
 */
class FeeTypeSearch extends FeeType
{
    public $query;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departmentID','teacherID'], 'integer'],
            [['code'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 40],
            [['description'], 'string', 'max' =>400],
            [['remark'], 'string', 'max' => 100],
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
        $query = FeeType::find()->joinWith('department','teacher');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'feeTypeID' => SORT_DESC
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
        $query ->andFilterWhere([
            'feeTypeID' => $this->feeTypeID,
        ]);

        $query->andFilterWhere(['like', 'teacherID', $this->teacherID])
            ->andFilterWhere(['like', 'department.departmentID', $this->departmentID])
            ->andFilterWhere(['like', 'fee_type.code', $this->code])
            ->andFilterWhere(['like', 'fee_type.name', $this->name])
            ->andFilterWhere(['like', 'fee_type.remark', $this->remark])
            ->andFilterWhere(['like','fee_type.description',$this->description ])
        ;

        return $dataProvider;
    }
}