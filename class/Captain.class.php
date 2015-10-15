<?php
	//include pls
	include "Database.class.php";
	
	class Captain{
		private $accountId;
		private $username;
		private $password;
		private $firstName;
		private $lastName;
		
	
		public function __construct(){
		}
		
		public function getAccountId(){
			return $this->accountId;
		}
		
		public function setAccountId($accountId){
			$this->accountId = $accountId;
		}
		
		public function getUsername(){
			return $this->username;
		}
		
		public function setUsername($username){
			$this->username = $username;
		}
		
		public function getPassword(){
			return $this->password;
		}
		
		public function setPassword($password){
			$this->password = $password;
		}
		
		public function getFirstName(){
			return $this->firstName;
		}
		
		public function setFirstName($firstName){
			$this->firstName = $firstName;
		}
		public function getLastName(){
			return $this->lastName;
		}
		
		public function setLastName($lastName){
			$this->lastName = $lastName;
		}
		
		
		
		//TRY EXTENDING THE CLASS TO DB
		public function registerCaptain($username, $password, $firstName, $lastName){
			echo "Goes in function";
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
					
			$query = "INSERT INTO captain(`username`, `capt_password`, `first_name`, `last_name`) VALUES ('$username', '$password', '$firstName', '$lastName')";
			if(!$mysqli->query($query)){
				$mysqli->close();
				die('ERROR!');
			}
			else{
				
				return true;
			}
			
			return false;
		}
		
		/*
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
            $query = "SELECT * FROM testTable";
    	    if($result = $mysqli->query($query)){
				
				while($row = $result->fetch_row()){
					printf("<p>Name is:" . $row[1] ."</p>");
				}
			}
			*/
		
	}

?>