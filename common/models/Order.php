<?php
/**
 * Created by PhpStorm.
 * User: dangnh
 * Date: 6/10/2017
 * Time: 5:37 PM
 */

namespace common\models;

use yii\db\ActiveRecord;

class Order extends ActiveRecord
{
    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return '{{orders}}';
    }

    public function rules()
    {
        return [
//            [['total', 'shipping_fee'], 'required'],
            [['memo'], 'string'],
            [['customer_id', 'total', 'shipping_fee'], 'safe']
        ];
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }
}