<?php
	//include pls
	
	
	class Captain{
		private $accountId;
		private $username;
		private $password;
		private $firstName;
		private $lastName;
		private $zip;
		
	
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
		
		public function getZip(){
			return $this->zip;
		}
		
		public function setZip($zip){
			$this->zip = $zip;
		}
		
		
		
		
		//TRY EXTENDING THE CLASS TO DB
		public function registerCaptain($username, $password, $firstName, $lastName,$zip){
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
					
			$query = "INSERT INTO captain(`username`, `capt_password`, `first_name`, `last_name`, `zip`) VALUES ('$username', '$password', '$firstName', '$lastName', $zip)";
			if(!$mysqli->query($query)){
				 printf("Connect failed: %s\n", $mysqli->connect_error);
				die('ERROR!');
			}
			else{
				
				return true;
			}
			
			return false;
		}
		
		public function retrieveCaptain(){
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
					
			$query = "SELECT * FROM captain";
			$result = $mysqli->query($query);
			
			$counter = 0;
			$captList = array();
			while($news_row = $result->fetch_array()) {
				$captain = new Captain();
				  $captain -> setFirstName($news_row['first_name']);
				  $captain -> setLastName($news_row['last_name']);
				  
				  $captList[$counter] = $captain;
				  $counter++;
			}
			
			return $captList;
			
		}
		
	
		
	}

?>