<?php

/*
 * If you need to include numbers of class in your project and muliple include statements can increase the lines of code
 * So this function can help to solve this problem. This function is introduced in php 5 just include this function and
 * add any required or get object of any required class.
 
 * How to use it
 	
	include_once(AutoLoad.php);
	
	$obj = new YourClassName;
	
	Note - 
	You might need to modify the class path in this function. 
*/


	function __autoload($name){
		include_once($name.".php");
	}
?>