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
    public $address = '';
    public $phone = '';
    public function rules()
    {
        // only fields in rules() are searchable
        return [
            [['customer_name', 'address', 'phone'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Order::find()->joinWith('customer')->orderBy('orders.id DESC');

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
        $query->andFilterWhere(['like', 'customers.name', $this->customer_name])
            ->andFilterWhere(['like', 'customers.address', $this->address])
            ->andFilterWhere(['like', 'customers.phone', $this->phone]);

        return $dataProvider;
    }
}