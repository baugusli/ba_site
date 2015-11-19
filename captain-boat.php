<!DOCTYPE html>
<html lang="en">
 <head>
 
  <!-- IMPT do not delete the first three meta tag. Used for bootstrap -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>My Boats</title>
  
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
			
				
				include_once "class/Captain.class.php";
				include_once "class/Boat.class.php";
				
				$boat = new Boat();
				$captain = new Captain();
				
				
				$boatList = array();
				$captList = array();
				
				//*************************** UPCOMING APPOINTMENTS ****************************************************
				echo "<div class='container'> ";
				echo "<h1>My Boats</h1>";
				$boatList = $boat->retrieveBoats($userId);
				
				for($i = 0; $i<count($boatList);$i++){
					
					$boatName = $boatList[$i]->getBoatName();
					$boatModel = $boatList[$i]->getBoatModel();
					$boatCapacity = $boatList[$i]->getBoatCapacity();
					$registration_number = $boatList[$i]->getRegistrationNumber();
					$registration_exp = $boatList[$i]->getRegistrationExp();
					
					
					echo "<div class='row'> ";
			       echo "<div class='col-md-8 col-xs-12'>";
				  
				  echo "Boat Name = " . $boatName ;
				  echo "</br> Boat Model =". $boatModel;
				  echo "</br> Boat Capacity =". $boatCapacity;
				  echo "</br> Registration Number =". $registration_number;
				  
				  echo "</br> Registration Expired =". $registration_exp;
				  
				  
				  
				  echo "</div>";
				  
				  echo "<div class='col-md-2 col-xs-6'>";
				  
				  echo "<form action='#' method='POST'> <button type='submit' class='btn btn-warning'>Update</button></form>";
                  echo "</div>";
				  
				  echo "<div class='col-md-2 col-xs-6'>";
				  echo "<form class='cancel-form' id='form". $app_id ."' action='#' method='POST'> <input type='hidden' name='app_id' id='app_id' value='". $app_id ."'><button class='btn btn-danger cancel-app-btn' id='".$app_id."'>Delete</button></form>";
				  echo "</div>";
				  
				  
				  echo "</div> ";
				  
					
				}
				
				echo "</div> ";
				//************************************** UPCOMING APPOINTMENTS ENDS ******************************************
		
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
	

	   
  </script>

  
 </body>
</html>