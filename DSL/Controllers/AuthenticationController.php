<?php
/**
 * Created by PhpStorm.
 * User: Antonuk
 * Date: 16.01.2016
 * Time: 16:59
 */
require_once __DIR__ . '/../Core.php';
require_once __DIR__ . '/../../DAL/FileDataConnector.php';


class AuthenticationController
{
    private $login;
    private $password;
    private $token;
    private $ip;
    private $FileDataConnector;

    protected function  __construct()
    {
        $this->FileDataConnector = new FileDataConnector();
    }
	
    /**
     * @return
     */
    public function getUserData() {
        $this->login = $this->getLoginFromRequest();
        $this->password = $this->getPasswordFromRequest();
        $this->token = $this->getUserToken();
        $this->ip = $this->getIpFromRequest();

        $user = null;
        if(!$this->token)
        {
            $user = $this->FileDataConnector->getUser($this->login, $this->password);
            if ($user) {
                $this->token = $this->createToken();
                //$this->FileDataConnector->setToken('id', ) ;
            } else {
                header("HTTP/1.0 401 Not Authorized");
                return null;
            }

        }
        else
        {
            // TODO: authorize user here
            $user = $this->FileDataConnector->getUserByToken($this->token, $this->ip);
        }

        return json_encode(array("token" => $this->token));
    }

    private function createToken()
    {
        return $token = substr( date('mdHiYs') . rand(100, 999), 0, 128);
    }

    private function getLoginFromRequest()
    {
        return (isset($_REQUEST['login'])) ? $_REQUEST['login'] : null;
    }

    private function getPasswordFromRequest()
    {
        return (isset($_REQUEST['password'])) ? $_REQUEST['password'] : null;
    }

    private function getIpFromRequest()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    private function getUserToken()
    {
        return (isset($_SERVER['token'])) ? $_SERVER['token'] : null;
    }
} 