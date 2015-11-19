<?php
	//include pls
	
	
	class Boat{
		public $hull_id;
		public $registration_number;
		public $registration_exp;
		public $boat_name;
		public $boat_capacity;
		public $boat_model;	
		public $captain_id;
	
		public function __construct(){
		}
		
		public function getHullId(){
			return $this->hull_id;
		}
		
		public function setHullId($hull_id){
			$this->hull_id = $hull_id;
		}
		public function getRegistrationNumber(){
			return $this->registration_number;
		}
		
		public function setRegistrationNumber($registration_number){
			$this->registration_number = $registration_number;
		}
		
		
		public function getRegistrationExp(){
			return $this->registration_exp;
		}
		
		public function setRegistrationExp($registration_exp){
			$this->registration_exp = $registration_exp;
		}
		
	
		
		
		public function getBoatName(){
			return $this->boat_name;
		}
		
		public function setBoatName($boat_name){
			$this->boat_name = $boat_name;
		}
		
		public function getBoatCapacity(){
			return $this->boat_capacity;
		}
		
		public function setBoatCapacity($boat_capacity){
			$this->boat_capacity = $boat_capacity;
		}
		
		public function getBoatModel(){
			return $this->boat_model;
		}
		
		public function setBoatModel($boat_model){
			$this->boat_model = $boat_model;
		}
		
			public function getCaptainId(){
			return $this->captain_id;
		}
		
		public function setCaptainId($captain_id){
			$this->captain_id = $captain_id;
		}
		
		
	

		
		

		
		public function retrieveBoats($captain_id){
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
			
           
				$query = " SELECT * FROM boat where captain_id = $captain_id";

			
			$result = $mysqli->query($query);
			
			$counter = 0;
			$list = array();
			while($news_row = $result->fetch_array()) {
				$boat = new Boat();
				  $boat = $boat->createObject($boat,$news_row);
				  
				  $list[$counter] = $boat;
				  $counter++;
			}
			
			return $list;
			
		}
		
		
		
		
		
		private function createObject($boat,$news_row){
			
			      $boat -> setHullId($news_row['hull_id']);
				  $boat -> setRegistrationNumber($news_row['registration_number']);
				  $boat -> setRegistrationExp($news_row['registration_exp']);
				  $boat -> setBoatName($news_row['boat_name']);
				  $boat -> setBoatCapacity($news_row['boat_capacity']);
				   $boat -> setBoatModel($news_row['boat_model']);
				   $boat -> setCaptainId($news_row['captain_id']);
				  
							
		
		
				  return $boat;
		}
		
	
		
	}

?>