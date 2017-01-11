<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class AdminIdentity extends CUserIdentity
{
    private $_id;
    private $email;

    function __construct($email, $password)
    {
        $this->email = $email;
        parent::__construct($email, $password);
    }


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
        $record = User::model()->findByAttributes(array('email'=>$this->email));
        if(($record && $record->is_admin) && CPasswordHelper::verifyPassword($this->password,$record->encrypted_password) )
        {
            $this->_id = $record->id;
            $this->setState('email', $record->email);
            $this->setState('role', 'admin');
            return true;
        }
        return false;
    }
    public function getId()
    {
        return $this->_id;
    }
}