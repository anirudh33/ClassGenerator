<?php
/*
 * Creation Log File Name - index.php 
 * Description - Class generator index file
 * Version - 1.0 
 * Created by - Anirudh Pandita 
 * Created on - April 15, 2013 
 * *************************************************
 */
/* Requiring all essential files */
require_once '/var/www/ClassGenerator/branches/development/libraries/constants.php';
require_once SITE_PATH . '/libraries/DBConnect.php';
require_once SITE_PATH . '/controllers/Controller.php';
require_once SITE_PATH . '/models/ClassGenerator.php';
require_once SITE_PATH . '/models/Element.php';
include_once SITE_PATH . '/models/Element.php';
/* Method calls from views handled here */
if (isset ( $_REQUEST ['controller'] )) {
	
	//if (class_exists ( $_REQUEST ['controller'] )) {
		
		if (isset ( $_REQUEST ["method"] )) {
			
			// Creating object of controller to initiate the process
			$object = new $_REQUEST ["controller"] ();
			
			if (method_exists ( $object, $_REQUEST ["method"] )) {

				
				$object->$_REQUEST ["method"] ();
			}
		//}
	}
}

/* Showing the main view */
$object = new Controller ();
$object->showView ();

?>

