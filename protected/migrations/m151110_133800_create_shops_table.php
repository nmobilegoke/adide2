<?php

class m151110_133800_create_shops_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('shops', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'slug' => 'string',
            'address' => 'text',
            'phone' => 'string',
        ));
	}
	public function safeDown()
	{
        $this->dropTable('shops');
	}
}