<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AnnualBudget;

/**
 * AnnualBudgetSearch represents the model behind the search form about `app\models\AnnualBudget`.
 */
class AnnualBudgetSearch extends AnnualBudget
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['annualBudgetID', 'departmentID', 'feeID', 'handlerName', 'approver'], 'integer'],
            [['years', 'purpose', 'handlerDate', 'approveDate', 'type', 'status', 'remark','annualBudgetCode'], 'safe'],
            [['amount', 'approveAmount', 'useAmount'], 'number'],
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
        $query = AnnualBudget::find()/*->joinWith('fee','teacher')
         ->joinWith('department')*/
            ->where(
                ['status'=>'NA']
            );

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
            'annualBudgetID' => $this->annualBudgetID,
            'departmentID' => $this->departmentID,
            'fee.feeID' => $this->feeID,
            'amount' => $this->amount,
            'approveAmount' => $this->approveAmount,
            'useAmount' => $this->useAmount,
            'handlerName' => $this->handlerName,
            'handlerDate' => $this->handlerDate,
            'approver' => $this->approver,
            'approveDate' => $this->approveDate,
        ]);

        $query->andFilterWhere(['like', 'years', $this->years])
            ->andFilterWhere(['like', 'purpose', $this->purpose])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'annual_budget.status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'annualBudgetCode', $this->annualBudgetCode]);

        return $dataProvider;
    }
}
