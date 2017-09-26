<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ContractPaymentDetail;

/**
 * FunctionSearch represents the model behind the search form of `app\models\Functions`.
 */
class ContractPaymentDetailSearch extends ContractPaymentDetail
{
    public $query;
    /**
     * @inheritdoc
     */
    public function rules()
    {

            return [
                [['contractPaymentID','paymentTeacherID'], 'integer'],
                [['paymentDate'], 'safe'],
                [ ['amount'], 'number'],
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
        $query = $this->query ? $this->query : ContractPaymentDetail::find();

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

        ]);

        $query->andFilterWhere(['like', 'contractPaymentID', $this->contractPaymentID])
            ->andFilterWhere(['like', 'paymentDate', $this->paymentDate])
            ->andFilterWhere(['like', 'amount', $this->amount])
            ->andFilterWhere(['like', 'paymentTeacherID', $this->paymentTeacherID]);
        return $dataProvider;
    }
}