<?php

class Home_Controller extends Template_Controller
{
	
	public $template = 'layouts/application';
	
	
	/**
	  * Load up the controller
	  * @developer Brandon Hansen
	  * @date Jun 8, 2010
	  */
	public function __construct()
	{
		parent::__construct();
		meta::set_title('Remembering Life');
		layout::add(View::factory('shared/mentions')->render(), 'pre_footer');
	}
	
	
	/**
	  * Home page
	  * @developer Brandon Hansen
	  * @date Jun 8, 2010
	  */
	public function index()
	{
		if(user::logged_in())
		{
			url::redirect('journals');
		}
		else
		{
			url::redirect('login');
		}
	}

}