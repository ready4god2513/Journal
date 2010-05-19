<?php

class Journal_Model extends ORM
{
	
	protected $belongs_to = array('user');
	protected $validates_presence_of = array('user_id', 'content');
	protected $sorting = array('id' => 'DESC');
	public $formo_ignores = array('user_id');
	
	
	/**
	  * Encrypt the data before saving, also stripping out an html
	  * @Developer brandon
	  * @Date May 18, 2010
	  */
	public function __set($key, $value)
	{
		if(in_array($key, array('content', 'title')))
		{
			$encrypt = new Encrypt();
			$value = $encrypt->encode(strip_tags($value));
		}
		
		parent::__set($key, $value);
	}
	
	
	/**
	  * Decrypt the data when taking it out of the database
	  * @Developer brandon
	  * @Date May 18, 2010
	  */
	public function __get($key)
	{
		$value = parent::__get($key);
		
		if(in_array($key, array('content', 'title')))
		{
			if($value)
			{
				$encrypt = new Encrypt();
				$value = $encrypt->decode($value);
			}
		}
		
		return $value;
	}
	
	
	/**
	  * Link to the journal
	  * @Developer brandon
	  * @Date May 18, 2010
	  */
	public function show_path()
	{
		return url::site('journals/show/' . $this->id . '/' . $this->title);
	}


}