<?php


class topics_Core
{
	
	
	/**
	  * Find all topics
	  * @developer Brandon Hansen
	  * @date May 23, 2010
	  */
	public static function find()
	{
		return ORM::factory('topic')->find_all();	
	}
	
}