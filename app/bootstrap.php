<?php
//load config
	require_once 'config/config.php';
	require_once 'helper/session_helper.php';
	require_once 'helper/url_helper.php';


	spl_autoload_register(function($classname){
		require_once 'lib/' .$classname. '.php';
	});