<?php

    require_once 'AppConstants.php';
	require_once 'FileDataConnector.php';
	require_once 'Logger.php';

/**
 * Class DataLayer provides User with the specific type connector to data storage
 */
class DataLayer
{
        private static $_connector = NULL;
		private $_logger;
		
    /**
     * Function is initializing App data storage
     * @param string $storageType
     * @return FileDataConnector|MySql|null return the specific type connector
     */
    public static function Init($storageType)
	{
		$this->_logger = Logger::GetInstance();
		$logLevel = LogLevels::INFO;
		if (self::$_connector == NULL)
		{
			switch($storageType)
			{
				default :
				case AppConstants::FILE_STORAGE:
					self::$_connector = new FileDataConnector();
					$this->_logger->WriteLog('File data storage inited.', $logLevel);
					break;
				case AppConstants::MYSQL_STORAGE:
					self::$_connector = new MySql;
					$this->_logger->WriteLog('SQL data storage inited.', $logLevel);
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
	