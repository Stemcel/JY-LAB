<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contract;

/**
 * FunctionSearch represents the model behind the search form of `app\models\Functions`.
 */
class ContractSearch extends Contract
{
    public $query;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendorID'], 'integer'],
            [['amount'], 'number'],
            [['createDate', 'deliveryTime'], 'safe'],
            [['code'], 'string', 'max' => 30],
            [['title', 'paymentType', 'remark'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 2],
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
        $query = $this->query ? $this->query : Contract::find()->joinWith("vendor");

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'contract.vendorID' => $this->vendorID,
        ]);

        $query->andFilterWhere(['like', 'contract.amount', $this->amount])
            ->andFilterWhere(['like', 'contract.createDate', $this->createDate])
            ->andFilterWhere(['like', 'contract.deliveryTime', $this->deliveryTime])
            ->andFilterWhere(['like', 'contract.code', $this->code])
            ->andFilterWhere(['like', 'contract.title', $this->title])
            ->andFilterWhere(['like', 'contract.paymentType', $this->paymentType])
            ->andFilterWhere(['like', 'contract.status', $this->status]);

        return $dataProvider;
    }
}