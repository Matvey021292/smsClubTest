<?php


namespace app\models;


use yii\data\ActiveDataProvider;

class SearchCategory extends Category
{
    public $title;

    /**
     * @param $params
     * @return ActiveDataProvider
     */
    public function search($params): ActiveDataProvider
    {
        $query = Category::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $query->andFilterWhere([
            'tag_id' => $params['tag']
        ]);

        return $dataProvider;
    }

}