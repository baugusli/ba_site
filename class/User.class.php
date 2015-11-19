<?php
	//include pls
	
	
	class User{
		public $user_id;
		public $username;
		public $password;
		public $firstName;
		public $lastName;
		public $street;
		public $city;
		public $state;
		public $zip;
		public $birth_date;
		public $email;
		public $phone;
		public $pic;
		
		
		
	
		public function __construct(){
		}
		
		public function getUserId(){
			return $this->user_id;
		}
		
		public function setUserId($user_id){
			$this->user_id = $user_id;
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
		
		public function getBirthDate(){
			return $this->birth_date;
		}
		
		public function setBirthDate($birth_date){
			$this->birth_date = $birth_date;
		}
		
			public function getEmail(){
			return $this->email;
		}
		
		public function setEmail($email){
			$this->email = $email;
		}
		
			public function getPhone(){
			return $this->phone;
		}
		
		public function setPhone($phone){
			$this->phone = $phone;
		}
		
			public function getPic(){
			return $this->pic;
		}
		
		public function setPic($pic){
			$this->pic = $pic;
		}
		
				
		
		//TRY EXTENDING THE CLASS TO DB
		public function registerUser($username, $password, $firstName, $lastName,$email){
			
			$formatted_firstName = ucwords(strtolower($firstName));
			$formatted_lastName = ucwords(strtolower($lastName));
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
					
			$query = "INSERT INTO user(`username`, `user_password`, `first_name`, `last_name`,`email`) VALUES ('$username', '$password', '$formatted_firstName', '$formatted_lastName','$email')";
			if(!$mysqli->query($query)){
				 return false;
				
			}
			else{
				
				return true;
			}
			
			return false;
		}
		
	
		
		public function userAuthenticate($username, $password){
			$db = Database::getInstance();
			$mysqli = $db->getConnection(); 
			$query = "SELECT * FROM user WHERE username = '$username' AND user_password = '$password'";
			$result = $mysqli->query($query);
			
            $counter = 0;
			$list = array();			
			while($news_row = $result->fetch_array()) {
				  $user = new User();
				  $user = $user->createObject($user,$news_row);
				  
				  $list[$counter] = $user;
				  $counter++;
			}
			
			return $list;
		}	
		
		public function userCheckUsername($username){
			$db = Database::getInstance();
			$mysqli = $db->getConnection(); 
			$query = "SELECT user_id FROM user WHERE username = '$username'";
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
		
			public function retrieveUserFromId($user_id){
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
					
			$query = "SELECT * FROM user WHERE user_id = $user_id";
			$result = $mysqli->query($query);
			
			$counter = 0;
			$list = array();
			while($news_row = $result->fetch_array()) {
				$user = new User();
				  $user = $user->createObject($user,$news_row);
				  
				  $list[$counter] = $user;
				  $counter++;
			}
			
			return $list;
			
		}
		
		
		
		
		
		private function createObject($user,$news_row){
			
			      $user -> setFirstName($news_row['first_name']);
				  $user -> setLastName($news_row['last_name']);
				  $user -> setStreet($news_row['street']);
				  $user -> setCity($news_row['city']);
				  $user -> setState($news_row['state']);
				  $user -> setZip($news_row['zip']);
				  $user -> setUserId($news_row['user_id']);
				    $user -> setEmail($news_row['email']);
					$user -> setPic($news_row['user_pic']);
				  
				  return $user;
		}
		
	
		
	}

?>