<?php

class Topics_Controller extends Application_Controller
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
				url::redirect('topics');
			}
			
			Cache::instance()->delete_all();
		}
	}

}