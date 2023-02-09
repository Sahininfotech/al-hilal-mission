<?php

class Utility{
    

    function currentUrl(){

		$url      = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$validURL = str_replace("&", "&amp;", $url);
		return $validURL;
		
	}


	

}



?>