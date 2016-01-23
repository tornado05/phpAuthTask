<?php
require_once  'AppConstants.php';

class UserListGenerator
{
	private static $_usersList = array(
    0 => array(
        LOGIN => 'test0',
        PASSWORD => 'testpass0',
        IP => '',
        TOKEN => '',
    ),    
    1 => array(
        LOGIN => 'test1',
        PASSWORD => 'testpass1',
        IP => '',
        TOKEN => '',
    ),    
    2 => array(
        LOGIN => 'test2',
        PASSWORD => 'testpass2',
        IP => '',
        TOKEN => '',
    ),    
    3 => array(
        LOGIN => 'test3',
        PASSWORD => 'testpass3',
        IP => '',
        TOKEN => '',
    ),    
    4 => array(
        LOGIN => 'test4',
        PASSWORD => 'testpass4',
        IP => '',
        TOKEN => '',
    ),    
);

private $_fileName;
    public function __construct($fileName)
    {
		$path = '../phpauthtask/data/';
        $this->_fileName = $path . $fileName;
		$file = fopen($this->_fileName, "w") or die("Unable to open file!");
		file_put_contents($this->_fileName, json_encode($this->usersList));
		fclose($file);
    }
    
    public function ReadData()
    {
        return json_encode(self::$_usersList, false);
    }
    
    public function WriteData()
    {
		echo "file: " . $this->_fileName . "\n";
        file_put_contents($this->_fileName, self::$_usersList);
    }
}




