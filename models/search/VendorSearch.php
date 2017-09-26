<?php
/**
 * Created by PhpStorm.
 * User: MyComputer
 * Date: 2017/8/1
 * Time: 14:41
 */
namespace app\models\search;

use app\models\Vendor;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * VendorSearch represents the model behind the search form about `app\models\Vendor`.
 */
class VendorSearch extends Vendor{
    public $query;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'password', 'name', 'contacts', 'remark'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 200],
            [['email', 'depositBank', 'bankNumber', 'licenseNumber', 'website'], 'string', 'max' => 40],
            [['phone', 'fax'], 'string', 'max' => 20],
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
        $query = $this->query ? $this->query : Vendor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'vendorID' => SORT_DESC
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
            'vendorID' => $this->vendorID,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'contacts', $this->contacts])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'fax', $this->fax]);

        return $dataProvider;
    }

}