<?php

class nav_Core
{
	
	/**
	  * All of the items currently in the menu
	  * @developer Brandon Hansen
	  * @date May 23, 2010
	  */
	private static $items  = array();
	
	
	/**
	  * Add a navigation item to the menu
	  * @developer Brandon Hansen
	  * @date May 23, 2010
	  */
	public static function add($url, $text)
	{
		self::$items[$url] = $text;
	}
	
	
	/**
	  * Remove an item from the menu
	  * @developer Brandon Hansen
	  * @date May 23, 2010
	  */
	public static function remove($key)
	{
		unset(self::$items[$key]);
	}
	
	
	/**
	  * Output the menu items
	  * @developer Brandon Hansen
	  * @date May 23, 2010
	  */
	public static function output($echo = true)
	{
		$menu = NULL;
		
		foreach(self::$items as $url => $text)
		{
			$menu .= html::anchor($url, $text) . "	\n";
		}
		
		if($echo)
		{
			echo $menu;
		}
		else
		{
			return $menu;
		}
	}
	
	
}