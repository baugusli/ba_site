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
	?>
   
   <!-- *********************************** START ADDING CONTENT ************************************************************-->
   <div class="container">
      <div class="row text-center">
	     <div class="col-md-4 col-md-offset-2">
		     <div class="thumbnail tb">
             <img class="thumbnail-img" src="assets/images/default/default-user.png" alt="Captain Sign Up">
               <div class="caption text-center">
                 <h3>User Sign Up</h3>
				  <a class="btn btn-warning card-link" href="user-sign-up.php"> User Sign Up</a>
               </div>
            </div>
		 </div>
		 
		 <div class="col-md-4">
		   
		    <div class="thumbnail tb">
             <img class="thumbnail-img" src="assets/images/default/default-captain.png" alt="Captain Sign Up">
               <div class="caption text-center">
                 <h3>Captain Sign Up</h3>
				  <a class="btn btn-warning card-link" href="captain-sign-up.php">Captain Sign Up</a>
               </div>
            </div>
							
		 
		 </div>
		
		 
	  </div>
	  
	  <?php
  include_once "footer/footer.php";
  ?>
 
 
 </div>  

    <!-- *********************************** END ADDING CONTENT ************************************************************-->

  
	
  
  
 </body>
</html>