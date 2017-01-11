<?php

class m151113_142258_add_images_to_products extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $this->addColumn('products', 'image_1', 'string');
        $this->addColumn('products', 'image_2', 'string');
        $this->addColumn('products', 'image_3', 'string');
        $this->addColumn('products', 'image_4', 'string');
        $this->addColumn('products', 'image_5', 'string');
	}

	public function safeDown()
	{
        $this->dropColumn('products', 'image_1', 'string');
        $this->dropColumn('products', 'image_2', 'string');
        $this->dropColumn('products', 'image_3', 'string');
        $this->dropColumn('products', 'image_4', 'string');
        $this->dropColumn('products', 'image_5', 'string');
	}
}