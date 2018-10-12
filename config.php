<?php 
	//Menu "current page"
	//$current_page = end(explode('/', $_SERVER['REQUEST_URI'])); (THIS WAS NOT WORKING)

	$URI = $_SERVER['REQUEST_URI'];

	$strings = explode('/', $URI);

	$current_page = end($strings);

	//Connection to database
	$dbServer = 'localhost';
	$dbUser = 'root';
	$dbPassword = 'dekuXbakugo';
	$dbName = 'book_system'
?>