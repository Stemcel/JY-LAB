<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ContractDetail;

/**
 * FunctionSearch represents the model behind the search form of `app\models\Functions`.
 */
class ContractDetailSearch extends ContractDetail
{
    public $query;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contractID', 'purchaseDetailID', 'annualBudgetID', 'purchaseCatalogueID', 'deliveryTeacher', 'checkTeacher', 'closeTeacher'], 'integer'],
            [['quantity', 'price', 'amount'], 'number'],
            [['deliveryTime', 'checkTime', 'closeTime','status'], 'safe'],
            [['description'], 'string', 'max' => 200],
            [['specification'], 'string', 'max' => 400],
            [['unit'], 'string', 'max' => 10],
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
        $query = $this->query ? $this->query : ContractDetail::find();

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
            'contractID' => $this->contractID,
        ]);

        $query->andFilterWhere(['like', 'purchaseDetailID', $this->purchaseDetailID])
//            ->andFilterWhere(['like', 'annualBudgetID', $this->annualBudgetID])
            ->andFilterWhere(['like', 'purchaseCatalogueID', $this->purchaseCatalogueID])
            ->andFilterWhere(['like', 'deliveryTeacher', $this->deliveryTeacher])
            ->andFilterWhere(['like', 'checkTeacher', $this->checkTeacher])
            ->andFilterWhere(['like', 'closeTeacher', $this->closeTeacher])
            ->andFilterWhere(['like', 'quantity', $this->quantity])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'amount', $this->amount])
            ->andFilterWhere(['like', 'deliveryTime', $this->deliveryTime])
            ->andFilterWhere(['like', 'checkTime', $this->checkTime])
            ->andFilterWhere(['like', 'closeTime', $this->closeTime])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'specification', $this->specification])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'status', $this->status]);
        return $dataProvider;
    }
}