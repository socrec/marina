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
            [['total', 'shipping_fee'], 'safe'],
            [['customer_name', 'customer_phone', 'customer_address', 'customer_ward', 'customer_district', 'customer_city'], 'safe'],
        ];
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    public function attributeLabels()
    {
        return array(
            'memo' => 'Ghi Chú',
            'customer_name' => 'Tên Khách Hàng',
            'customer_phone' => 'Số Điện Thoại',
            'customer_facebook' => 'Facebook',
            'customer_address' => 'Địa Chỉ',
            'customer_ward' => 'Phường',
            'customer_district' => 'Quận',
            'customer_city' => 'Thành Phố',
            'total' => 'Thành Tiền',
            'shipping_fee' => 'Phí Ship',
        );
    }
}