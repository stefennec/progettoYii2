<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Post;

/**
 * PostSearch represents the model behind the search form of `app\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['title', 'abstract', 'body', 'date', 'author', 'categories'], 'safe'],
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
        $query = Post::find();

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
            'ID' => $this->ID,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'abstract', $this->abstract])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'categories', $this->categories]);

        return $dataProvider;
    }
}
