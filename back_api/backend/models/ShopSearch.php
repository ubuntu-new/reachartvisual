<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Shop;

/**
 * ShopSearch represents the model behind the search form of `backend\models\Shop`.
 */
class ShopSearch extends Shop
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'latest', 'bestSellers', 'artistsId'], 'integer'],
            [['name', 'description', 'price', 'offerPrice', 'visible', 'shopurl', 'dateTime', 'metakeyword', 'facebook', 'instagramm'], 'safe'],
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
        $query = Shop::find();

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
            'latest' => $this->latest,
            'bestSellers' => $this->bestSellers,
            'dateTime' => $this->dateTime,
            'artistsId' => $this->artistsId,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'offerPrice', $this->offerPrice])
            ->andFilterWhere(['like', 'visible', $this->visible])
            ->andFilterWhere(['like', 'shopurl', $this->shopurl])
            ->andFilterWhere(['like', 'metakeyword', $this->metakeyword])
            ->andFilterWhere(['like', 'facebook', $this->facebook])
            ->andFilterWhere(['like', 'instagramm', $this->instagramm]);

        return $dataProvider;
    }
}
