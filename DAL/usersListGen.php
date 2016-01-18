<?php


$usersList = array(
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

class UserListGenerator
{
    private $_fileName;
    public function __construct($fileName)
    {
        $this.$_fileName = '../Data/' . $fileName;
    }
    
    public function Serialize($userList)
    {
        return json_encode($userList);
    }
    
    public function WriteToDisk($usersList)
    {
        file_put_contents($this.$_fileName, $usersList);
    }
}


?>