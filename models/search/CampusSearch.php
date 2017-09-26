<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Campus;

/**
 * FunctionSearch represents the model behind the search form of `app\models\Functions`.
 */
class CampusSearch extends Campus
{
    public $query;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['campusID'], 'integer'],
            [['code'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 40],
            [['description'], 'string', 'max' => 400],
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
        $query = $this->query ? $this->query : Campus::find();

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
            'campusID' => $this->campusID,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}