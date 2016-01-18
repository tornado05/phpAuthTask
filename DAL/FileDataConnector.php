<?php

	include_once "./AppConstants.php";
	include_once "IDataLayer.php";

	class FileDataConnector implements IDataLayer
	{
		private static $_data = NULL; 

		private function getDataFromFile()
		{
			if (self::$_data == NULL)
			{
				$fileData = file_get_contents(AppConstants::FILE_NAME);
				self::$_data = json_decode($fileData);
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
				if ($val[AppConstants::LOGIN] == $login && $val[AppConstants::LOGIN] == $password)
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
