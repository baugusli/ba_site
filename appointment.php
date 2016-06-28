<!DOCTYPE html>
<html lang="en">
 <head>
 
  <!-- IMPT do not delete the first three meta tag. Used for bootstrap -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>My Appointments</title>
  
  <!-- The following three meta is for SEO. Change accordingly for each page. -->
  <meta name="title" content="Captains' Hub" />
  <meta name="description" content="Captains' Hub is a portal where anglers can search for the best captain that serves charter boat services to take the anglers fishing.">
  <meta name="keywords" content="Portal,Captains,Hub,Captains' Hub, Charter Boat, Fishing, Fish, Tour Guide , Sign Up">
  
  
  <!-- header.php contains js,css, and favicon links and some fix meta for SEO. -->
  <?php
  require "header/header.php";
  ?>
  

 <body>

   <!-- navigation folder stores the dynamic navigation bar. If user logn, it will retrieve different nav bar (Capt / User nav). -->
   <?php
    include "navigation/guestNav.php";
	
	//if user login
	if(isset($_SESSION['userType']) && isset($_SESSION['userId']) && !empty($_SESSION['userType']) && !empty($_SESSION['userId'])){
		
		    $userType = $_SESSION['userType'];
			$userId = $_SESSION['userId'];
			
				include_once "class/Appointment.class.php";
				include_once "class/Captain.class.php";
				include_once "class/User.class.php";
				include_once "class/Rating.class.php";
				
				$appointment = new Appointment();
				$captain = new Captain();
				$user = new User();
				
				
				$appList = array();
				$captList = array();
				$userList = array();
	
				//*************************** UPCOMING APPOINTMENTS ****************************************************
				echo "<div class='container'> ";
				echo "<h1>My Appointments</h1>";
				echo "<h2>Upcoming Appointments</h2>";
				echo "<ul class='list-group'>";
				$userList = $user->retrieveUserFromId($userId);
				$userEmail = $userList[0]->getEmail();
			
				$appList = $appointment->retrieveAppointments($userType,$userEmail,"upcoming");
				$aa =  $appList[0]->getCaptainId();
			
				for($i = 0; $i<count($appList);$i++){
				
					$captain_id = $appList[$i]->getCaptainId();
					
					$captList = $captain->retrieveCaptainFromBook($captain_id);
				
					//$userList = $user->retrieveUserFromId($appList[$i]->getUserId());
					
					$captName = $captList[0]->getFirstName() . " " . $captList[0]->getLastName();
					//$userName = $userList[0]->getFirstName() . " " . $userList[0]->getLastName();
					$app_id= $appList[$i]->getAppointmentId();
			
				  
				   echo "<li class='list-group-item'>Appointment with Captain " . $captName . " at " . $appList[$i]->getAppointmentDate();
				   
				  
				  
				  /*
				  echo "<div class='col-md-2 col-xs-6'>";
				  
				  echo "<form action='reschedule-appointment.php' method='POST'> <button type='submit' class='btn btn-warning'>Reschedule</button></form>";
                  echo "</div>";
				  
				  echo "<div class='col-md-2 col-xs-6'>";
				  echo "<form class='cancel-form' id='form". $app_id ."' action='cancel-appointment.php' method='POST'> <input type='hidden' name='app_id' id='app_id' value='". $app_id ."'><button class='btn btn-danger cancel-app-btn' id='".$app_id."'>Cancel</button></form>";
				  echo "</div>";
				  */
				  
				 
				  
					
				}
				
				echo "</ul></div> ";
				//************************************** UPCOMING APPOINTMENTS ENDS ******************************************
				
				
				//*************************** PAST APPOINTMENTS ****************************************************
				echo "<div class='container'> ";
				echo "<h2>Past Appointments</h2>";
				echo "<ul class='list-group'>";
				$appList = $appointment->retrieveAppointments($userType,$userEmail,"past");
				$rating = new Rating();
				for($i = 0; $i<count($appList);$i++){
					
					
					$captain_id = $appList[$i]->getCaptainId();
					$user_id_from_book = $appList[$i]->getUserId();
					$captList = $captain->retrieveCaptainFromBook($captain_id);
					//$userList = $user->retrieveUserFromId($appList[$i]->getUserId());
					
					$captName = $captList[0]->getFirstName() . " " . $captList[0]->getLastName();
					//$userName = $userList[0]->getFirstName() . " " . $userList[0]->getLastName();
					$app_id= $appList[$i]->getAppointmentId();
					
                   
					$ratingScore = $rating->retrieveScoreApp($app_id,$captain_id,$user_id_from_book);
				  
				   echo "<li class='list-group-item'>Appointment with Captain " . $captName . " at " . $appList[$i]->getAppointmentDate();
				  
				 
				  
				  if($userType == "Customer"){
                      echo "</br>Rate ". $captName . " <div class='captRate' id='rate-". $captain_id . "-" . $user_id_from_book  . "-" . $app_id . "' data-score='". $ratingScore ."'></div><button class='btn btn-primary rateButton' id='button-". $captain_id . "-" . $user_id_from_book . "-" . $app_id."'>Rate</button>  "; 
					  
				  }
				  elseif($userType == "Captain"){
					  echo "Your rating <div class='captRate' id='rate-". $captain_id . "-" . $user_id_from_book  . "-" . $app_id . "' data-score='". $ratingScore ."'></div>  "; 
					  
				  }
				  
				  
				  echo "</li>";
				  
				 
				  
				  
				  
				  
					
				}
				
				echo "</ul></div> ";
				//************************************** PAST APPOINTMENTS ENDS ******************************************
				
				
				
				
	if($userType == "Customer"){
		
		$cancelMsg = "You will lose your deposit and notifications will be sent to all parties involved.";
	}
	else{
		$cancelMsg = "The deposit will be refunded back to the customer and notifications will be sent to all parties involved.";
	}
		

		
		
	}
	
	// IF no user login
	else{
		
		echo "<div class='container'><div class='col-md-12'><div class='alert alert-danger'> <strong> You are not authorized to view this page. </strong> </div></div></div>";
		
	}

			   
			 
   ?>	
   
   <!-- *********************************** START ADDING CONTENT ************************************************************-->
 
   <div class="center" id="dialog-confirm" title="Cancel Appointment?">
  <p><?php echo $cancelMsg; ?></p>
  <p>Are you sure you want to cancel this appointment?</p>
 
