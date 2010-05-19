<?php

class Sessions_Controller extends Application_Controller
{

	
	/**
	  * Create a session
	  * @Developer brandon
	  * @Date May 17, 2010
	  */
	public function create()
	{
		if(ORM::factory('user')->login($this->input->post()))
		{
			url::redirect(Session::instance()->get('redirect', ''));
		}
		else
		{
			flash::set_error('The username or password could not be verified');
			url::redirect('login');
		}
	}
	
	
	/**
	  * Log the user out
	  * @Developer brandon
	  * @Date May 18, 2010
	  */
	public function delete()
	{
		Auth::instance()->logout();
		url::redirect('login');
	}
	
	
}