<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserRole;

/**
 * UserRoleSearch represents the model behind the search form of `app\models\UserRole`.
 */
class UserRoleSearch extends UserRole
{
    public $user_name;
    public $user_userCode;
    public $user_remark;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userRoleID', 'userID', 'roleID'], 'integer'],
            [['remark',"user_name","user_userCode","user_remark"], 'safe'],
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
        $query = UserRole::find()->joinWith("user");

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
            'user_role.userRoleID' => $this->userRoleID,
            'user_role.userID' => $this->userID,
            'user_role.roleID' => $this->roleID,
        ]);

        $query->andFilterWhere(['like', 'user.name', $this->user_name]);
        $query->andFilterWhere(['like', 'user.userCode', $this->user_userCode]);
        $query->andFilterWhere(['like', 'user.remark', $this->user_remark]);

        return $dataProvider;
    }
}
