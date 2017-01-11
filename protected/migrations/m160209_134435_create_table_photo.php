<?php

class m160209_134435_create_table_photo extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('photos', array(
            'id' => 'pk',
            'url' => 'string NOT NULL',
            'owner_type' => 'string NOT NULL',
            'owner_id' => 'int NOT NULL',
        ));
	}

	public function safeDown()
	{
        $this->dropTable('photos');
	}
}