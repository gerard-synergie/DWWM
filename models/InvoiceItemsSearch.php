<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InvoiceItems;

/**
 * InvoiceItemsSearch represents the model behind the search form of `app\models\InvoiceItems`.
 */
class InvoiceItemsSearch extends InvoiceItems
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_item', 'fk_part', 'fk_invoice', 'qty'], 'integer'],
            [['price_row'], 'number'],
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
        $query = InvoiceItems::find();

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
            'id_item' => $this->id_item,
            'fk_part' => $this->fk_part,
            'fk_invoice' => $this->fk_invoice,
            'qty' => $this->qty,
            'price_row' => $this->price_row,
        ]);

        return $dataProvider;
    }
}
