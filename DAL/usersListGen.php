<?php
require_once  'AppConstants.php';

/**
 * Class UserListGenerator provides with test set of passwords and logins as Associative Array
 */
class UserListGenerator
{
	private static $_usersList = array(
    0 => array(
        AppConstants::LOGIN => 'test0',
        AppConstants::PASSWORD => 'testpass0',
        AppConstants::IP => '',
        AppConstants::TOKEN => '',
    ),    
    1 => array(
        AppConstants::LOGIN => 'test1',
        AppConstants::PASSWORD => 'testpass1',
        AppConstants::IP => '',
        AppConstants::TOKEN => '',
    ),    
    2 => array(
        AppConstants::LOGIN => 'test2',
        AppConstants::PASSWORD => 'testpass2',
        AppConstants::IP => '',
        AppConstants::TOKEN => '',
    ),    
    3 => array(
        AppConstants::LOGIN => 'test3',
        AppConstants::PASSWORD => 'testpass3',
        AppConstants::IP => '',
        AppConstants::TOKEN => '',
    ),    
    4 => array(
        AppConstants::LOGIN => 'test4',
        AppConstants::PASSWORD => 'testpass4',
        AppConstants::IP => '',
        AppConstants::TOKEN => '',
    ),    
);
private $_fileName;

	/**
     * UserListGenerator default constructor.
     * @access public
     * @param string $fileName file name with set of passwords and logins to be set as default
     */
	public function __construct($fileName)
    {
		$path = '../phpauthtask/data/';
		$this->_fileName = $path . $fileName; 
		
		if (!is_dir($path))
		{
	         mkdir($path, 0700, true);
		}
		$this->WriteData();
         
    }
    /**
     * @return string decoded from JSON formatted file
     */    
    public function ReadData()
    {
		return (json_decode(file_get_contents($this->_fileName), true));
    }
    

    /**
     * Puts encoded json data to file
     */
	public function WriteData()
    {
		$file = fopen($this->_fileName, "w") or die("Unable to open file!");
        file_put_contents($this->_fileName, json_encode(self::$_usersList));
		fclose($file);
		echo ('Write completed.'. "\n");
    }
}




