<?php

namespace app\models\search;

use app\models\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    public $query;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userID', 'currentModule','name', ], 'integer'],
            [['userCode', 'password', 'remark', 'auth_key'], 'safe'],
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
        $query = $this->query ? $this->query : User::find()->joinWith('teacher');

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
            'userID' => $this->userID,
            'currentModule' => $this->currentModule,
        ]);

        $query->andFilterWhere(['like', 'userCode', $this->userCode])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'user.name', $this->name])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key]);

        return $dataProvider;
    }
}