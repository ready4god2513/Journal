<?php

class Blogs_Controller extends Application_Controller
{
	
	/**
	  * Clear the cache on an constructive/destructive action
	  * Also, make sure only admins can get here
	  * @Developer brandon
	  * @Date May 27, 2010
	  */
	public function __construct()
	{
		parent::__construct();
		
		if(in_array(Router::$method, array('new_one', 'edit', 'create', 'update', 'delete')))
		{
			if(!user::is_admin())
			{
				url::redirect('blog');
			}
			
			Cache::instance()->delete_all();
		}
	}
	
	/**
	  * Set the title for the blog posts
	  * @Developer brandon
	  * @Date May 27, 2010
	  */
	public function index()
	{
		parent::index();
		meta::set_title('The Blog');
	}
	
	
	/**
	  * Set the title for the blog entry that the user is viewing
	  * @Developer brandon
	  * @Date May 27, 2010
	  */
	public function show($id = NULL)
	{
		parent::show($id);
		$blog = ORM::factory('blog', $id);
		meta::set_title($blog->title);
	}

}