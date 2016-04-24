<?php

/*
 * This class contain the validation of sign up form of email id password and phone number. Just need to make object 
 * and call the functions. That's yet.
 */
 
 
/*	
	Password - 
	
    Explaining $\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$
    $ = beginning of string
    \S* = any set of characters
    (?=\S{8,}) = of at least length 8
    (?=\S*[a-z]) = containing at least one lowercase letter
    (?=\S*[A-Z]) = and at least one uppercase letter
    (?=\S*[\d]) = and at least one number
    (?=\S*[\W]) = and at least a special character (non-word characters)
    $ = end of the string

 */

class FormValidationSignUp{
	
	public function validateEmail($email){
		
		if(!isset($email)){
			return false;
		} else {
		
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				return false;
			} else {
				return true;
			}
		}
	}
	
	 public function validatePassword($password){
		 
		 if(!isset($password)){
			 return false;
		 } else {
		 
		 	if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $password)){
		 		return false;
		 	} else {
				return true;
		 	}
		 }
	}
	
	public function validateBothPassword($password1, $password2){
		if($password1===$password2){
			return true;
		} else {
			return false;
		}
	}
	
	public function validatePhoneNumber($phoneNumber){
		
		/* Number format should be 11-11-111111 */
		
		if(!preg_match('/^[0-9]{2}-[0-9]{2}-[0-9]{6}$/', $phoneNumber)){
      		return false;
    	} else {
			return true;
		}
	}
}

?>