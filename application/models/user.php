<?php

class User_Model extends Auth_User_Model
{
	
	public $has_many = array('journals');
	protected $validates_presence_of = array('email', 'username');
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
	
	
	/**
	  * Show the object.  This makes the assumption that the primary value is "title"
	  * @Developer brandon
	  * @Date May 18, 2010
	  */
	public function show_path()
	{
		return url::site(Kohana::config('routes.base_crud_route') . inflector::plural($this->object_name) . '/show');
	}
	
	
	/**
	  * Find all of the users that are subscribed to the topic of the day
	  * @developer Brandon Hansen
	  * @date May 25, 2010
	  */
	public function users_subscribed_to_topic_of_the_day()
	{
		return $this->where('send_reminders', true)->find_all_no_limit();
	}

}