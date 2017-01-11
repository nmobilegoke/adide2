<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class NUserIdentity extends CUserIdentity
{
    private $_id;
    private $email;
    public $CONNECTION_ERROR = false;

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
        //do nmobile api calls here
        try
        {
            $client = new \GuzzleHttp\Client();
            $request = $client->createRequest('POST', 'https://nmobile.ng', ['json' => ['email' => $this->email, 'password'=>$this->password]]);
            $response = $client->send($request);
            $response->getBody();
            dg('Authentication response: ! '.$response);
            //do something like $response->getBody()->status === 'success'
            if(true)
            {
                $this->_id = $this->email;
                $this->setState('email', $this->email);
                $this->setState('role', 'authenticated');
                dg('Authentication Success: ! '.$this->email.' success.');
                return true;
            }
            else
            {
                dg('Authentication Error: ! '.$this->email.' access denied.');
            }
        }
        catch(\GuzzleHttp\Exception\RequestException $e)
        {
            $this->CONNECTION_ERROR = true;
            dg('Authentication Error: nmobile connection failed!');
        }
        return false;
    }
    public function getId()
    {
        return $this->_id;
    }
}