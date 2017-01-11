<?php
/**
 * Author: Adam Bilyamin
 * Date: 11/5/2015
 * Time: 4:45 PM
 */

class Order extends CActiveRecord
{
    const STATE_PENDING = 'PENDING';
    const STATE_CONFIRMED = 'CONFIRMED';
    const STATE_PROCESSING = 'PROCESSING';
    const STATE_SENT = 'SENT';
    const STATE_DELIVERED = 'DELIVERED';
    const STATE_CANCELLED = 'CANCELLED';
    const STATE_RETURNED = 'RETURNED';

    const PAYMENT_STATE_NOT_PAID = 'NOT PAID';
    const PAYMENT_STATE_PAID = 'PAID';
    const PAYMENT_STATE_REFUNDED = 'REFUNDED';

    const DELIVERY_STATE_NOT_DELIVER  = 'PROCESSING';
    const DELIVERY_STATE_DELIVERED = 'DELIVERED';
    const DELIVERY_STATE_RETURNED = 'RETURNED';

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    public function tableName()
    {
        return 'orders';
    }
    public function relations()
    {
        return array(
            'product'=>array(self::BELONGS_TO, 'Product', 'product_id'),
            'customer'=>array(self::BELONGS_TO, 'User', 'user_id'),
            'shop'=>array(self::BELONGS_TO, 'Shop', 'shop_id'),
        );
    }
    public static function findAllPendings()
    {
        return self::findAllByAttributes(array('state'=> self::STATE_PENDING));
    }
    public static function findAllConfirmed()
    {
        return self::findAllByAttributes(array('state' => self::STATE_CONFIRMED));
    }
} 