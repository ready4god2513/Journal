<?php

class meta_Core
{
	
	
	private static $meta = array();
	
	
	/**
	  * Get the page title
	  * @Developer brandon
	  * @Date May 7, 2010
	  */
	public static function get_title()
	{
		if(!isset(self::$meta['title']))
		{
			return format::friendly_model_name(Router::$controller) . ' :: ' . format::friendly_model_name(Router::$method);
		}
		else
		{
			return strip_tags(self::$meta['title']);
		}
	}
	
	
	/**
	  * Set the title
	  * @Developer brandon
	  * @Date May 7, 2010
	  */
	public static function set_title($title = NULL)
	{
		self::$meta['title'] = $title;
	}
	
	
	/**
	  * Append title
	  * @Developer brandon
	  * @Date May 7, 2010
	  */
	public static function append_title($title = NULL)
	{
		self::$meta['title'] .= $title;
	}
	
	
	/**
	  * Get the page description
	  * @Developer brandon
	  * @Date May 7, 2010
	  */
	public static function get_description()
	{
		if(!isset(self::$meta['description']))
		{
			return NULL;
		}
		else
		{
			return strip_tags(self::$meta['description']);
		}
	}
	
	
	/**
	  * Set the description
	  * @Developer brandon
	  * @Date May 7, 2010
	  */
	public static function set_description($description = NULL)
	{
		self::$meta['description'] = $description;
	}
	
	
	/**
	  * Append description
	  * @Developer brandon
	  * @Date May 7, 2010
	  */
	public static function append_description($description = NULL)
	{
		self::$meta['description'] .= $description;
	}
	
	
	/**
	  * Get the page keywords
	  * @Developer brandon
	  * @Date May 7, 2010
	  */
	public static function get_keywords()
	{
		if(!isset(self::$meta['keywords']))
		{
			return NULL;
		}
		else
		{
			return strip_tags(self::$meta['description']);
		}
	}
	
	
	/**
	  * Set the keywords
	  * @Developer brandon
	  * @Date May 7, 2010
	  */
	public static function set_keywords($keywords = NULL)
	{
		self::$meta['keywords'] = $keywords;
	}
	
	
	/**
	  * Append keywords
	  * @Developer brandon
	  * @Date May 7, 2010
	  */
	public static function append_keywords($keywords = NULL)
	{
		self::$meta['keywords'] .= $keywords;
	}
	
}