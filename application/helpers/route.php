<?php

class route_Core
{
	

	/**
	  * Find the route for a given object
	  * @developer Brandon Hansen
	  * @date May 16, 2010
	  */
	public static function find($object_name, $method = 'index')
	{
		return url::site($object_name . '/' . $method);
	}
		
	
}