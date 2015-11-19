<?php
	//include pls
	
	
	class Captain{
		public $captain_id;
		public $username;
		public $password;
		public $firstName;
		public $lastName;
		public $street;
		public $city;
		public $state;
		public $zip;
		public $rating;
		public $email;
		public $captain_pic;
		
		public $score;
		
	
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
		
		public function getStreet(){
			return $this->street;
		}
		
		public function setStreet($street){
			$this->street = $street;
		}
		
		public function getCity(){
			return $this->city;
		}
		
		public function setCity($city){
			$this->city = $city;
		}
		
		public function getState(){
			return $this->state;
		}
		
		public function setState($state){
			$this->state = $state;
		}
			
		public function getZip(){
			return $this->zip;
		}
		
		public function setZip($zip){
			$this->zip = $zip;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function setEmail($email){
			$this->email = $email;
		}
		
		public function getCaptainPic(){
			return $this->captain_pic;
		}
		
		public function setCaptainPic($captain_pic){
			$this->captain_pic = $captain_pic;
		}
		
		public function getScore(){
			return $this->score;
		}
		
		public function setScore($score){
			$this->score = $score;
		}
		
		
		
		
		
		//TRY EXTENDING THE CLASS TO DB
		public function registerCaptain($username, $password, $firstName, $lastName,$zip,$street,$city,$state,$email){
			
			$formatted_firstName = ucwords(strtolower($firstName));
			$formatted_lastName = ucwords(strtolower($lastName));
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
					
			$query = "INSERT INTO captain(`username`, `capt_password`, `first_name`, `last_name`, `zip`,`street`,`city`,`state`,`email`,`captain_pic`) VALUES ('$username', '$password', '$formatted_firstName', '$formatted_lastName', $zip,'$street','$city','$state','$email','assets/images/default/profile-default.png')";
			if(!$mysqli->query($query)){
				 return false;
				
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
		
		public function retrieveCaptainProfile($captain_id){
			
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
		
		public function retrieveCaptainFromBook($captain_id){
			
			$db = DatabaseBook::getInstance();
            $mysqli = $db->getConnection(); 
					
			$query = "SELECT * FROM ea_users WHERE id = $captain_id";
			$result = $mysqli->query($query);
			
			$counter = 0;
			$captList = array();
			while($news_row = $result->fetch_array()) {
				$captain = new Captain();
				   $captain -> setFirstName($news_row['first_name']);
				  $captain -> setLastName($news_row['last_name']);
				  $captain -> setEmail($news_row['email']);
				  $captain -> setStreet($news_row['address']);
				  $captain -> setCity($news_row['city']);
				  $captain -> setState($news_row['state']);
				  $captain -> setZip($news_row['zip_code']);
				  $captain -> setCaptainId($news_row['id']);
				  
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
			 include_once "class/Rating.class.php";
			while($news_row = $result->fetch_array()) {
				$captain = new Captain();

				   $rating21 = new Rating();
				   
			   $scoreFromRating = $rating21->retrieveAvgScore($news_row['captain_id']);
              
			  
			   
				  $captain = $captain->createCaptainObject($captain,$news_row);
				  $captain->setScore($scoreFromRating);
			   
			   
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
		
		public function captainUpdateProfilePic($captId,$captPic){
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
					
			$query = "UPDATE captain set captain_pic = '$captPic' WHERE captain_id = $captId";
			if(!$mysqli->query($query)){
				 return false;
				
			}
			else{
				
				return true;
			}
			
			return false;
		}
		
		
		
		private function createCaptainObject($captain,$news_row){
			
			      $captain -> setFirstName($news_row['first_name']);
				  $captain -> setLastName($news_row['last_name']);
				  $captain -> setEmail($news_row['email']);
				  $captain -> setStreet($news_row['street']);
				  $captain -> setCity($news_row['city']);
				  $captain -> setState($news_row['state']);
				  $captain -> setZip($news_row['zip']);
				  $captain -> setCaptainId($news_row['captain_id']);
				  $captain -> setCaptainPic($news_row['captain_pic']);
				  return $captain;
		}
		
	
		
	}

?>