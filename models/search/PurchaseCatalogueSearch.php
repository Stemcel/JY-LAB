<?php
/**
 * Created by PhpStorm.
 * User: MyComputer
 * Date: 2017/8/1
 * Time: 14:41
 */
namespace app\models\search;

use app\models\PurchaseCatalogue;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PurchaseCatalogueSearch represents the model behind the search form about `app\models\PurchaseCatalogue`.
 */
class PurchaseCatalogueSearch extends PurchaseCatalogue{
    public $query;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentCode'], 'integer'],
            [['code', 'name', 'remark'], 'string'],
            [['description','type','isCollection'], 'string'],
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
        $query = $this->query ? $this->query : PurchaseCatalogue::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'code' => SORT_ASC
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
            'code' => $this->code,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'isCollection', $this->isCollection])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }

}