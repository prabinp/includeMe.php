<?php
/*
 * This connection of the database can be more simple by using this class pass four parameters in the constructor.
 
 * How to use -
 
 	Obj = new Server("Server_name","User_name","Password","Database_Name");
		
	To check whether the connection is established or not use isConnect() function it returns boolean false
	
	That's yet. Than you.
	
	
 * Server class contain another function that is selectAllData() which is used to fatch all the data stored in a
   spacific table. It takes a parameter as table name and takes the Database as previously given.
   
 * Introducing getHost() function which take one parameter and return the required detail about your server or user
   or current executed file.  
*/

class Server {
	
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
	
	
	public function getHost($code){
		
		if(filter_var($code, FILTER_SANITIZE_STRING) or !isset($code)){
		
				if(strtolower($code)=='self'){
					return $_SERVER['PHP_SELF'];
				} 
				else if(strtolower($code)=='gateway'){
					return $_SERVER['GATEWAY_INTERFACE'];
				} 
				else if(strtolower($code)=='server address'){
					return $_SERVER['SERVER_ADDR'];
				} 
				else if(strtolower($code)=='server name'){
					return $_SERVER['SERVER_NAME'];
				}
				else if(strtolower($code)=='server software'){
					return $_SERVER['SERVER_SOFTWARE'];
				}
				else if(strtolower($code)=='server protocol'){
					return $_SERVER['SERVER_PROTOCOL'];
				}
				else if(strtolower($code)=='request method'){
					return $_SERVER['REQUEST_METHOD'];
				}
				else if(strtolower($code)=='request time'){
					return $_SERVER['REQUEST_TIME'];
				}
				else if(strtolower($code)=='query string'){
					return $_SERVER['QUERY_STRING'];
				}
				else if(strtolower($code)=='http accept'){
					return $_SERVER['HTTP_ACCEPT'];
				}
				else if(strtolower($code)=='http accept char'){
					return $_SERVER['HTTP_ACCEPT_CHARSET'];
				}
				else if(strtolower($code)=='http host'){
					return $_SERVER['HTTP_HOST'];
				}
				else if(strtolower($code)=='current url'){
					return $_SERVER['HTTP_REFERER'];
				}
				else if(strtolower($code)=='https'){
					return $_SERVER['HTTPS'];
				}
				else if(strtolower($code)=='user ip'){
					return $_SERVER['REMOTE_ADDR'];
				}
				else if(strtolower($code)=='user host'){
					return $_SERVER['REMOTE_HOST'];
				}
				else if(strtolower($code)=='user port no'){
					return $_SERVER['REMOTE_PORT'];
				}
				else if(strtolower($code)=='current file'){
					return $_SERVER['SCRIPT_FILENAME'];
				}
				else if(strtolower($code)=='server admin'){
					return $_SERVER['SERVER_ADMIN'];
				}
				else if(strtolower($code)=='server port no'){
					return $_SERVER['SERVER_PORT'];
				}
				else if(strtolower($code)=='server version'){
					return $_SERVER['SERVER_SIGNATURE'];
				}
				else if(strtolower($code)=='file path'){
					return $_SERVER['PATH_TRANSLATED'];
				}
				else if(strtolower($code)=='current page'){
					return $_SERVER['SCRIPT_NAME'];
				}
				else if(strtolower($code)=='current page url'){
					return $_SERVER['SCRIPT_URI'];
				}  
				else {
					$error = "Wrong input";
					return $error;
				}
		} else {
			$error = "Wrong input";
			return $error;
		}
	}
	
	
	function selectAllData($tableName){
		
		$query = "select * from ".$tableName;
		$data = mysqli_query($GLOBALS['connect'], $query);
		$result = mysqli_fetch_assoc($data);
	
		return $result;
	}	
}
?>
