<?php

class User_Model extends Auth_User_Model
{
	
	protected $validates_presence_of = array('email', 'username', 'password');
	protected $validates_uniqueness_of = array('email', 'username');
	public $formo_ignores = array('logins', 'last_login');
	
	
	/**
	  * Create a new user
	  * @Developer brandon
	  * @Date May 18, 2010
	  */
	public function create($params)
	{
		if($user = parent::create($params))
		{
			if($user->add(ORM::factory('role', 'login')) AND $user->save())
			{
		        Auth::instance()->force_login($user->username);
		        return true;
		    }
		}
	    
	    return false;
	}

}