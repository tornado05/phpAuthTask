<?php

    include_once "AppConstants";

    interface IConnectorFactory
    {
        public function CreateConnector($storageType);
    }

    class ConnectorFactory implements IConnectorFactory {
        private $returnConnector = NULL;
        public function CreateConnector($storageType)
        {

            switch(tolower($storageType)) {
                case FILE_STORAGE:
                    $returnConnector = new FileTXT;
                    break;
                case MYSQL_STORAGE:
                    $returnConnector = new MySql;
                    break;
            }
            return $returnConnector;
        }
    }

?>