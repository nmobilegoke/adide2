<?php
/**
 * Author: Adam Bilyamin
 * Date: 11/5/2015
 * Time: 5:46 PM
 */

class Shop extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    public function tableName()
    {
        return 'shops';
    }
    public function relations()
    {
        return array(
            'products'=>array(self::HAS_MANY, 'Product', 'shop_id'),
            'categories'=>array(self::HAS_MANY, 'Category', 'shop_id'),
            'orders'=>array(self::HAS_MANY, 'Order', 'shop_id'),
        );
    }
    public function rules()
    {
        return array(
            array('name', 'required', 'safe'=>true),
        );
    }
    /**
     * Behaviors for this model
     */
    public function behaviors(){
        return array(
            'sluggable' => array(
                'class'=>'ext.yii-behavior-sluggable.SluggableBehavior',
                'columns' => array('name'),
                'unique' => true,
                'update' => true,
            ),
        );
    }
} 