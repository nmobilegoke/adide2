<?php

class m160407_121410_create_promo_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->createTable('promos', array(
            'id' => 'pk',
            'title' => 'string NOT NULL',
            'description' => 'text',
            'active' => 'tinyint(1) DEFAULT 0',
            'saving_rate' => 'float NOT NULL',
        ));
	}

	public function safeDown()
	{
        $this->dropTable('promos');
	}
}