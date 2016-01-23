<?php

/**
 * Interface IDataLayer common DAL interface for general purposes
 */
interface IDataLayer
    {
        /**
         * @param string $login input User's login to be searched
         * @param string $password input User's password to be searched
         * @return mixed return User entity
         */
        public function getUser($login, $password);

        /**
         * @param string $token input current User's token to be searched
         * @param string $ip input current User's IP to be searched
         * @return mixed return User entity
         */
        public function getUserByToken($token, $ip);

        /**
         * @param string $token current User's Token to be destroyed
         * @return mixed nothing returns
         */
        public function destroyToken($token);

        /**
         * @param integer $id current User's ID
         * @param string $token current User's Token to be set
         * @param string $ip current User's IP
         * @return mixed nothing returns
         */
        public function setToken($id, $token, $ip);
    }
?>