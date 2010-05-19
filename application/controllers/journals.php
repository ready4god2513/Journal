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
	 * View a list of journals that belong to the user
	 * @Developer brandon
	 * @Date Apr 21, 2010
	 */
	public function index()
	{
		$this->template
			->set('title', 'Journals')
			->set('content', View::factory('journals/index')
				->set('journals', user::current()->journals)
				);
	}
	
	
	/**
	  * Make sure that the journal that the user is trying to
	  * view is a journal that belongs to them
	  * @Developer brandon
	  * @Date May 17, 2010
	  */
	public function show($id = NULL)
	{
		$journal = ORM::factory('journal', $id);
		
		if($journal->user->id != user::current()->id)
		{
			url::redirect('');
		}
		
		parent::show($id);
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
	
	
	/**
	  * Delete a journal, but only if it belongs to the user
	  * @Developer brandon
	  * @Date May 17, 2010
	  */
	public function delete()
	{
		$journal = ORM::factory($this->model_name, $this->input->post('id'));
		
		if($journal->user->id != user::current()->id)
		{
			url::redirect('');
		}
		
		parent::delete();
	}

}