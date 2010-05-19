<?php
require_once 'setup.php';

$args = $_SERVER['argv'];

new Controller($_SERVER["argv"][1]);

class Controller
{
	
	private $name = NULL;
	private $actions = array();
	
	public function __construct($name = NULL, array $actions = array())
	{
		$this->name = $name;
		$this->actions = $actions;
		echo $this->build();
	}
	
	
	/**
	  * Create the tests
	  * @developer Brandon Hansen
	  * @date May 16, 2010
	  */
	private function create_tests()
	{
		$test_file_contents = "<?php\n\nclass Test_" . ucwords($this->name) . "_Controller extends BaseTestCase\n{\n";
		$test_file_contents .= "\n}";
		
		$fp = fopen(APP_ROOT . 'tests/controllers/' . $this->name . '.php', 'w');
		fwrite($fp, $test_file_contents);
		fclose($fp);
	}	
	
	
	/**
	  * Create the controller
	  * @developer Brandon Hansen
	  * @date May 16, 2010
	  */
	private function create_controller()
	{
		$file_contents = "<?php\n\nclass " . ucwords($this->name) . "_Controller extends Application_Controller\n{\n";
		$file_contents .= "\n}";
		
		$fp = fopen(APP_ROOT . 'controllers/' . $this->name . '.php', 'w');
		fwrite($fp, $file_contents);
		fclose($fp);
	}
	
	
	/**
	  * Build the controller
	  * @developer Brandon Hansen
	  * @date May 9, 2010
	  */
	private function build()
	{
		if(!$this->name)
		{
			return "\n\Controller not created.  No name given\n";
		}
		else if(file_exists(APP_ROOT . 'controllers/' . $this->name . '.php'))
		{
			return "\n\nThe controller already exists\n";
		}
		
		$this->create_controller();
		$this->create_tests();
		
		
		return "\n\nCreated the controller\n";
	}
	
}