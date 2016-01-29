<?php
try
{
	if(isset($_POST['data'])) 
	{
		$data = $_POST['data'];		
		try
		{
			$ret = file_put_contents('data.txt', $data, FILE_APPEND | LOCK_EX);
			if(!$ret) 
			{
				throw new Exception('No input exception');
			}		
			else 
			{
				print "$ret bytes written to file";
			}
		}
		catch (Exception $e)
		{
			print 'Catched exception: '.$e->getMessage()."\n";
		}	 
	}
	else 
	{
	   throw new Exception('No post data to process');
	}
}
catch(Exception $ex)
{
	print $ex->getMessage();
}

