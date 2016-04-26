<?php
/*
 * This connection of the database can be more simple by using this class just pass four parameters in the constructor of this class and that’s yet.
 
 * How to use -
 
 	Obj = new DataBaser("Server_name","User_name","Password","Database_Name");
		
	To check whether the connection is established or not use isConnect() function it returns Boolean false
	
	That's yet. Thank you.
	
	
 * DataBase class contain another function that is selectAllData() which is used to fetch all the data stored in a
   specific table. It takes a parameter as table name and takes the Database as previously given.  
*/

class DataBase {
	
	private $serverName;
	private $dbName;
	private $userName;
	private $passWord;
	
	public function __construct($host, $user_name, $password, $db_name){
		
		$serverName = $host;
		$userName = $user_name;
		$passWord = $password;
		$dbName = $db_name;
		
		$connect = mysqli_connect($serverName, $userName, $passWord, $dbName);
		$GLOBALS['connect'] = $connect;	
	}
	
	
	public function isConnect(){
		
		if($GLOBALS['connect']){
			$report = true;
		} else {
			$report = false;
		}
		return $report;
	}
	
		
	public function selectAllData($tableName){
		
		$query = "select * from ".$tableName;
		$data = mysqli_query($GLOBALS['connect'], $query);
		$result = mysqli_fetch_assoc($data);
	
		return $result;
	}
	
	function selectSpecificData($tableName, $column, $value){
		
		$query = "select * from $tableName where $column = '$value'";
		$data = mysqli_query($GLOBALS['connect'], $query);
		$result = mysqli_fetch_assoc($data);
	
		return $result;
	}

	
	public function dropTable($tableName){
	
		$result = mysqli_query($GLOBALS['connect'],"drop table $tableName");
	
		if(!$result){
			return false;
		} else {
			return true;
		}
	}
	
	public function dropSelectedDB($dbName){
	
		$result = mysqli_query($GLOBALS['connect'],"drop database $dbName");
	
		if(!$result){
			return false;
		} else {
			return true;
		}
	}
	
	public function turncateTable($tableName){
	
		$result = mysqli_query($GLOBALS['connect'],"TRUNCATE TABLE `$tableName`");
	
		if(!$result){
			return false;
		} else {
			return true;
		}
	}
}
?>
