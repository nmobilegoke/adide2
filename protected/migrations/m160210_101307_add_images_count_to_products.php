<?php

class m160210_101307_add_images_count_to_products extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->addColumn('products','images_count','int NOT NULL DEFAULT 0');
	}

	public function safeDown()
	{
        $this->dropColumn('products','images_count');
	}
}