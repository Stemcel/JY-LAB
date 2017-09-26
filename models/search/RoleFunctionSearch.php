<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RoleFunction;

/**
 * RoleFunctionSearch represents the model behind the search form of `app\models\RoleFunction`.
 */
class RoleFunctionSearch extends RoleFunction
{
    public $functions_name;
    public $functions_functionCode;
    public $functions_remark;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['roleFunctionID', 'functionID', 'roleID'], 'integer'],
            [
                ['addFun', 'modifyFun', 'deleteFun', 'queryFun',
                    'importFun', 'exportFun', 'printFun', 'otherFun1', 'otherFun2',
                    'otherFun3', 'remark','functions_name','functions_functionCode','functions_remark'
                ], 'safe'],
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
        $query = RoleFunction::find()->joinWith('functions');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'roleFunctionID' => SORT_DESC
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
            'role_function.roleFunctionID' => $this->roleFunctionID,
            'role_function.functionID' => $this->functionID,
            'role_function.roleID' => $this->roleID,
        ]);

        $query->andFilterWhere(['like', 'role_function.addFun', $this->addFun])
            ->andFilterWhere(['like', 'role_function.modifyFun', $this->modifyFun])
            ->andFilterWhere(['like', 'role_function.deleteFun', $this->deleteFun])
            ->andFilterWhere(['like', 'role_function.queryFun', $this->queryFun])
            ->andFilterWhere(['like', 'role_function.importFun', $this->importFun])
            ->andFilterWhere(['like', 'role_function.exportFun', $this->exportFun])
            ->andFilterWhere(['like', 'role_function.printFun', $this->printFun])
            ->andFilterWhere(['like', 'role_function.otherFun1', $this->otherFun1])
            ->andFilterWhere(['like', 'role_function.otherFun2', $this->otherFun2])
            ->andFilterWhere(['like', 'role_function.otherFun3', $this->otherFun3])
            ->andFilterWhere(['like', 'role_function.remark', $this->remark])
            ->andFilterWhere(['like', 'functions.name', $this->functions_name])
            ->andFilterWhere(['like', 'functions.functionCode', $this->functions_functionCode])
            ->andFilterWhere(['like', 'functions.remark', $this->functions_remark]);

        return $dataProvider;
    }
}
