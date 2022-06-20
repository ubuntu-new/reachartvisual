<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Journal;

/**
 * JournalSearch represents the model behind the search form of `backend\models\Journal`.
 */
class JournalSearch extends Journal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'description', 'facebook', 'instagramm', 'linkendin', 'metakeyword', 'status', 'top', 'file'], 'safe'],
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
        $query = Journal::find();

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
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'instagramm', $this->instagramm])
            ->andFilterWhere(['like', 'linkendin', $this->linkendin])
            ->andFilterWhere(['like', 'metakeyword', $this->metakeyword])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'top', $this->top])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
