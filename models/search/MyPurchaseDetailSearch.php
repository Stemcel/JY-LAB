<?php
/**
 * Created by PhpStorm.
 * User: MyComputer
 * Date: 2017/8/1
 * Time: 14:41
 */
namespace app\models\search;

use app\models\PurchaseDetail;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PurchaseDetailSearch represents the model behind the search form about `PurchaseDetail`.
 */
class MyPurchaseDetailSearch extends PurchaseDetail
{
    public $query;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchaseID', 'annualBudgetID', 'purchaseCatalogueID'], 'integer'],
            [['quantity', 'price', 'amount'], 'number'],
            [['description', 'unit', 'specification', 'status'], 'string'],
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
        $s = $_SERVER['QUERY_STRING'];
       //用 parse_str 解析
        parse_str($s, $a);
        $query = $this->query ? $this->query : PurchaseDetail::find()->where(['purchaseID' => $a]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            /* 'sort' => [
                 'defaultOrder' => [
                     'PurchaseDetailID' => SORT_DESC
                 ]
             ],*/
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
        ]);

        $query->andFilterWhere(['like', 'purchaseCatalogueID', $this->purchaseCatalogueID])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'specification', $this->specification])
            ->andFilterWhere(['like', 'quantity', $this->quantity])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'amount', $this->amount])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }

}