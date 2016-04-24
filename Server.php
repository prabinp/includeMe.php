<?php
/* This class provides the information which is normally we used to get by using $_SERVER. This can provide all those 		   informations in an easiest way.
   
   Need of this class –
   
   It is hard to remember the key words instead of simple string so this class actually using $_SERVER. But it provides you   an easiest way of interaction. 

 * How to use it ?
   Pass the required information string in its constructor and it return the details.
  
*/

class Server {	
	
	public function __construct($code){
		
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
}
?>