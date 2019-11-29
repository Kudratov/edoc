<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Documents;

/**
 * DocumentsSearch represents the model behind the search form of `frontend\models\Documents`.
 */
class DocumentsSearch extends Documents
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'opening_status'], 'integer'],
            [['number_doc', 'date_doc', 'id_users', 'subject', 'resolution'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Documents::find();

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
            'id' => $this->id,
            'date_doc' => $this->date_doc,
            'opening_status' => $this->opening_status,
        ]);

        $query->andFilterWhere(['like', 'number_doc', $this->number_doc])
            ->andFilterWhere(['like', 'id_users', $this->id_users])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'resolution', $this->resolution]);

        return $dataProvider;
    }
}
