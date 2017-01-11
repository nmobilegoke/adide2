<?php

class m160518_071201_add_show_on_home_to_categories extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->addColumn('categories','show_on_home','tinyint(1) DEFAULT 1');
	}

	public function safeDown()
	{
        $this->dropColumn('categories', 'show_on_home');
	}
}