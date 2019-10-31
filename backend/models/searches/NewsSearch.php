<?php

namespace backend\models\searches;

use yii\data\ActiveDataProvider;
use backend\models\News;

/**
 * NewsSearch represents the model behind the search form of `backend\models\News`.
 */
class NewsSearch extends News
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],

            [['enabled'], 'boolean'],

            [['title', 'description', 'category_id'], 'safe'],
        ];
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
        $query = News::find()
            ->joinWith('category');

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
            '{{%news}}.id' => $this->id,
            '{{%news}}.enabled' => $this->enabled,
        ]);

        $query->andFilterWhere(['like', '{{%news}}.title', $this->title])
            ->andFilterWhere(['like', 'category.title', $this->category_id])
            ->andFilterWhere(['like', '{{%news}}.description', $this->description]);

        return $dataProvider;
    }
}
