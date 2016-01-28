<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	require_once 'ILogger.php';

	/**
	* Class LogLevels contains log levels constants
	*/
	class LogLevels
	{
		const EMERGENCY = 0;
		const ALERT = 1;
		const CRITICAL = 2;
		const ERROR = 3;
		const WARNING = 4;
		const NOTICE = 5;
		const INFO = 6;
		const DEBUG = 7;
		
		private static $_levelDescriptions = array(
			LogLevels::EMERGENCY	=> 'Emergency',
			LogLevels::ALERT		=> 'Alert',
			LogLevels::CRITICAL		=> 'Critical',
			LogLevels::ERROR		=> 'Error',
			LogLevels::WARNING		=> 'Warning',
			LogLevels::NOTICE		=> 'Notice',
			LogLevels::INFO			=> 'Info',
			LogLevels::DEBUG		=> 'Debug',
		);
		
		/**
		 * returns text represent of log level
		 * @param type $level - int log level
		 * @return string
		 */
		public static function GetLevelDescription($level)
		{
			return self::$_levelDescriptions[$level];
		}
	}
	
	/**
	* Class Logger created for writing logs to file
	*/
	class Logger implements ILogger
	{
		private static $_instance = NULL;
		private static $_logLevel = LogLevels::INFO;
		private $_path = '../phpauthtask/log/';
		private $_fileName = 'authuser.log';
		
		private function __construct()
		{
			if (!is_dir($this->_path))
			{
				mkdir($this->_path);
			}
		}

		/**
		 * @param none
		 * @return instance of Logger class
		 */
		public static function GetInstance()
		{
			if (self::$_instance == NULL)
			{
				self::$_instance = new Logger();
			}
			return self::$_instance;
		}

		/**
		 * Set internal log level.
		 * Not use for now
		 * @param $level int log level
		 * @return none
		 */
		public function SetLogLevel($level) 
		{
			$this->_logLevel = $level;
		}

		/**
		 * Write log message data to file.
		 * @param string $data
		 * @return none
		 */
		public function Write($data)
		{
			date_default_timezone_set('Europe/Kiev');
			$fullFName = $this->_path . '/' . $this->_fileName;
			$date = new DateTime();
			file_put_contents(
					$fullFName, 
					'[' . $date->format('Y-m-d H:i:s') . '] ' . $data . "\n", 
					FILE_APPEND
					);
		}

		/**
		 * Check log level and write log message data to file.
		 * @param string $data
		 * @return none
		 */
		public function WriteLog($data, $logLevel)
		{
			if ($logLevel <= self::$_logLevel)
			{
				$this->Write(LogLevels::GetLevelDescription($logLevel) . ': ' . $data);
			}
		}
	}

?>



