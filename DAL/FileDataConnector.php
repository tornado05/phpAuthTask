<?php

	require_once "AppConstants.php";
	require_once "IDataLayer.php";
	require_once 'usersListGen.php';
	require_once 'Logger.php';
	
	/**
	 * Class FileDataConnector implements IDataLayer interface
	 */
	class FileDataConnector implements IDataLayer
	{
		private static $_data = NULL;
		private $_logger;

		/**
		 *Reads all data from file
		 */
		private function getDataFromFile()
		{
			$logLevel = LogLevels::INFO;
			if (self::$_data == NULL)
			{
				$usersList = new UserListGenerator(AppConstants::FILE_NAME);
				self::$_data = $usersList->ReadData();
				$this->_logger->WriteLog( 'Data loaded. Data length: ' . count(self::$_data), $logLevel);
			}
		}

		/**
		 * FileDataConnector default constructor.
		 */
		public function __construct()
		{
			$this->_logger = Logger::GetInstance();
			$this->getDataFromFile();
		}

		/**
		 * @param string $login input User's login to be searched
		 * @param string $password input User's password to be searched
		 * @return mixed return User entity or return NULL otherwise
		 */
		public function getUser($login, $password)
		{
			$_user = NULL;
			$logLevel = LogLevels::INFO;
			foreach( self::$_data as $key => $val)
			{
				$this->_logger->WriteLog('Searching user.', $logLevel);
				if ($val[AppConstants::LOGIN] == $login && $val[AppConstants::PASSWORD] == $password)
				{
					$this->_logger->WriteLog("user $login found", $logLevel);
					$_user = $val;
					$_user[AppConstants::ID] = (integer)$key;

					break;
				}
			}
			if ($_user == NULL)
			{
				$this->_logger->WriteLog("User: $login with password not found", LogLevels::ERROR);
			}
			return $_user;
		}

		/**
		 *
		 * @param string $token input current User's token to be searched
		 * @param string $ip input current User's IP to be searched
		 * @return mixed return User entity or return NULL otherwise
		 */
		public function getUserByToken($token, $ip)
		{
			$_user = NULL;
			$logLevel = LogLevels::INFO;
			foreach( self::$_data as $key => $val)
			{
				if ($val[AppConstants::TOKEN] == $token && $val[AppConstants::IP] == $ip)
				{
					$this->_logger->WriteLog("Pair token <=> ip found", $logLevel);
					$_user = $val;
					$_user[AppConstants::ID] = (integer)$key;
					break;
				}
			}
			if ($_user == NULL)
			{
				$this->_logger->WriteLog("Token: $token for IP:L $ip not found!" , LogLevels::ERROR);
			}
			return $_user;
		}
		
		/**
		 * @param string $token current User's Token to be destroyed
		 * @return mixed nothing returns
		 */
		public function destroyToken($token)
		{
			$isTokenExistFlg = false;
			$logLevel = LogLevels::INFO;
			foreach( self::$_data as $key => $val)
			{
				if ($val[AppConstants::TOKEN] == $token)
				{
					$val[AppConstants::TOKEN] = '';
					$isTokenExistFlg = true;
					$this->_logger->WriteLog("Token for user " . $val[AppConstants::LOGIN] . " cleared",
							$logLevel);
					break;
				}
			}
			if (!$isTokenExistFlg)
			{
				$this->_logger->WriteLog('Token not found', LogLevels::ERROR);
			}
		}

		/**
		 * @param integer $id current User's ID
		 * @param string $token current User's Token to be set
		 * @param string $ip current User's IP
		 * @return mixed nothing returns
		 */
		public function setToken($id, $token, $ip)
		{
			$_user = self::$_data[$id];
			$logLevel = LogLevels::INFO;
			
			if ($_user != NULL && self::$_data[$id][AppConstants::IP] == $ip)
			{
				self::$_data[$id][AppConstants::TOKEN] = $token;
				$this->_logger->WriteLog("Token for user $_user saved", $logLevel);
			}
			else
			{
				$this->_logger->WriteLog('User or IP is wrong.', LogLevels::ERROR);
			}
		}
	}
