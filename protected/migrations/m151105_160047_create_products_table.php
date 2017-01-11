<?php

class m151105_160047_create_products_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('products', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'short_description' => 'text',
            'long_description' => 'text',
            'brand' => 'string NOT NULL',
            'stock' => 'int NOT NULL',
            'is_online' => 'tinyint(1) DEFAULT 1',
            'show_on_home' => 'tinyint(1) DEFAULT 1',
            'price' => 'float NOT NULL',
            'reference_number' => 'string NOT NULL',
            'shop_id' => 'int NOT NULL',
            'category_id' => 'int NOT NULL',
            'slug' => 'string'
        ));
	}

	public function safeDown()
	{
        $this->dropTable('products');
	}

}