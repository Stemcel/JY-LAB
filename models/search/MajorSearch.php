<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Major;

/**
 * ModuleSearch represents the model behind the search form of `app\models\Room`.
 */
class MajorSearch extends Major
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['majorID','departmentID',], 'integer'],
            [['code','name','englishName','type','discipline','isEnroll','description','remark',], 'safe'],
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

        $query = Major::find()->joinWith("department");

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
            'majorID' => $this->majorID,
        ]);

        $query->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like','major.code',$this->code])
            ->andFilterWhere(['like', 'major.name', $this->name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'department.departmentID', $this->departmentID]);

        return $dataProvider;
    }
}