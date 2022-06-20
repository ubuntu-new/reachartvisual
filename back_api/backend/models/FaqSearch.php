<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Faq;

/**
 * FaqSearch represents the model behind the search form of `backend\models\Faq`.
 */
class FaqSearch extends Faq
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['title', 'status', 'description', 'created', 'title_ge', 'description_ge', 'metakeyword', 'metakeyword_ge'], 'safe'],
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
        $query = Faq::find();

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
            'created' => $this->created,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'title_ge', $this->title_ge])
            ->andFilterWhere(['like', 'description_ge', $this->description_ge])
            ->andFilterWhere(['like', 'metakeyword', $this->metakeyword])
            ->andFilterWhere(['like', 'metakeyword_ge', $this->metakeyword_ge]);

        return $dataProvider;
    }
}
