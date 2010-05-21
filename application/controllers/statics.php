<?php

class Statics_Controller extends Application_Controller
{
	
	protected $excluded_actions = array('index');
	
	
	/**
	  * Show
	  * @Developer brandon
	  * @Date May 19, 2010
	  */
	public function show($title = NULL)
	{
		$page = ORM::factory('static')->where('title', $title)->find();
		meta::set_title($page->title);
		parent::show($page->id);
	}
	
	
	/**
	  * Contact Form
	  * @Developer brandon
	  * @Date May 19, 2010
	  */
	public function contact()
	{
		meta::set_title('Contact Us');
		$this->template
			->set('content', View::factory('statics/contact'));
	}
	
	
	/**
	  * Submit Contact Form
	  * @Developer brandon
	  * @Date May 19, 2010
	  */
	public function contact_submit()
	{
		flash::set_message('Thanks!  We will get back to you soon.');
		url::redirect('page/about');
	}

}