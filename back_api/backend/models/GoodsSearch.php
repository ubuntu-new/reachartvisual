<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Goods;

/**
 * GoodsSearch represents the model behind the search form of `backend\models\Goods`.
 */
class GoodsSearch extends Goods
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'offer', 'latest', 'bestSellers', 'trending', 'timePeriod'], 'integer'],
            [['name', 'description', 'name_ge', 'description_ge', 'price', 'offerPrice', 'visible', 'img', 'imgHover', 'dateTime', 'metakeyword', 'metakeyword_ge'], 'safe'],
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
        $query = Goods::find();

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
            'offer' => $this->offer,
            'latest' => $this->latest,
            'bestSellers' => $this->bestSellers,
            'trending' => $this->trending,
            'timePeriod' => $this->timePeriod,
            'dateTime' => $this->dateTime,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'name_ge', $this->name_ge])
            ->andFilterWhere(['like', 'description_ge', $this->description_ge])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'offerPrice', $this->offerPrice])
            ->andFilterWhere(['like', 'visible', $this->visible])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'imgHover', $this->imgHover])
            ->andFilterWhere(['like', 'metakeyword', $this->metakeyword])
            ->andFilterWhere(['like', 'metakeyword_ge', $this->metakeyword_ge]);

        return $dataProvider;
    }
}
