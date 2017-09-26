<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fee;

/**
 * FeeSearch represents the model behind the search form about `app\models\Fee`.
 */
class FeeSearch extends Fee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'teacherID'], 'integer'],
            [['feeTypeID', 'name', 'createDate', 'status', 'description', 'remark'], 'safe'],
            [['amount', 'userAmount'], 'number'],

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
        $query = Fee::find()->joinWith('teacher','fee_type');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'feeID' => SORT_DESC
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
            'feeID' => $this->feeID,
        ]);

        $query->andFilterWhere(['like', 'fee.feeTypeID', $this->feeTypeID])
            ->andFilterWhere(['like', 'amount', $this->amount])
            ->andFilterWhere(['like', 'userAmount', $this->userAmount])
            ->andFilterWhere(['like', 'fee.teacherID', $this->teacherID])
            ->andFilterWhere(['like', 'createDate', $this->createDate])
            ->andFilterWhere(['like', 'fee.name', $this->name])
            ->andFilterWhere(['like', 'fee.status', $this->status])
            ->andFilterWhere(['like', 'fee.description', $this->description])
            ->andFilterWhere(['like', 'fee.remark', $this->remark]);

        return $dataProvider;
    }
}
