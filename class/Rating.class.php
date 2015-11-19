<?php
	//include pls
	
	
	class Rating{
		public $rating_id;
		public $rating_score;
		public $rating_date;
		public $user_id;
		public $captain_id;
		public $appointment_id;	
	
		public function __construct(){
		}
		
		public function getRatingId(){
			return $this->rating_id;
		}
		
		public function setRatingId($rating_id){
			$this->rating_id = $rating_id;
		}
		public function getRatingScore(){
			return $this->rating_score;
		}
		
		public function setRatingScore($rating_score){
			$this->rating_score = $rating_score;
		}
		
		
		public function getRatingDate(){
			return $this->rating_date;
		}
		
		public function setRatingDate($rating_date){
			$this->rating_date = $rating_date;
		}
		
	
		
		
		public function getUserId(){
			return $this->user_id;
		}
		
		public function setUserId($user_id){
			$this->user_id = $user_id;
		}
		
		public function getCaptainId(){
			return $this->captain_id;
		}
		
		public function setCaptainId($captain_id){
			$this->captain_id = $captain_id;
		}
		
		public function getAppointmentId(){
			return $this->appointment_id;
		}
		
		public function setAppointmentId($appointment_id){
			$this->appointment_id = $appointment_id;
		}
		
	
		
		public function userRateCaptain($score,$user_id,$captain_id,$appointment_id){
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
					
			$query = "INSERT INTO rating(`rating_score`, `user_id`, `captain_id` , `appointment_id`) VALUES ($score, $user_id, $captain_id, $appointment_id)";
			if(!$mysqli->query($query)){
				 return false;
				
			}
			else{
				
				return true;
			}
			
			return false;
		}
		
		
		
		public function retrieveScoreApp($app_id,$captId,$userId){
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
			
            
				$query = "SELECT * FROM rating WHERE appointment_id = '$app_id' AND captain_id = '$captId' AND user_id = '$userId'";
			
              
			  	$score = "";
			$result = $mysqli->query($query);
			while($news_row = $result->fetch_array()) {
				$score = $news_row['rating_score'];
			}
			
			return $score;
			
	
			
			
			
		}
		
		public function retrieveAvgScore($captId){
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
			
            
				$query = "SELECT avg(rating_score) as avg_rating_score FROM rating WHERE captain_id=$captId GROUP BY captain_id";
			
              
			
			$result = $mysqli->query($query);
		
			
			
			while($news_row = $result->fetch_array()) {
				
				$score = $news_row['avg_rating_score'];
				
			
			}
			
			return $score;
			
	
			
			
			
		}
		
		
		
		
		private function createObject($rating,$news_row){
			
			      $rating -> setRatingId($news_row['rating_id']);
				  $rating -> setRatingScore($news_row['rating_score']);
				  $rating -> setRatingDate($news_row['rating_date']);
				  $rating -> setUserId($news_row['user_id']);
				  $rating -> setCaptainId($news_row['captain_id']);
				   $rating -> setAppointmentId($news_row['appointment_id']);
				  
				  return $rating;
		}
		
	
		
	}

?>