<?php
require_once  'AppConstants.php';

/**
 * Class UserListGenerator provides with test set of passwords and logins as Associative Array
 */
class UserListGenerator
{
	private static $_usersList = array(
    0 => array(
        'LOGIN' => 'test0',
        'PASSWORD' => 'testpass0',
        'IP' => '',
        'TOKEN' => '',
    ),    
    1 => array(
        'LOGIN' => 'test1',
        'PASSWORD' => 'testpass1',
        'IP' => '',
        'TOKEN' => '',
    ),    
    2 => array(
        'LOGIN' => 'test2',
        'PASSWORD' => 'testpass2',
        'IP' => '',
        'TOKEN' => '',
    ),    
    3 => array(
        'LOGIN' => 'test3',
        'PASSWORD' => 'testpass3',
        'IP' => '',
        'TOKEN' => '',
    ),    
    4 => array(
        'LOGIN' => 'test4',
        'PASSWORD' => 'testpass4',
        'IP' => '',
        'TOKEN' => '',
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
        $path = '/data/';

        if ( $this->folder_exist($path)) {
            $this->_fileName = $path . $fileName;
            $file = fopen($this->_fileName, "w") or die("Unable to open file!");
            file_put_contents($this->_fileName, json_encode(self::$_usersList));  //json_encode($this->_usersList));
            fclose($file);
        }
    }

    /**
     * Function checks existence of the folder
     * @param string $folder input folder path to be checked
     * @return bool|string returns absolute pathname or return FALSE if folder does not exist
     */
    public function folder_exist($folder)
    {
       $path = realpath($folder);
        if($path !== false AND is_dir($path))
        {
            return $path;
        }

        // Path/folder does not exist
        return false;
    }



    /**
     * @return string encoded from JSON formatted file
     */
    public function ReadData()
    {
        return json_encode(self::$_usersList, false);
    }

    /**
     * Puts all data to file
     */
    public function WriteData()
    {
		//echo "file: " . $this->_fileName . "\n";
        file_put_contents($this->_fileName, self::$_usersList);
    }
}




