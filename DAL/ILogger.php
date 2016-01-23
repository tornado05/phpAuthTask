<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.01.2016
 * Tim
 *
 *
 *
 *
 *
 **/

 interface ILogger
 {
    public function SetLogLevel($level);
    public function Write($data);
 }