<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Building;

/**
 * ModuleSearch represents the model behind the search form of `app\models\Modules`.
 */
class BuildingSearch extends Building
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['buildingID','campusID','departmentID'], 'integer'],
            [['remark','name','code'], 'safe'],
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
        $query = Building::find()->joinWith("campus","department");

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
            'building.BuildingID' => $this->buildingID,
        ]);

        $query->andFilterWhere(['like', 'building.code', $this->code])
            ->andFilterWhere(['like', 'building.campusID', $this->campusID])
            ->andFilterWhere(['like', 'building.name', $this->name])
            ->andFilterWhere(['like', 'building.departmentID', $this->departmentID])
            ->andFilterWhere(['like', 'building.remark', $this->remark]);

        return $dataProvider;
    }
}