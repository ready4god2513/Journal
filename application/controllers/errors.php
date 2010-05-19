<?php

class Errors_Controller extends Application_Controller
{
	
	
	
	/**
	 * Display the missing page url
	 * @Developer Brandon Hansen
	 * @Date April 19, 2010
	 */
	public function error_404()
	{
		header("HTTP/1.0 404 Not Found");
		meta::set_title('This Page will be Forever Missed');
		$this->template
			->set('title', 'Missing Page')
			->set('content', View::factory('errors/404'));
	}
	
	
}