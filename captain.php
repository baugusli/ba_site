<!DOCTYPE html>
<html lang="en">
 <head>
 
  <!-- IMPT do not delete the first three meta tag. Used for bootstrap -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Captains' Hub Sign Up</title>
  
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
	if(isset($_GET['captainId']) && !empty($_GET['captainId'])){
		include_once "class/Captain.class.php";
		$captList = array();
		$captain = new Captain();
		$captainId = $_GET['captainId'];
		$captList = $captain->retrieveCaptainProfile($captainId);
		
		
			   $captName = $captList[0]->getFirstName() . " " . $captList[0]->getLastName();
			   $rating = $captList[0]->getRating();
			   $street = $captList[0]->getStreet();
			   $state = $captList[0]->getState();
			   $city = $captList[0]->getCity();
			   $zip = $captList[0]->getZip();
	} 
			   
			 
   ?>	
   
   <!-- *********************************** START ADDING CONTENT ************************************************************-->
   
  <div class="container">
      
      <div class="row">
	  
	     <div class="col-xs-6 col-sm-3 col-md-2 ">
           <img src="..." class="img-responsive">
		   <p><div id="captRate" class="captRate" data-score="<?php echo $rating; ?>"></div></p>
         </div>
		 
		 <div class="col-xs-6 col-sm-6 col-md-6 ">
           <div class="container">
		      <div class="row">
			  
			     <div class="col-xs-12 col-sm-12 col-md-12 ">  
                    Name : <?php echo $captName; ?>				 
                 </div>
				 
				 <!-- TO BE CHANGED WHEN USER REGISTER WITH THEIR CITY AND STATE -->
				  <div class="col-xs-12 col-sm-12 col-md-12 ">  
                    Location : 	<?php echo $zip; ?>			 
                 </div>
				 
				 
			  </div>
		   </div>
         </div>
		 
		 <!-- CALENDAR -->
		 <div class="col-xs-6 col-sm-4 col-md-4 ">
           Calendar
         </div>
		 
		 
	  </div>
	  
	  <div class="row">
	  
	    <!-- BOAT DETAIL *************** -->
	    <div class="col-xs-12 col-sm-8 col-md-8">
		Boat Detail
		</div>
		
		<!-- MAP ***********************8 -->
		<div class="col-xs-6 col-sm-4 col-md-4">
		<iframe frameborder="0" style="border:0" height="450"
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBW1gaHdpwp2o6ej2enewggAV3bfzgo-9o&q=<?php echo $city.",".$state."+".$zip?>"></iframe>
		</div>
		
	  </div>
	  
  </div>  
  
  
  


  
   
   
   
    <!-- *********************************** END ADDING CONTENT ************************************************************-->

   
	
  <?php
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