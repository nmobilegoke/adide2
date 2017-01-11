<?php
/**
 * Author: Adam Bilyamin
 * Date: 11/5/2015
 * Time: 4:12 PM
 */

class Product extends CActiveRecord
{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'products';
    }
    public function relations()
    {
        return array(
            'category'=>array(self::BELONGS_TO, 'Category', 'category_id'),
            'promos' => array(self::MANY_MANY, 'Promo', 'product_promo(product_id, promo_id)')
        );
    }
    public function rules()
    {
        return array(
            array('name', 'required', 'safe'=>true, 'on'=>'insert, update'),
            array('short_description', 'required', 'safe'=>true, 'on'=>'insert, update'),
            array('long_description', 'safe', 'on'=>'insert, update'),
            array('price', 'required', 'safe'=>true, 'on'=>'insert, update'),
            array('stock', 'required', 'safe'=>true, 'on'=>'insert, update'),
            array('category_id', 'required', 'safe'=>true, 'on'=>'insert, update'),
            array('brand', 'required', 'safe'=>true, 'on'=>'insert, update'),
            array('is_online', 'safe', 'on'=>'update'),
            array('show_on_home', 'safe', 'on'=>'update'),
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

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'category_id' => 'Category',
            'short_description'=>'Description'
        );
    }

    /**
     * @return mixed
     */
    public static function imageAbsoluteUrl($file)
    {
        return Yii::app()->baseUrl.$file;
    }
} 