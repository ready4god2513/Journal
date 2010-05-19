<?php

class Journals_Controller extends Application_Controller
{
	
	/**
	  * Require login
	  * @Developer brandon
	  * @Date May 17, 2010
	  */
	public function __construct()
	{
		parent::__construct();
		user::require_login();
	}
	
	
	/**
	  * Set the user id on create
	  * @Developer brandon
	  * @Date May 17, 2010
	  */
	public function create()
	{
		$_POST['user_id'] = (string) user::current();
		parent::create();
	}
	
	
	/**
	  * Set the user id on update
	  * @Developer brandon
	  * @Date May 17, 2010
	  */
	public function update($id = NULL)
	{
		$_POST['user_id'] = (string) user::current();
		parent::update($id);
	}

}