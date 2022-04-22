<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\News;
use Yii;


/**
 * NewsSearch represents the model behind the search form of `app\models\News`.
 */
class NewsSearch extends News
{
    /**
     * {@inheritdoc}
     */
    public function rules():array
    {
        return [
            [['id', 'active'], 'integer'],
            [['title', 'announce', 'pic', 'news', ], 'safe'],
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
     * @param array $params searching words
     *
     * @return ActiveDataProvider
     */
    public function search(array $params):ActiveDataProvider
    {
        $cookies = \Yii::$app->request->cookies;
        if (($cookie = $cookies->get('pageSize')) !== null) {
            $pageSize = $cookie->value;
        }else{
            $pageSize =10;  
        }

        $query = News::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'forcePageParam' => false,
                'pageSizeParam' => false,
                'pageSize' => $pageSize
           ]
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
            //'date_public' => $this->date_public,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'announce', $this->announce])
            ->andFilterWhere(['like', 'pic', $this->pic])
            ->andFilterWhere(['like', 'news', $this->news]);

        return $dataProvider;
    }
}
