<?php

class Static_Model extends ORM
{
	
	/**
	  * Show path
	  * @Developer brandon
	  * @Date May 19, 2010
	  */
	public function show_path()
	{
		return url::site('page/' . strtolower($this->title));
	}

}