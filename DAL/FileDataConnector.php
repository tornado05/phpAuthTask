<?php

	require_once "AppConstants.php";
	require_once "IDataLayer.php";
	require_once 'usersListGen.php';

/**
 * Class FileDataConnector implements IDataLayer interface
 */
class FileDataConnector implements IDataLayer
	{
		private static $_data = NULL;

	/**
	 *Reads all data from file
     */
	private function getDataFromFile()
		{
			if (self::$_data == NULL)
			{
				$usersList = new UserListGenerator(AppConstants::FILE_NAME);
				self::$_data = $usersList->ReadData();
				echo 'Data loaded. Data length: ' . count(self::$_data) . "\n";
			}
		}

	/**
	 * FileDataConnector default constructor.
     */
	public function __construct()
		{
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

	/**
	 *
	 * @param string $token input current User's token to be searched
	 * @param string $ip input current User's IP to be searched
	 * @return mixed return User entity or return NULL otherwise
	 */
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
	/**
	 * @param string $token current User's Token to be destroyed
	 * @return mixed nothing returns
	 */
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

	/**
	 * @param integer $id current User's ID
	 * @param string $token current User's Token to be set
	 * @param string $ip current User's IP
	 * @return mixed nothing returns
	 */
	public function setToken($id, $token, $ip)
		{
			$_user = self::$_data[$id];
			if ($_user != NULL && self::$_data[$id][AppConstants::IP] == $ip)
			{
				self::$_data[$id][AppConstants::TOKEN] = $token;
			}
		}
	}
