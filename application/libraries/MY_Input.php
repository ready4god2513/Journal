<?php

class Input extends Input_Core
{
	
	protected static $raw;
	

	/**
	  * Save the raw input data
	  * @Developer brandon
	  * @Date Apr 22, 2010
	  */
	public function __construct()
	{
		if(!self::$raw)
		{
			self::$raw = $_POST;
		}
		
		parent::__construct();
	}
	
	
	/**
	  * Get the raw data out
	  * @Developer brandon
	  * @Date Apr 22, 2010
	  */
	public function raw($key = '')
	{
		if(!$key)
		{
			return self::$raw;
		}
		else
		{
			if(array_key_exists($key, self::$raw))
			{
				return stripcslashes(self::$raw[$key]);
			}
			else
			{
				return null;
			}
		}
	}
	
}