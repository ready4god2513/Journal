<?php

class flash_Core
{
	
	/**
	 * Set a flash message error
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $error
	 * @Return void
	 */
	public static function set_error($error = NULL)
	{
		Session::instance()->set_flash('error', $error);
	}
	
	
	/**
	 * Set a flash message alert
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $error
	 * @Return void
	 */
	public static function set_message($alert = NULL)
	{
		Session::instance()->set_flash('alert', $alert);
	}
	
	
	/**
	 * Set an environment flash message
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Param (string) $error
	 * @Return void
	 */
	public static function set_environment_message($message = NULL)
	{
		Session::instance()->set_flash('environment_message', $message);
	}
	
	
	/**
	 * Return the flash message error (if it exists)
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Return string
	 */
	public static function get_error()
	{
		return Session::instance()->get('error');
	}
	
	
	/**
	 * Return the flash message (if it exists)
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Return string
	 */
	public static function get_message()
	{
		return Session::instance()->get('alert');
	}
	
	
	/**
	 * Return the flash environment message error (if it exists)
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 * @Return string
	 */
	public static function get_environment_message()
	{
		return Session::instance()->get('environment_message');
	}
	
}