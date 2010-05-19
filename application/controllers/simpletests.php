<?php defined('SYSPATH') OR die('No direct access allowed.');

require_once Kohana::find_file('vendor/simpletest', 'unit_tester');
require_once Kohana::find_file('vendor/simpletest', 'collector');
require_once Kohana::find_file('vendor/simpletest', 'autorun');
require_once Kohana::find_file('tests', 'base_test_case');

$handle = opendir(DOCROOT . 'application/tests/fixtures/');

while(false !== ($file = readdir($handle))) 
{
	if(strpos($file, '.php') > 0)
	{
		require_once Kohana::find_file('tests', 'fixtures/' . str_replace('.php', '', $file));
	}
}

/**
 * Controls running of various "simpletest" test suites.
 */
class Simpletests_Controller extends Controller 
{

	// Do not allow to run in production
	const ALLOW_PRODUCTION = FALSE;
	
	public function __construct()
	{
		parent::__construct();
		if(IN_PRODUCTION)
		{
			throw new Kohana_Exception('controller.not_found');
		}
		
		Kohana::config_set('database.default', Kohana::config('database.test'));
		
		$this->profiler = new Profiler();
	}
	
	/**
	 * Runs the <i>simpletests</i> suite. Run in the browser with the
	 * URI: /simpletests/all_tests
	 */
	function all()
	{
		$test = new TestSuite('All Tests');
		$this->collect_all($test);
		$test->run(new HtmlReporter);
	}


	/**
	 * Runs the indicated test case in isolation with the
	 * URI: /simpletests/test/path/to/filename
	 *
	 * For example, to run test_user.php, indicate the path relative to the "tests" directory.
	 * http://hostname/test/model/test_user.php
	 */
	function test()
	{
		$nodes = Router::$segments;
		unset( $nodes[0]);
		unset( $nodes[1]);

        $path = implode('/', $nodes );
		

		$test = new TestSuite("Test ".$path);
		$test->addTestFile( APPPATH."tests/".$path );
		$test->run( new HtmlReporter());
	}

	/**
	 * Runs the indicated test case in isolation with the
	 * URI: /simpletests/single/path/to/testfile/method_name
	 *
	 * For example, to run test_user.php's test_foo method, use the following URI:
	 * http://hostname/single/model/test_user/test_foo
	 */
	function single()
	{
		$test = new TestSuite( "single");
		$this->collect_all($test);

		$nodes = Router::$segments;
		$test_method = end( $nodes );

		$length = count( $nodes );

		unset( $nodes[0]);
		unset( $nodes[1]);
		unset( $nodes[$length-1]);

		$this->profiler=new Profiler;

		$path = implode('/', $nodes );
		$test->run( new SelectiveReporter( new HtmlReporter(), APPPATH."tests/".$path.".php", $test_method));
	}


	/**
	 * Let's run all the tests by default
	 */
	function index()
	{
		$this->all();
	}

	/**
	 * Collects all of the tests in the project.
	 *
	 * @param unknown_type $suite
	 */
	private function collect_all( $suite )
	{
		$collector = new SimpleCollector();
		$suite->collect(APPPATH.'tests/models', $collector);
		$suite->collect(APPPATH.'tests/controllers', $collector);
		$suite->collect(APPPATH.'tests/helpers', $collector);
		$suite->collect(APPPATH.'tests/libraries', $collector);
	}
}