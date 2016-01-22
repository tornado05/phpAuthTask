<?php

    require_once 'AppConstants.php';
	require_once 'FileDataConnector.php';
    class DataLayer
    {
        private static $_connector = NULL;
    		
        public static function Init($storageType)
        {
			echo 'StorageType: ' . $storageType . "\n";
			echo 'Connector: ' . self::$_connector . "\n";
            if (self::$_connector == NULL)
            {
                switch($storageType)
                {
                    case AppConstants::FILE_STORAGE:
						echo 'File';
                        self::$_connector = new FileDataConnector();
                        break;
                    case AppConstants::MYSQL_STORAGE:
                        self::$_connector = new MySql;
                        break;
                }
            }

            return self::$_connector;
        }
		
		public function GetConnector()
		{
			return self::Init(AppConstants::FILE_STORAGE);
		}
	}