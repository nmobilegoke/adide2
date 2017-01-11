<?php

class m151110_131843_create_orders_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('orders', array(
            'id' => 'pk',
            'ref_number' => 'string NOT NULL',
            'state' => 'string NOT NULL',
            'payment_state' => 'string NOT NULL',
            'delivery_state' => 'string NOT NULL',
            'delivery_address' => 'text',
            'quantity' => 'int NOT NULL',
            'total_amount' => 'float',
            'product_id' => 'int NOT NULL',
            'user_id' => 'int NOT NULL',
            'shop_id' => 'int NOT NULL'
        ));
	}

	public function safeDown()
	{
        $this->dropTable('orders');
	}
}