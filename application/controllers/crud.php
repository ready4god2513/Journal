<?php

abstract class Crud_Controller extends Template_Controller 
{
	
	protected $model_name = NULL;
	protected $base_route = NULL;
	protected $excluded_actions = array();
	private $directory;
	private $plural;
	
	
	public function __construct()
	{
		parent::__construct();
		
		if(in_array(Router::$method, $this->excluded_actions))
		{
			Event::run('system.404');
		}
		
		if(!$this->model_name)
		{
			$this->model_name = inflector::singular(Router::$controller);
		}
		
		$this->plural = inflector::plural($this->model_name);
		$this->directory = $this->base_route . $this->plural;
		
		// Do not render, by default, if the request is an ajax request
		if(request::is_ajax())
		{
			$this->auto_render = false;
		}
	}
	

	/**
	 * View a list of $this->model_names
	 * @Developer brandon
	 * @Date Apr 21, 2010
	 */
	public function index()
	{
		$this->template
			->set('title', format::friendly_model_name($this->plural))
			->set('content', View::factory($this->directory . '/index')
				->set($this->plural, ORM::factory($this->model_name)->find_all())
				);
	}
	
	
	/**
	 * Show a current record
	 * @Developer brandon
	 * @Date Apr 21, 2010
	 */
	public function show($id = NULL)
	{
		$item = ORM::factory($this->model_name, $id);
		
		if(!$item->loaded)
		{
			flash::set_error('The ' . format::friendly_model_name($this->model_name) . ' you were looking for was not found');
			url::redirect($this->directory . '/index');	
		}
		
		$this->template
			->set('content', View::factory($this->directory . '/show')
				->set($this->model_name, $item)
				);
	}
	
	
	/**
	 * Form for a new $this->model_name
	 * @Developer brandon
	 * @Date Apr 21, 2010
	 */
	public function new_one()
	{
		$object = ORM::factory($this->model_name);
		
		$form = Formo::factory()
			->plugin('orm')
			->orm($this->model_name)
			->set('action', $object->create_path())
			->add('submit');
		
		$this->template
			->set('content', View::factory($this->directory . '/new')
				->set('form', $form)
				->set($this->model_name, $object)
				);
	}
	
	
	/**
	 * Create a new $this->model_name
	 * @Developer brandon
	 * @Date Apr 21, 2010
	 */
	public function create()
	{
		if($object = ORM::factory($this->model_name)->create($this->input->post()))
		{
			if(request::is_ajax())
			{
				View::factory($this->directory . '/create_ajax')->set($this->model_name, $object)->render(true);
			}
			else
			{
				flash::set_message('The ' . format::friendly_model_name($this->model_name) . ' was saved');
				
				if($this->input->post('redirect_override'))
				{
					url::redirect($this->input->post('redirect_override'));
				}
				else
				{
					url::redirect($this->directory . '/');
				}
			}
		}
		else
		{
			if(request::is_ajax())
			{
				View::factory($this->directory . '/error_ajax')->render(true);
			}
			else
			{
				flash::set_error('Missing input for required fields');
				
				if($this->input->post('redirect_override'))
				{
					url::redirect($this->input->post('redirect_override'));
				}
				else
				{
					url::redirect($this->directory . '/new_one');
				}
			}
		}
	}
	
	
	/**
	 * Edit a $this->model_name
	 * @Developer brandon
	 * @Date Apr 21, 2010
	 */
	public function edit($id = NULL)
	{
		
		$item = ORM::factory($this->model_name, $id);
		$form = Formo::factory()
			->plugin('orm')
			->orm($this->model_name, $id)
			->set('action', $item->update_path())
			->add('submit');
		
		if(!$item->loaded)
		{
			flash::set_error('The ' . format::friendly_model_name($this->model_name) . ' you were looking for was not found');
			url::redirect($this->directory . '/index');	
		}
		
		$this->template
			->set('content', View::factory($this->directory . '/edit')
				->set('form', $form)
				->set($this->model_name, $item)
				);
	}
	
	
	/**
	 * Update a $this->model_name
	 * @Developer brandon
	 * @Date Apr 21, 2010
	 */
	public function update($id = NULL)
	{
		if($object = ORM::factory($this->model_name, $id)->update($this->input->post()))
		{
			if(request::is_ajax())
			{
				View::factory($this->directory . '/update_ajax')->set($this->model_name, $object)->render(true);
			}
			else
			{
				flash::set_message('The ' . format::friendly_model_name($this->model_name) . ' was updated');
				
				if($this->input->post('redirect_override'))
				{
					url::redirect($this->input->post('redirect_override'));
				}
				else
				{
					url::redirect($this->directory . '/');
				}
			}
		}
		else
		{
			if(request::is_ajax())
			{
				View::factory($this->directory . '/error_ajax')->set($this->model_name, $object)->render(true);
			}
			else
			{
				flash::set_error('Missing input for required fields');
				url::redirect($this->directory . '/edit/' . $id);
			}
		}
	}
	
	
	/**
	 * Delete a $this->model_name
	 * @Developer brandon
	 * @Date Apr 21, 2010
	 */
	public function delete()
	{
		ORM::factory($this->model_name, $this->input->post('id'))->delete();
		
		if(request::is_ajax())
		{
			View::factory($this->directory . '/delete_ajax')->set('id', $this->input->post('id'))->render(true);
		}
		else
		{
			flash::set_message('The ' . format::friendly_model_name($this->model_name) . ' was deleted');
			if($this->input->post('redirect_override'))
			{
				url::redirect($this->input->post('redirect_override'));
			}
			else
			{
				url::redirect($this->directory . '/');
			}
		}
		
	}
	

}