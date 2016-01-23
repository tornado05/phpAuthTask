<?php
require_once  'AppConstants.php';

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
    public function __construct($fileName)
    {
		$this->_fileName = '../phpauthtask/data/'. $fileName; 
        if (!file_exists($this->_fileName)){
             mkdir('../phpauthtask/data', 0700, true);
             $this->_file = fopen($this->_fileName, "w") or die("Unable to open file!");
             //file_put_contents($this->_fileName, json_encode($this->usersList));
			 $this->WriteData();
        }         /*
		$path = '../phpauthtask/data/';
        $this->_fileName = $path . $fileName;
		$file = fopen($this->_fileName, "w") or die("Unable to open file!");
		file_put_contents($this->_fileName, json_encode($this->usersList));
		fclose($file);*/
    }
    
    public function ReadData()
    {
		return (json_decode(file_get_contents($this->_fileName), true));
    }
    
    public function WriteData()
    {
		//echo "file: " . $this->_fileName . "\n";
        file_put_contents($this->_fileName, json_encode(self::$_usersList));
    }
}




