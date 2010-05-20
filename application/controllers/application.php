<?php

abstract class Application_Controller extends Crud_Controller
{
	
	public $template = 'layouts/application';
	
	public function __construct()
	{
		parent::__construct();
		meta::set_keywords('Daily Journal, Free Journal, Private Diary, Private Journal, Free Online Journal, Online Journaling, Write Messages, My Diary, Secure Diary, Secure Journal, Journal, Diary');
		meta::set_description('Keep a free online journal or diary to remember events in your life.  Secure, simple and free.  Access from anywhere.');
	}
	
}