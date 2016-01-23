<?php

    require_once 'AppConstants.php';
	require_once 'FileDataConnector.php';

/**
 * Class DataLayer provides User with the specific type connector to data storage
 */
class DataLayer
    {
        private static $_connector = NULL;

    /**
     * Function is initializing App data storage
     * @param string $storageType
     * @return FileDataConnector|MySql|null return the specific type connector
     */
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

    /**
     * Function return the specific type connector
     * @return FileDataConnector|MySql|null processes init procedure
     */
    public function GetConnector()
		{
			return self::Init(AppConstants::FILE_STORAGE);
		}
	}
	