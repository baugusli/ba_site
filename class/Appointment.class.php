<?php
	//include pls
	
	
	class Appointment{
		public $appointment_id;
		public $appointment_date;
		public $appointment_deposit;
		public $hull_id;
		public $user_id;
		public $captain_id;
		public $appointment_status;
			
	
		public function __construct(){
		}
		
		public function getAppointmentId(){
			return $this->appointment_id;
		}
		
		public function setAppointmentId($appointment_id){
			$this->appointment_id = $appointment_id;
		}
		
		public function getAppointmentDate(){
			return $this->appointment_date;
		}
		
		public function setAppointmentDate($appointment_date){
			$this->appointment_date = $appointment_date;
		}
		
		public function getAppointmentDeposit(){
			return $this->appointment_deposit;
		}
		
		public function setAppointmentDeposit($appointment_deposit){
			$this->appointment_deposit = $appointment_deposit;
		}
		
		public function getHullId(){
			return $this->hull_id;
		}
		
		public function setHullId($hull_id){
			$this->hull_id = $hull_id;
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
		
		public function getAppointmentStatus(){
			return $this->appointment_status;
		}
		
		public function setAppointmentStatus($appointment_status){
			$this->appointment_status = $appointment_status;
		}
		
	/*
			public function retrieveAppointments($user_type, $user_id, $appointment_cat){
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
			
            if($user_type=="Captain"){
				$query = "SELECT * FROM appointment WHERE captain_id = $user_id ";
			}

            elseif($user_type=="Customer")	{
				
				$query = "SELECT * FROM appointment WHERE user_id = $user_id ";
			}
 
            if($appointment_cat == "past"){
				$query .= " AND appointment_date < curdate()";	
				
			}
			
			elseif($appointment_cat == "upcoming"){
				$query .= " AND appointment_date > curdate()";
				
			}
              
			
			$result = $mysqli->query($query);
			
			$counter = 0;
			$list = array();
			while($news_row = $result->fetch_array()) {
				$appointment = new Appointment();
				  $appointment = $appointment->createObject($appointment,$news_row);
				  
				  $list[$counter] = $appointment;
				  $counter++;
			}
			
			return $list;
			
		}*/
		
		public function retrieveAppointments($user_type, $email, $appointment_cat){
			include_once "DatabaseBook.class.php";
			$db = DatabaseBook::getInstance();
            $mysqli = $db->getConnection(); 
			
            if($user_type=="Captain"){
				$query = "select * from ea_appointments as ap inner join ea_users as usr on ap.id_users_providers = usr.id where usr.email = '$email'";
			}

            elseif($user_type=="Customer")	{
				$query = "select * from ea_appointments as ap inner join ea_users as usr on ap.id_users_customer = usr.id where usr.email = '$email'";
				
			}
 
            if($appointment_cat == "past"){
				$query .= " AND ap.end_datetime < curdate()";	
				
			}
			
			elseif($appointment_cat == "upcoming"){
				$query .= " AND ap.start_datetime > curdate()";
				
			}
              
			
			$result = $mysqli->query($query);
			
			$counter = 0;
			$list = array();
			while($news_row = $result->fetch_array()) {
				$appointment = new Appointment();
				  //$appointment = $appointment->createObject($appointment,$news_row);
				  
				    
				   $appointment -> setAppointmentId($news_row[0]);
				  $appointment -> setAppointmentDate($news_row['start_datetime']);
				//  $appointment -> setAppointmentDeposit($news_row['appointment_deposit']);
				//  $appointment -> setHullId($news_row['hull_id']);
				  $appointment -> setUserId($news_row['id_users_customer']);
				  $appointment -> setCaptainId($news_row['id_users_provider']);
				 // $appointment -> setAppointmentStatus($news_row['appointment_status']);
				 
				 
				  $list[$counter] = $appointment;
				  $counter++;
			}
			
			return $list;
			
		}
		
		
		
		public function retrieveAppointmentFromAppId($app_id){
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
			
            
				$query = "SELECT * FROM appointment WHERE appointment_id = $app_id ";
			
              
			
			$result = $mysqli->query($query);
			
			$counter = 0;
			$list = array();
			while($news_row = $result->fetch_array()) {
				$appointment = new Appointment();
				  $appointment = $appointment->createObject($appointment,$news_row);
				
				  
				  
				  
				  $list[$counter] = $appointment;
				  $counter++;
			}
			
			return $list;
			
		}
		
		public function cancelAppointment($app_id){
			
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
					
			$query = "UPDATE appointment set appointment_status = 'Cancelled' where appointment_id = $app_id";
			if(!$mysqli->query($query)){
				 return false;
				
			}
			else{
				
				return true;
			}
			
			return false;
		}
		
		
		
		
		
		private function createObject($appointment,$news_row){
			
			      $appointment -> setAppointmentId($news_row['appointment_id']);
				  $appointment -> setAppointmentDate($news_row['appointment_date']);
				  $appointment -> setAppointmentDeposit($news_row['appointment_deposit']);
				  $appointment -> setHullId($news_row['hull_id']);
				  $appointment -> setUserId($news_row['user_id']);
				  $appointment -> setCaptainId($news_row['captain_id']);
				  $appointment -> setAppointmentStatus($news_row['appointment_status']);
				  
				  return $appointment;
		}
		
	
		
	}

?>