<?php

class m160121_172644_create_user extends CDbMigration
{

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('users', array(
            'id' => 'pk',
            'first_name' => 'string NOT NULL',
            'last_name' => 'string NOT NULL',
            'email' => 'string NOT NULL',
            'encrypted_password' => 'string NOT NULL',
            'created_at' => 'timestamp NOT NULL',
            'updated_at' => 'timestamp NOT NULL',
        ));
	}

	public function safeDown()
	{
        $this->dropTable('users');
	}
}