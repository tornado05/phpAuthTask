<?php

	require_once "AppConstants.php";
	require_once "IDataLayer.php";
	require_once 'usersListGen.php';
	
	class FileDataConnector implements IDataLayer
	{
		private static $_data = NULL; 

		private function getDataFromFile()
		{
			if (self::$_data == NULL)
			{
				$usersList = new UserListGenerator(AppConstants::FILE_NAME);
				self::$_data = $usersList->ReadData();
				echo 'Data loaded. Data length: ' . count(self::$_data) . "\n";
			}
		}

		public function __construct()
		{
			$this->getDataFromFile();
		}

		public function getUser($login, $password)
		{
			$_user = NULL;
			foreach( self::$_data as $key => $val)
			{
				//echo "\n\nLogin: " . $login . "\n\n";
				if ($val[AppConstants::LOGIN] == $login && $val[AppConstants::PASSWORD] == $password)
				{
					$_user = $val;
					break;
				}
			}
			return $_user;
		}

		public function getUserByToken($token, $ip)
		{
			$_user = NULL;
			foreach( self::$_data as $key => $val)
			{
				if ($val[AppConstants::TOKEN] == $token && $val[AppConstants::IP] == $ip)
				{
					$_user = $val;
					break;
				}
			}
			return $_user;
		}

		public function destroyToken($token)
		{
			foreach( self::$_data as $key => $val)
			{
				if ($val[AppConstants::TOKEN] == $token)
				{
					$val[AppConstants::TOKEN] = '';
					break;
				}
			}
		}

		public function setToken($id, $token, $ip)
		{
			$_user = self::$_data[$id];
			if ($_user != NULL && self::$_data[$id][AppConstants::IP] == $ip)
			{
				self::$_data[$id][AppConstants::TOKEN] = $token;
			}
		}
	}
