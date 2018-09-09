<?php

/**
 * File containing the index for system.
 *
 * @package Seven Kevins
 * @copyright Copyright (C) 2009 PHPRO.ORG. All rights reserved.
 * @filesource
 *
 */

namespace sevenkevins;

session_start();

try
{
	// define the site path
	$site_path = realpath(dirname(__FILE__));
	define ('__SITE_PATH', $site_path);

	// the application directory path 
	define ('__APP_PATH', __SITE_PATH.'/application');

	// add the application to the include path
	set_include_path( __APP_PATH );
	set_include_path( __SITE_PATH );

	// set the public web root path
	$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', __SITE_PATH);
	define('__PUBLIC_PATH', $path);

	spl_autoload_register(null, false);

	spl_autoload_extensions('.php, .class.php, .lang.php');

	// model loader
	function modelLoader($class)
	{
		$class = strtolower( str_replace( 'sevenkevins\\', '', $class ) );
		$models = array('icontroller.php', 'frontcontroller.php', 'view.php');
		$class = strtolower( $class );
		$filename = $class . '.php';
		if( in_array( $filename, $models ) )
		{
			$file = __APP_PATH . "/models/$filename";
		}
		else
		{
			$file = __APP_PATH . "/$class/models/$filename";
		}
		if (file_exists($file) == false)
		{
			return false;
		}

		include_once $file;
	}


	// autoload controllers
	function controllerLoader($class)
	{
		$class = str_replace( 'sevenkevins\\', '', $class );
		$module = str_replace( 'Controller', '', $class );
		$filename = $class . '.php';
		$file = strtolower( __APP_PATH . "/modules/$module/controllers/$filename" );
		if (file_exists($file) == false)
		{
			return false;
		}
		include_once $file;
	}

	// autoload libs
	function libLoader( $class )
	{
		$class = str_replace( 'sevenkevins\\', '', $class );
		$filename = strtolower( $class ) . '.class.php';
		// hack to remove namespace 
		$file = __APP_PATH . '/lib/' . $filename;
		if (file_exists($file) == false)
		{
			return false;
		}
		include_once $file;
	}

	spl_autoload_register( __NAMESPACE__ . '\libLoader' );
	spl_autoload_register( __NAMESPACE__ . '\modelLoader' );
	spl_autoload_register( __NAMESPACE__ . '\controllerLoader' );

	$config = \sevenkevins\config::getInstance();
	$lang = $config->config_values['application']['language'];
	$filename = strtolower($lang) . '.lang.php';
	$file = __APP_PATH . '/lang/' . $filename;
	include $file;

	// alias the lang class
	class_alias(__NAMESPACE__ . '\\' . $lang, __NAMESPACE__ . '\lang');

	// set the domain status
	// $domain_config = domain_config::getInstance();
// var_dump( $domain_config );

	// set the timezone
	date_default_timezone_set($config->config_values['application']['timezone']);

	/**
	 *
	 * @custom error function to throw exception
	 *
	 * @param int $errno The error number
	 *
	 * @param string $errmsg The error message
	 *
	 */
	function sevenkevinsErrorHandler($errno, $errmsg)
	{
		throw new sevenkevinsException($errmsg, $errno);
	}
	/*** set error handler level to E_WARNING ***/
	// set_error_handler('sevenkevinsErrorHandler', $config->config_values['application']['error_reporting']);

	// Initialize the FrontController
	$front = FrontController::getInstance();
	$front->route();

	echo $front->getBody();
}
catch(sevenkevinsException $e)
{
	//show a 404 page here
	echo 'FATAL:<br />';
	echo $e->getMessage();
	echo $e->getLine();
}
// catch exceptions from the php exception class
catch( \Exception $e )
{
	echo $e->getMessage();
}
