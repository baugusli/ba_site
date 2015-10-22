<?php
	//include pls
	
	
	class Captain{
		public $accountId;
		public $username;
		public $password;
		public $firstName;
		public $lastName;
		public $zip;
		public $rating;
		
	
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
		
		public function getRating(){
			return $this->rating;
		}
		
		public function setRating($rating){
			$this->rating = $rating;
		}
		
		
		
		
		
		//TRY EXTENDING THE CLASS TO DB
		public function registerCaptain($username, $password, $firstName, $lastName,$zip,$rating){
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
					
			$query = "INSERT INTO captain(`username`, `capt_password`, `first_name`, `last_name`, `zip`, `rating`) VALUES ('$username', '$password', '$firstName', '$lastName', $zip,$rating)";
			if(!$mysqli->query($query)){
				 echo mysql_error();
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
				  $captain -> setRating($news_row['rating']);
				  
				  $captList[$counter] = $captain;
				  $counter++;
			}
			
			return $captList;
			
		}
		
		public function searchCaptain($zip){
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
					
			$query = "SELECT * FROM captain WHERE zip = $zip";
			$result = $mysqli->query($query);
			
			$counter = 0;
			$captList = array();
			while($news_row = $result->fetch_array()) {
				$captain = new Captain();
				  $captain -> setFirstName($news_row['first_name']);
				  $captain -> setLastName($news_row['last_name']);
				  $captain -> setRating($news_row['rating']);
				  
				  $captList[$counter] = $captain;
				  $counter++;
			}
			
			return $captList;
			
		}
		
	
		
	}

?>