<?php
require_once 'setup.php';

$args = $_SERVER['argv'];

new Model($_SERVER["argv"][1]);

class Model
{
	
	private $name = NULL;
	
	public function __construct($name = NULL)
	{
		$this->name = $name;
		echo $this->build();
	}
	
	
	/**
	  * Get the test path
	  * @developer Brandon Hansen
	  * @date May 16, 2010
	  */
	private function create_tests()
	{
		$test_file_contents = "<?php\n\nclass Test_" . ucwords($this->name) . "_Model extends BaseTestCase\n{\n";
		$test_file_contents .= "\n}";
		
		$fp = fopen(APP_ROOT . 'tests/models/' . $this->name . '.php', 'w');
		fwrite($fp, $test_file_contents);
		fclose($fp);
	}	
	
	
	/**
	  * Create the fixtures
	  * @developer Brandon Hansen
	  * @date May 16, 2010
	  */
	private function create_fixtures()
	{
		$test_file_contents = "<?php\n\nclass " . ucwords($this->name) . "_Fixture\n{\n";
		$test_file_contents .= "\n}";
		
		$fp = fopen(APP_ROOT . 'tests/fixtures/' . $this->name . '.php', 'w');
		fwrite($fp, $test_file_contents);
		fclose($fp);
	}
	
	
	/**
	  * Create the model
	  * @developer Brandon Hansen
	  * @date May 16, 2010
	  */
	private function create_model()
	{
		$file_contents = "<?php\n\nclass " . ucwords($this->name) . "_Model extends ORM\n{\n";
		$file_contents .= "\n}";
		
		$fp = fopen(APP_ROOT . 'models/' . $this->name . '.php', 'w');
		fwrite($fp, $file_contents);
		fclose($fp);
	}
	
	
	/**
	  * Build the model
	  * @developer Brandon Hansen
	  * @date May 9, 2010
	  */
	private function build()
	{
		if(!$this->name)
		{
			return "\n\nModel not created.  No name given\n";
		}
		else if(file_exists(APP_ROOT . 'models/' . $this->name . '.php'))
		{
			return "\n\nThe model already exists\n";
		}
		
		$this->create_model();
		$this->create_fixtures();
		$this->create_tests();
		
		return "\n\nCreated the model\n";
	}
	
}