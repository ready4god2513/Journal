<?php

class statics_Core
{
	
	/**
	  * Create the navigation
	  * @Developer brandon
	  * @Date May 19, 2010
	  */
	public static function navigation()
	{
		return ORM::factory('static')->find_all();	
	}
	
	
}