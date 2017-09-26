<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Department;

/**
 * FunctionSearch represents the model behind the search form of `app\models\Functions`.
 */
class DepartmentSearch extends Department
{
    public $query;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departmentID','parentDepartmentID'], 'integer'],
            [['code'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 40],
            [['isLaboratory'], 'string', 'max' => 1],
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
        $query = $this->query ? $this->query : Department::find();

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
        $query ->andFilterWhere([
               'departmentID' => $this->departmentID,
           ]);

        $query->andFilterWhere(['like', 'isLaboratory', $this->isLaboratory])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like','parentDepartmentID',$this->parentDepartmentID ])
        ;

        return $dataProvider;
    }
}