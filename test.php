<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'DAL/DataLayer.php';
require_once 'DAL/usersListGen.php';
require_once 'DAL/AppConstants.php';

$serializer = new UserListGenerator('userList.json');
//$serializer->WriteData();
$tmp = new DataLayer();
//echo 'DataLayer: ' . $tmp;
$connector = $tmp->GetConnector();

$user = $connector->getUser('test0', 'testpass0');

echo ('User: '. $user[AppConstants::LOGIN]. "\n");


