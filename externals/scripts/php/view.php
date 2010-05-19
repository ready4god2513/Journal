<?php
require_once 'setup.php';

$args = $_SERVER['argv'];

new View($_SERVER["argv"][1]);

class View
{
	
	private $name = NULL;
	private $actions = array(
		'index',
		'new',
		'edit',
		'show',
		'index_ajax',
		'create_ajax',
		'update_ajax',
		'error_ajax',	
		'delete_ajax'
	);
	
	public function __construct($name = NULL, array $actions = array())
	{
		$this->name = $name;
		
		if(!empty($actions))
		{
			$this->actions = $actions;
		}
		
		echo $this->build();
	}
	
	
	/**
	  * Get the path of the file to create
	  * @developer Brandon Hansen
	  * @date May 9, 2010
	  */
	private function get_path($action)
	{
		return APP_ROOT . 'views/' . $this->name . '/' . $action . '.php';
	}
	
	
	/**
	  * Build the controller
	  * @developer Brandon Hansen
	  * @date May 9, 2010
	  */
	public function build()
	{
		if(!$this->name)
		{
			return "\n\Views not created.  No name given\n";
		}
		
		if(!mkdir(APP_ROOT . 'views/' . $this->name, 0777, TRUE))
		{
			echo "\n\nThe directory already exists";
		}
		
		$file_contents = NULL;

		foreach($this->actions as $action)
		{
			if($action == 'edit' || $action == 'new')
			{
				$file_contents = '<?=$form?>';
			}
			else
			{
				$file_contents = NULL;
			}
			
			if(file_exists($this->get_path($action)))
			{
				echo "\n\ $action not created.  Already exists\n";
				continue;
			}
			
			$fp = fopen($this->get_path($action), 'w');
			fwrite($fp, $file_contents);
			fclose($fp);
		}
		
		return "\n\nCreated the views\n";
	}
	
}