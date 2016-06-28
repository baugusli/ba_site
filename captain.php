<!DOCTYPE html>
<html lang="en">
 <head>
 
  <!-- IMPT do not delete the first three meta tag. Used for bootstrap -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Captains' Hub </title>
  
  <!-- The following three meta is for SEO. Change accordingly for each page. -->
  <meta name="title" content="Captain's Hub Sign Up" />
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
	if(isset($_GET['captainId']) || $_SESSION['userType'] == "Captain"){
		include_once "class/Captain.class.php";
		include_once "class/Rating.class.php";
		$captList = array();
		$captain = new Captain();
		
		if(isset($_GET['captainId']) && !empty($_GET['captainId'])){
			$captainId = $_GET['captainId'];
			
		}
		elseif ($_SESSION['userType'] == "Captain"){
			
			$captainId = $_SESSION['userId'];
		}
		
		$captList = $captain->retrieveCaptainProfile($captainId);
			   $captName = $captList[0]->getFirstName() . " " . $captList[0]->getLastName();
			 $rating = 0;
			   $street = $captList[0]->getStreet();
			   $state = $captList[0]->getState();
			   $city = $captList[0]->getCity();
			   $zip = $captList[0]->getZip();
			   $pic = $captList[0]->getCaptainPic();
			   $address = $street . " ".  $city. "," . $state . " " . $zip;
	           $email = $captList[0]->getEmail();
			   
			   
			   $ratingC = new Rating();
			   $rating = $ratingC->retrieveAvgScore($captainId);
			   
			   
	    $changeProfileStatus = "Enabled";
		if(isset($_GET['captainId']) && isset($_SESSION['userType'])){
			if($_SESSION['userType'] == "Captain"){
				
				$session_capt_id = $_SESSION['userId'];
				$get_capt_id = $_GET['captainId'];
				
				if($session_capt_id == $get_capt_id){
					$changeProfileStatus = "Enabled";
				}
				else{
					$changeProfileStatus = "Disabled";
				}
			}
		}	   
			 
   ?>	
   
   <!-- *********************************** START ADDING CONTENT ************************************************************-->
   
  <div class="container">
      
      <div class="row">
	  
	     <div class="col-xs-6 col-sm-3 col-md-2 ">
           <img src="<?php echo $pic;?>" class="img-responsive img-thumbnail"></br>
		   
		   <?php
		   if(isset($_SESSION['userType']) && isset($_SESSION['userId']) && !empty($_SESSION['userType']) && !empty($_SESSION['userId'])){
		
		    $userType = $_SESSION['userType'];
			$userId = $_SESSION['userId'];
			
			if($userType == "Captain" && $changeProfileStatus == "Enabled"){
				
				echo "<a class='btn btn-primary' href='captain-upload-pic.php'>Change Profile Picture</a>";
				
			}
		   }
		   
		   ?>
		   
		   <p><div id="captRate" class="captRate" data-score="<?php echo $rating; ?>"></div></p>
         </div>
		 
		 <div class="col-xs-6 col-sm-6 col-md-6 ">
              
			  <ul class="list-group">
				  <li class="list-group-item">Name : <?php echo $captName; ?>		</li>
				  <li class="list-group-item">Address : 	<?php echo $address; ?>	</li>
				  <li class="list-group-item">Email Address : 	<?php echo $email; ?></li>
				  
				</ul>

		   
         </div>
		 
<!-- MAP ***********************8 -->
		<div class="col-xs-6 col-sm-4 col-md-4">
		<iframe frameborder="0" style="border:0" height="450"
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBW1gaHdpwp2o6ej2enewggAV3bfzgo-9o&q=<?php echo $street.",".$city."+".$zip?>" allowfullscreen></iframe>
		</div>
		 
	  </div>

	  
  </div>  
   
    <!-- *********************************** END ADDING CONTENT ************************************************************-->

   
	
  <?php
	}
	else{
		echo "<div class='container'><div class='col-md-12'><div class='alert alert-danger'> <strong> You are not authorized to view this page. </strong> </div></div></div>";
	}
  include_once "footer/footer.php";
  ?>
  
  <script>
  
  $('.captRate').raty({ 
  readOnly:true,
   score: function() {
    return $(this).attr('data-score');
  },
  
  path: 'assets/rate/images'
  
});

	
	 
  </script>
  
 </body>
</html>