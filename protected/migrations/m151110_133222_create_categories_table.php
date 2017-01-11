<?php

class m151110_133222_create_categories_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('categories', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'description' => 'text',
            'shop_id' => 'int NOT NULL',
            'slug' => 'string'
        ));
	}

	public function safeDown()
	{
        $this->dropTable('categories');
	}
}