<?php
/**
 * Created by PhpStorm.
 * User: MyComputer
 * Date: 2017/8/1
 * Time: 14:41
 */
namespace app\models\search;

use app\models\Purchase;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PurchaseSearch represents the model behind the search form about `app\models\Purchase`.
 */
class PurchaseSearch extends Purchase{
    public $query;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departmentID', 'teacherID'], 'integer'],
            [['createDate'], 'safe'],
            [['title', 'remark'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 2],
            [['purchaseFile'], 'string', 'max' => 200],
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
        $query = $this->query ? $this->query : Purchase::find()->joinWith('department','teacher') ->where(
            ['status'=>'NA']
        );

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'purchaseID' => SORT_DESC
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
            'purchaseID' => $this->purchaseID,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'purchase.teacherID', $this->teacherID])
            ->andFilterWhere(['like', 'purchase.departmentID', $this->departmentID])
            ->andFilterWhere(['like', 'createDate', $this->createDate])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }

}