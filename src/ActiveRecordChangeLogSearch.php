<?php

namespace panwenbin\yii2\activerecord\changelog;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use panwenbin\yii2\activerecord\changelog\ActiveRecordChangeLog;

/**
 * ActiveRecordChangeLogSearch represents the model behind the search form about `panwenbin\yii2\activerecord\changelog\ActiveRecordChangeLog`.
 */
class ActiveRecordChangeLogSearch extends ActiveRecordChangeLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'log_at'], 'integer'],
            [['event', 'model', 'pk', 'old_attributes', 'new_attributes'], 'safe'],
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
        $query = ActiveRecordChangeLog::find();

        // add conditions that should always apply here
        $query->orderBy('id desc');

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
            'log_at' => $this->log_at,
        ]);

        $query->andFilterWhere(['like', 'event', $this->event])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'pk', $this->pk])
            ->andFilterWhere(['like', 'old_attributes', $this->old_attributes])
            ->andFilterWhere(['like', 'new_attributes', $this->new_attributes]);

        return $dataProvider;
    }
}
