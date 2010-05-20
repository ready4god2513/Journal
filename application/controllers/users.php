<?php

class Users_Controller extends Application_Controller
{
	
	protected $excluded_actions = array('index');
	
	
	/**
	  * Set up a new user
	  * @Developer brandon
	  * @Date May 19, 2010
	  */
	public function new_one()
	{
		parent::new_one();
		meta::set_title('Create an Account');
	}
	
	
	/**
	  * Show the user
	  * @Developer brandon
	  * @Date May 19, 2010
	  */
	public function show()
	{
		user::require_login();
		parent::show(user::current()->id);
		meta::set_title('My Profile');
	}
	
	
	/**
	  * Edit the user
	  * @Developer brandon
	  * @Date May 19, 2010
	  */
	public function edit()
	{
		user::require_login();
		parent::edit(user::current()->id);
		meta::set_title('Update Account');
	}
	
	
	/**
	  * Update the user
	  * @Developer brandon
	  * @Date May 19, 2010
	  */
	public function update()
	{
		user::require_login();
		if(!$this->input->post('password'))
		{
			unset($_POST['password']);
		}
		parent::update(user::current()->id);
	}
	
	
	/**
	  * Delete the user
	  * @Developer brandon
	  * @Date May 19, 2010
	  */
	public function delete()
	{
		user::require_login();
		user::current()->delete();
		Auth::instance()->logout();
		
		url::redirect('login');
	}
	
}