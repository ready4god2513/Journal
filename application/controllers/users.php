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
		parent::update(user::current()->id);
	}
	
	
	/**
	  * Delete the user
	  * @Developer brandon
	  * @Date May 19, 2010
	  */
	public function delete()
	{
		$user = ORM::factory($this->model_name, $this->input->post('id'));
		
		if($user->id != user::current()->id)
		{
			url::redirect('');
		}
		
		parent::delete();
	}
	
}