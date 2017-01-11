<?php
/**
 * This file is part of nshopper project
 * Author: Adam Bilyamin
 * Date: 1/21/2016
 * Time: 3:37 PM
 */

Yii::setPathOfAlias('Imagine',Yii::getPathOfAlias('application.vendors.Imagine'));
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class AdminIdentityx extends  CBaseUserIdentity
{
    private $id;
    private $email;
    private $password;
    private $errorCode;
    const ERROR_EMAIL_INVALID = 1;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $record = AdminUser::model()->findByAttributes(array('email'=>$this->email));
        if($record === null)
        {
            $this->errorCode=self::ERROR_EMAIL_INVALID;
        }
        else if(!CPasswordHelper::verifyPassword($this->password,$record->password))
        {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        else
        {
            $this->_id = $record->id;
            $this->setState('title', $record->email);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
    public function getId()
    {
        return $this->id;
    }
}