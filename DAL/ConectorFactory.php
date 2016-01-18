<?php

    include_once "../DAL/AppConstants.php";

    interface IConnectorFactory
    {
        public function CreateConnector($storageType);
    }

    class ConnectorFactory implements IConnectorFactory 
    {
        private static $_instance = NULL;
   
        private $_connector = NULL;
    
        private function __construct()
        {
        }
        
        public static function GetInstance($storageType)
        {
            if (self::$_instance == NULL)
            {
                self::$_instance = new DataLayerFactory();

                switch($storageType)
                {
                    case FILE_STORAGE:
                        $_connector = new FileTXT;
                        break;
                    case MYSQL_STORAGE:
                        $_connector = new MySql;
                        break;
                }
            }

            return $_instance;
        }
    
        public function CreateConnector($storageType)
        {
            return $_connector;
        }
    }

?>