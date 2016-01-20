<?php
require_once __DIR__ . '/Controllers/AuthenticationController.php';

final class Core extends AuthenticationController
{
    private static $instance;

    /**
     * @desc
     * @return Core
     */
    public static function getInstance()
    {
        if (!self::$instance)
        {
            self::$instance = new Core();
        }
        return self::$instance;
    }

    protected function  __construct()
    {

    }


    public function executeRequest(){
        return parent::getUserData();
    }

} 