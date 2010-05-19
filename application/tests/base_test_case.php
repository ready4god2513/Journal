<?php


/**
 * Test classes that inherit this class will
 * have a "base" test fixture and template methods to use.
 */
class BaseTestCase extends UnitTestCase 
{

	const ALLOW_PRODUCTION = FALSE;
	protected $clear_model_data = array();

	
	public function setUp()
	{
		parent::setUp();
		$this->clear_tables();
		Session::instance()->destroy();
		Session::instance()->create();
	}

	
	public function tearDown()
	{
		$this->clear_tables();
		Session::instance()->destroy();
		Session::instance()->create();
		
		parent::tearDown();
	}
	
	
	public function testBasePass() 
	{
		$this->assertTrue(true);
	}
	
	
	private function clear_tables()
	{
		foreach($this->clear_model_data as $model)
		{
			ORM::factory($model)->delete_all();
		}
	}
	
}