<?php
/**
 * Created by PhpStorm.
 * User: dangnh
 * Date: 6/12/2017
 * Time: 5:42 PM
 */

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class OrderSearch extends Customer
{
    public $customer_name = '';
    public $customer_address = '';
    public $customer_phone = '';
    public $memo = '';
    public function rules()
    {
        // only fields in rules() are searchable
        return [
            [['customer_name', 'customer_address', 'customer_phone', 'memo'], 'string'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Order::find()->orderBy('orders.id DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // adjust the query by adding the filters
        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'customer_address', $this->customer_address])
            ->andFilterWhere(['like', 'memo', $this->memo])
            ->andFilterWhere(['like', 'customer_phone', $this->customer_phone]);

        return $dataProvider;
    }
}