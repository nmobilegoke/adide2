<?php

class m160216_085422_add_is_admin_to_users extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->addColumn('users', 'is_admin', 'tinyint(1) DEFAULT 0');
	}

	public function safeDown()
	{
        $this->dropColumn('users', 'is_admin');
	}
}