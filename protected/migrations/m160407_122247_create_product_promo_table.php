<?php

class m160407_122247_create_product_promo_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('product_promo', array(
            'id' => 'pk',
            'product_id' => 'int NOT NULL',
            'promo_id' => 'int NOT NULL',
        ));
	}

	public function safeDown()
	{
	}
}