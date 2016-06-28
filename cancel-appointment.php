<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){ 

if(isset($_POST['app_id']) && !empty($_POST['app_id'])){	
	 include_once "class/Appointment.class.php";
	 include_once "class/Database.class.php";
	 $appointment = new Appointment();
	 $app_id = $_POST['app_id'];
	 $ss = $appointment->cancelAppointment($app_id);
	 if($ss){
		 
		 include_once "class/User.class.php";
		 include_once "class/Captain.class.php";
		 
		 $captain = new Captain();
		 $user = new User();
		 
		 
		 //Send email notification
		
		 $app = $appointment->retrieveAppointmentFromAppId($app_id);
		 $user_id = $app[0]->getUserId();
		 $captain_id = $app[0]->getCaptainId();
		 
		 
		 $captainList = $captain->retrieveCaptainFromId($captain_id);
		 $userList = $user->retrieveUserFromId($user_id);
		 
		 $captainEmail = $captainList[0]->getEmail();
		 $userEmail = $userList[0]->getEmail();
		 
		 $to  = $captainEmail . ', '; 
         $to .= $userEmail;
		 
		 $subject = 'Appointment Cancellation';
		 
		 $message = "Your appointment has been cancelled";
		 
		 $headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		
		$headers .= 'From: Captains Hub <bryan_augusli@hotmail.com>';

        mail($to, $subject, $message, $headers);
		 
		 //Redirect to appointment Page
		 $host  = $_SERVER['HTTP_HOST'];
       $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'appointment.php';
		$url = "http://".$host.$uri."/".$extra;
		echo "<script>location.href='".$url."'</script>";
        exit;
		
		
	 }
	 else{
		 
		 echo "<div class='container'><div class='col-md-12'><div class='alert alert-danger'> <strong> Cancellation Failed! </strong> </div></div></div>";
	 }
 }
 
 else{
	 
	 echo "<div class='container'><div class='col-md-12'><div class='alert alert-danger'> <strong> You are not authorized to view this page. </strong> </div></div></div>";
 }
}

else{
	echo "<div class='container'><div class='col-md-12'><div class='alert alert-danger'> <strong> You are not authorized to view this page. </strong> </div></div></div>";
}

?>