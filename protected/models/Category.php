<?php
/**
 * Author: Adam Bilyamin
 * Date: 11/5/2015
 * Time: 4:43 PM
 */

class Category extends CActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    public function tableName()
    {
        return 'categories';
    }
    public function relations()
    {
        return array(
            'products'=>array(self::HAS_MANY, 'Product', 'category_id'),
        );
    }
    public function rules()
    {
        return array(
            array('name', 'required', 'safe'=>true),
            array('description', 'required', 'safe'=>true),
            array('show_on_home', 'safe', 'on'=>'insert, update')
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

    public function online_products()
    {
        return Product::model()->findAllByAttributes(array('category_id'=>$this->id, 'is_online'=>true));
    }
    public function pending_products()
    {
        return Product::model()->findAllByAttributes(array('category_id'=>$this->id, 'is_online'=>false));
    }
} 