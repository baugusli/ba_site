<?php
	//include pls
	
	
	class Captain{
		public $captain_id;
		public $username;
		public $password;
		public $firstName;
		public $lastName;
		public $zip;
		public $rating;
		
	
		public function __construct(){
		}
		
		public function getCaptainId(){
			return $this->captain_id;
		}
		
		public function setCaptainId($captain_id){
			$this->captain_id = $captain_id;
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
				  $captain = $captain->createCaptainObject($captain,$news_row);
				  
				  $captList[$counter] = $captain;
				  $counter++;
			}
			
			return $captList;
			
		}
		
		public function retrieveCaptainFromId($captain_id){
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
					
			$query = "SELECT * FROM captain WHERE captain_id = $captain_id";
			$result = $mysqli->query($query);
			
			$counter = 0;
			$captList = array();
			while($news_row = $result->fetch_array()) {
				$captain = new Captain();
				  $captain = $captain->createCaptainObject($captain,$news_row);
				  
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
				  
				  $captain = $captain->createCaptainObject($captain,$news_row);
				  
				  $captList[$counter] = $captain;
				  $counter++;
			}
			
			return $captList;
			
		}
		
		public function captainAuthenticate($username, $password){
			$db = Database::getInstance();
			$mysqli = $db->getConnection(); 
			$query = "SELECT * FROM captain WHERE username = '$username' AND capt_password = '$password'";
			$result = $mysqli->query($query);
			
            $counter = 0;
			$captList = array();			
			while($news_row = $result->fetch_array()) {
				  $captain = new Captain();
				  $captain = $captain->createCaptainObject($captain,$news_row);
				  
				  $captList[$counter] = $captain;
				  $counter++;
			}
			
			return $captList;
		}	
		
		public function captCheckUsername($username){
			$db = Database::getInstance();
			$mysqli = $db->getConnection(); 
			$query = "SELECT captain_id FROM captain WHERE username = '$username'";
			$result = $mysqli->query($query);
			
			if($result->num_rows >= 1){
				//username exist
				return true;
			}
			else{
				
				//username does not exist
				return false;
			}
				
			
			
		}
		
		
		
		private function createCaptainObject($captain,$news_row){
			
			      $captain -> setFirstName($news_row['first_name']);
				  $captain -> setLastName($news_row['last_name']);
				  $captain -> setRating($news_row['rating']);
				  $captain -> setCaptainId($news_row['captain_id']);
				  
				  return $captain;
		}
		
	
		
	}

?>