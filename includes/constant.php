<?php 

	date_default_timezone_set("Asia/kolkata");   //India time (GMT+5:30)

	function is_localhost() {
		// set the array for testing the local environment
		$whitelist = array( '127.0.0.1', '::1' );
		
		// check if the server is in the array
		if ( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) {
			
			// this is a local environment
			return true;
		}
	}

	if (is_localhost())
		define('LOCAL_DIR',			'/al-hilal-mission');
	else
		define('LOCAL_DIR',			'');

	//URLS Details 
	$protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';


	
	//URLS Details 
	
	define('URL', 						$protocol.$_SERVER['HTTP_HOST'].LOCAL_DIR.'/');
	define('ADM_URL',  					URL.'admin/');
    define('SITE_URL',                  URL.'/');
	define('PAGE',				        $_SERVER['PHP_SELF']);
	define('ROOT_DIR', 					$_SERVER['DOCUMENT_ROOT'].LOCAL_DIR.'/');
	define('ADM_DIR', 					$_SERVER['DOCUMENT_ROOT'].LOCAL_DIR.'/admin/');
	

	// define('SELLER_AREA',  			URL."/dashboard.php");
	// define('BUYER_AREA',  			URL."/app.client.php");
	// define('IMG_PATH',  				URL."/images");

	

	
	//Institute
	define('SITE_NAME',             	'AL-HILAL MISSION');
	define('SITE_FULL_NAME',        	'AL-HILAL MISSION');					                	 //Institute full name
	define('SITE_S', 		        	'AL-HILAL MISSION');										 //Institute short name
	
	// Favicon Link
	define("FAVICON_LINK", 			        "assets/img/favicon.png");
	define("FAVICON_LINK_A", 			    "assets/img/apple-touch-icon.png");
	define("FAVICON_LINK_LOGO", 			"assets/img/logo.png");


		// Social Media Handles
		define("FB_LINK", 			"https://www.facebook.com/leelijaweb/");
		define("TWITTER_LINK", 		"https://twitter.com/lee_lija");
		define("PINTEREST_LINK", 	"https://in.pinterest.com/leelijaa/");
		define("LINKDIN_LINK", 		"https://www.linkedin.com/in/leelija/");

?>