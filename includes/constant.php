<?php 

	date_default_timezone_set("Asia/kolkata");   //India time (GMT+5:30)

	//URLS Details 
	$protocol = isset($_SERVER['HTTPS']) ? 'https' : 'http';

	define('URL', 				'https://'.$_SERVER['HTTP_HOST']);	 
	define('PAGE',				$_SERVER['PHP_SELF']);

	
	//Institute
	define('SITE_NAME', 'AL-HILAL MISSION');
	define('Institute_FULL_NAME', 'AL-HILAL MISSION');					                	//Institute full name
	define('Institute_S', 		'AL-HILAL MISSION');										//Institute short name
	


	// Favicon Link
	define("Favicon_LINK", 			        "assets/img/favicon.png");
	define("Favicon_LINK_a", 			    "assets/img/apple-touch-icon.png");
	define("Favicon_LINK_logo", 			"assets/img/logo.png");
	

	
	
	//Institute
	define('SITE_NAME',             'AL-HILAL MISSION');
	define('SITE_FULL_NAME',        'AL-HILAL MISSION');					                	 //Institute full name
	define('SITE_S', 		        'AL-HILAL MISSION');										 //Institute short name
	
	// Favicon Link
	define("FAVICON_LINK", 			        "assets/img/favicon.png");
	define("FAVICON_LINK_A", 			    "assets/img/apple-touch-icon.png");
	define("FAVICON_LINK_LOGO", 			"assets/img/logo.png");

	define('SITE_BILLING_NAME',  			"AL-HILAL MISSION");
	define('SITE_EMAIL', 					"billing@fastlinky.com");
	define('SITE_BILLING_EMAIL', 			"billing@fastlinky.com");
	define('SUPPORT_EMAIL', 				"billing@fastlinky.com");
	define('SITE_HELP_LINE_NO',  			"+91 874224523");


	
	//define Institute logo
	define("LOGO_WITH_PATH",	URL."/images/logo/logo.png");					//location of the logo
	define("LOGO_WIDTH",		'180');											//width of the logo
	define("LOGO_HEIGHT",		'50');											//height of the logo

	define("FAVCON_PATH",		URL."/images/logo/favicon.png");				//location of the favcon
	define("LOGO_ALT",			Institute_FULL_NAME);								//alternate text for the logo
	
	define("FOOTER_LOGO",		URL.'/images/logo/footer-logo.png');			//location of the logo
	define("FL_WIDTH",			'180');											//width of the logo
	define("FL_HEIGHT",			'55');											//height of the logo 

	define("LOGO_ADMIN_PATH",	'images/admin/icon/admin-logo.png');			//location of the logo
	define("LOGO_ADMIN_WIDTH",	'200');											//width of the logo
	define("LOGO_ADMIN_HEIGHT",	'55');											//height of the logo 

	
	define('CURRENCY',			'$');
	define('START_YEAR',		'2022');
	define('END_YEAR',  		date('Y') + 2); 
	define('HOME',				'Home');


	//session constant
	define('ADM_SESS',   		"continuecontent_SESSION_2016ADM_SESS"); 		//admin session var	
	define('USR_SESS',   		"USERcontinuecontent_ecom_SESS2016"); 			//user session var	
	define('STAFF_SESS',   		"SESS_continuecontentMar2016");					//user session var

	
	//display style constant
	define('NRSPAN',  			"<span class='blackLarge'>");					//normal span
	define('ERSPAN',  			"<span class='orangeLetter'>");					//error span start
	define('SUSPAN',  			"<span class='greenLetter'>");					//success span start
	define('ENDSPAN', 			"</span>");										//end of span
	define('ER', 				'Error: ');
	define('SU', 				'Success !!! ');


	// Social Media Handles
	define("FB_LINK", 			"https://www.facebook.com/leelijaweb/");
	define("TWITTER_LINK", 		"https://twitter.com/lee_lija");
	define("PINTEREST_LINK", 	"https://in.pinterest.com/leelijaa/");
	define("LINKDIN_LINK", 		"https://www.linkedin.com/in/leelija/");
?>