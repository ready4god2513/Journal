<?php

class user_Core 
{
	
	public static $user;
	
	
	/**
	 * Get the current user
	 * @Developer Brandon Hansen
	 * @Date April 05, 2010
	 * @Return User_Model
	 */
	public static function current()
	{
		if(!self::$user)
		{
			self::$user = Auth::instance()->get_user();
		}
		
		return self::$user;
	}
	
	
	/**
	 * Check to see if the user is logged in
	 * @Developer Brandon Hansen
	 * @Date April 05, 2010
	 * @Return bool
	 */
	public static function logged_in()
	{
		return self::current();
	}
	
	
	/**
	 * Require the user to log in if they are not yet logged in
	 * @Developer Brandon Hansen
	 * @Date April 06, 2010
	 * @Return void
	 */
	public static function require_login()
	{
		if(!self::logged_in())
		{
			Session::instance()->set('redirect', url::current(true));
			url::redirect('login');
		}
	}
	
}