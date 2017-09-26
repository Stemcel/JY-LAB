<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Modules;

/**
 * ModuleSearch represents the model behind the search form of `app\models\Modules`.
 */
class ModuleSearch extends Modules
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['moduleID'], 'integer'],
            [['moduleCode', 'name', 'remark', 'sort'], 'safe'],
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
        $query = Modules::find();

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
            'moduleID' => $this->moduleID,
        ]);

        $query->andFilterWhere(['like', 'moduleCode', $this->moduleCode])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'sort', $this->sort]);

        return $dataProvider;
    }
}