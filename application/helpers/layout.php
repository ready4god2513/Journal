<?php

class layout_Core
{
	
	/**
	  * All of the items currently in the layout
	  * @developer Brandon Hansen
	  * @date May 23, 2010
	  */
	private static $items  = array();
	
	
	/**
	  * Add an item to the page
	  * @developer Brandon Hansen
	  * @date May 23, 2010
	  */
	public static function add($item, $area = 'footer')
	{
		self::$items[$area][] = $item;
	}
	
	
	/**
	  * Output the page area
	  * @developer Brandon Hansen
	  * @date May 23, 2010
	  */
	public static function output($area, $echo = true)
	{
		$output = NULL;
		
		if(!isset(self::$items[$area]))
		{
			self::$items[$area] = array();
		}
		
		foreach(self::$items[$area] as $item)
		{
			$output .= $item . "	\n";
		}
		
		if($echo)
		{
			echo $output;
		}
		else
		{
			return $output;
		}
	}
	
	
}