</div>
 
    <!-- *********************************** END ADDING CONTENT ************************************************************-->

   
	
  <?php
  include_once "footer/footer.php";
  ?>
  
  <script>
  $( document ).ready(function() {
   $(".captRate").each(function(){
	   var score = $(this).attr('data-score');
	   if(score == " " || score == "undefined" || score == ""){
		   
		   
	   }
	   else{
		   
		   $(this).raty('readOnly',true);
		   
		   var id = this.id;
		   var impId = id.split("-");
		   var btnId = "button-" + impId[1] + "-" + impId[2] + "-" + impId[3];
		   $("#" + btnId).prop("disabled",true);
	   }
   });
});


    $(".cancel-app-btn").click(function(event){
		event.preventDefault();
		var appId = $(this).attr("id");
		
		$("#dialog-confirm").dialog({
			resizable: false,
            height:240,
			width:450,
            modal: true,
			buttons: {
        "Cancel this Appointment": function() {
			var formId = "form" + appId;
			 $( this ).dialog( "close" );
			 $("#" + formId).submit();
             
        },
        "Keep Fishing": function() {
			
          $( this ).dialog( "close" );
		 
        }
      }
	  
			
		});
		
	});
	
	$('.captRate').raty({
		
		<?php
		if($userType == "Captain"){
			echo "readOnly:true,";
		}
		?>
	   
	   path: 'assets/rate/images',
	    score: function() {
    return $(this).attr('data-score');
  }

	   });
	   
	   $(".rateButton").click(function(){
		   var buttonId = this.id;
		   
		    var captAndUserId = buttonId.split("-");
			var ratyId = "rate-" + captAndUserId[1] + "-" + captAndUserId[2] + "-" + captAndUserId[3];
			
			var score = $('#' + ratyId).raty('score');
			
			
		   var ratingFormData = {
            'rate'      : score,
            'captain_id'  : captAndUserId[1],
			'user_id' : captAndUserId[2],
			'app_id' : captAndUserId[3]
        }
		
		
		  $.ajax({ 

			//send request to rate captain
			 url: 'rate-captain.php',
			 data: ratingFormData,
			 dataType: 'text',
			 type: 'post',
			  encode:true,
			  
			  //when success
			  success: function(data){
				  $("#" + ratyId).raty('readOnly',true);
				
				},
				
				//if error show error.. TO BE DELETED IN PROD AND REPLACE IT WITH ERROR PAGE!!******************************************
			error: function(xhr, status, error) {
				
			  alert(xhr.responseText);
		
			}

			});
		   
	   
	   
	   
		   
		   
	   });
	   
  </script>

  
 </body>
</html>