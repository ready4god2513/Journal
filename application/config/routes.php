<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * @package  Core
 *
 * Sets the default route to the products controller
 */
$config['_default'] = 'journals';

/**
  * Since we can't have the method "new", 
  * let's just use "new_one" and redirect all requests to "new" to that
  * @Developer brandon
  * @Date May 17, 2010
  */
$config['(.*)/new'] = '$1/new_one';
$config['new'] = 'journals/new_one';
$config['edit/([0-9]+)'] = 'journals/edit/$1';

/**
  * Missing Pages and Error Handling
  * @Developer brandon
  * @Date May 17, 2010
  */
$config['errors/404'] = 'errors/error_404';


/**
  * Create simple paths for logging in and out
  * @Developer brandon
  * @Date May 17, 2010
  */
$config['login'] = 'sessions/new_one';
$config['logout'] = 'sessions/delete';