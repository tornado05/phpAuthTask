<?php

    interface IDataLayer //common interface
    {
        public function getUser($login, $password);
        public function getUserByToken($token, $ip);
        public function destroyToken($token);
        public function setToken($id, $token, $ip);    
    }
?>