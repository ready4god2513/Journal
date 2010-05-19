<?php

class Statics_Controller extends Application_Controller
{
	
	
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

}