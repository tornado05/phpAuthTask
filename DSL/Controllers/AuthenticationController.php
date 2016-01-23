<?php
/**
 * Created by PhpStorm.
 * User: Antonuk
 * Date: 16.01.2016
 * Time: 16:59
 */
require_once __DIR__ . '/DSL/Core.php';
require_once __DIR__ . '/DAL/';

class AuthenticationController
{
    private $login;
    private $password;
    private $token;
    private $ip;

    protected function  __construct()
    {
        $this->login = $this->getLoginFromRequest();
        $this->password = $this->getPasswordFromRequest();
        $this->token = $this->getUserToken();
        $this->ip = $this->getIpFromRequest();
    }
	
    /**
     *
     * @return
     */
    public function getUserData() {
        $dataLayer = new IDataLayer();
        $user = null;
        if($this->token == null)
        {
            $user = $dataLayer->getUser($this->login, $this->password);
            $this->token = createToken();
        }
        else
        {
            $user = $dataLayer->getUserByToken($this->token, $this->ip);
        }
        return $user;
    }

    private function createToken()
    {
        return $token = substr( date('mdHiYs') . rand(100, 999), 0, 128);
    }

    private function getLoginFromRequest()
    {
        return $_REQUEST['login'];
    }

    private function getPasswordFromRequest()
    {
        return $_REQUEST['password'];
    }

    private function getIpFromRequest()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    private function getUserToken()
    {
        return $_SERVER['token'];
    }
} 