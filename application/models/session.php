<?php

class Session_Model extends ORM
{
	
	protected $primary_key = 'session_id';
	protected $sorting = array('session_id' => 'DESC');

}