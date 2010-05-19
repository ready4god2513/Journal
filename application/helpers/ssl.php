<?php defined('SYSPATH') or die('No direct script access.');

class ssl_Core 
{
	
	/**
	 * Force the page to be output over ssl
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 */
	public static function force_ssl() 
	{
		if ($_SERVER["SERVER_PORT"] != self::https_port()) 
		{
			url::redirect(url::site(url::current(),"https"));
		}
	}
	
	
	/**
	 * Force the page to be output over port 80
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 */
	public static function avoid_ssl() 
	{
		if ($_SERVER["SERVER_PORT"] == self::https_port() && self::https_port() != 80) 
		{
			url::redirect(url::site(url::current(),"http"));
		}
	}
	
	
	/**
	 * Return the port that this environment is using for secure.  On the dev boxes, this is going to be port 80
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Return (string)
	 */
	public static function https_port() 
	{
		if (Kohana::config('config.https') == 'https') 
		{
			return "443";
		} 
		else 
		{
			return "80";
		}
	}
	
	
	/**
	 * Make sure that we are going over the correct protocal for loading resources
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Return (string)
	 */
	public static function correct_http()
	{
		return $_SERVER["SERVER_PORT"] == "443" ? "https" : "http";
	}

}