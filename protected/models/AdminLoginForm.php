<?php
/**
 * This file is part of nshopper project
 * Author: Adam Bilyamin
 * Date: 1/21/2016
 * Time: 6:07 PM
 */

class AdminLoginForm extends CFormModel
{
    public $email;
    public $password;
    public $rememberMe;

    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            // email and password are required
            array('email, password', 'required'),
            // rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
            // password needs to be authenticated
            array('password', 'authenticate'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'email' => 'Email Address',
            'rememberMe'=>'Remember me',
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $this->_identity = new AdminIdentity($this->email,$this->password);
            if(!$this->_identity->authenticate())
            {
                $this->addError('password','Incorrect email or password.');
            }
        }

    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login()
    {
        if($this->_identity===null)
        {
            $this->_identity = new AdminIdentity($this->email,$this->password);
        }
        if($this->_identity->authenticate())
        {
            $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
            Yii::app()->user->login($this->_identity,$duration);
            return true;
        }
        else
        {
            return false;
        }

    }
}
