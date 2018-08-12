<?php

use yii\db\Migration;
use common\models\Order;
use common\models\Customer;

class m180812_152507_move_customer_info_to_order extends Migration
{
    public function up()
    {
        $this->addColumn('orders', 'customer_name', $this->string(300));
        $this->addColumn('orders', 'customer_phone', $this->string(300));
        $this->addColumn('orders', 'customer_facebook', $this->text());
        $this->addColumn('orders', 'customer_address', $this->text());
        $this->addColumn('orders', 'customer_ward', $this->string(150));
        $this->addColumn('orders', 'customer_district', $this->string(100));
        $this->addColumn('orders', 'customer_city', $this->string(150));

        //Migrate data
        $orders = Order::find()->all();

        $count = 0;
        if (count($orders)) {
            foreach ($orders as $order) {
                $customer = Customer::find()->where(['id' => $order['customer_id']])->one();
                $order['customer_name'] = $customer['name'];
                $order['customer_phone'] = $customer['phone'];
                $order['customer_facebook'] = $customer['facebook'];
                $order['customer_address'] = $customer['address'];
                $order['customer_ward'] = $customer['ward'];
                $order['customer_district'] = $customer['district'];
                $order['customer_city'] = $customer['city'];

                if ($order->save()) {
                    $count++;
                }
            }
        }

        echo "Migrated successfully $count/" . count($orders);
        return true;
    }

    public function down()
    {
        echo "m180812_152507_move_customer_info_to_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
