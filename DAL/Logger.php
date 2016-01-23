<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'ILogger.php';

class Logger implements ILogger
{
	private static $_instance = NULL;
	private $_logLevel = 0;
	private $_path = '../../phpauthuser/log/';
	private $_fileName = 'authuser.log';
	private static $_file = NULL;
	
	private function __construct()
	{
		if (is_dir($this->_path))
		{
			mkdir($this->_path);
		}
		
	}

	private function __destruct()
	{
		if (is_file(self::$_file, "w"))
		{
			fclose(self::$_file);
		}
	}

	private function openFile()
	{
		if (!is_file(self::$_file, "w"))
		{
			self::$_file = fopen($this->_fileName, "w") or 
				die("Unable to open file: $this->_path/$this->_fileName !!!");
			$this->Write('File opened\n');
		}
	}
	
	public static function GetInstance()
	{
		if (self::$_instance == NULL)
		{
			self::$_instance = new Logger();
		}
		return self::$_instance;
	}
	

	public function SetLogLevel($level) 
	{
		$this->_logLevel = $level;
	}

	public function Write($data)
	{
		$this->openFile();
		fwrite(self::$_file, date('d/m/Y h:i:s a', time()) . ': ' . $data);
	}

}
