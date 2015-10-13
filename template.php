<!DOCTYPE html>
<html lang="en">
 <head>
 
  <!-- IMPT do not delete the first three meta tag. Used for bootstrap -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Captains' Hub</title>
  
  <!-- The following three meta is for SEO. Change accordingly for each page. -->
  <meta name="title" content="Captain's Hub" />
  <meta name="description" content="Captains' Hub is a portal where anglers can search for the best captain that serves charter boat services to take the anglers fishing.">
  <meta name="keywords" content="Portal,Captains,Hub,Captains' Hub, Charter Boat, Fishing, Fish, Tour Guide ">
  
  
  <!-- header.php contains js,css, and favicon links and some fix meta for SEO. -->
  <?php
  require "header/header.php";
  ?>
  

 <body>
 
   <!-- navigation folder stores the dynamic navigation bar. If user logn, it will retrieve different nav bar (Capt / User nav). -->
   <?php
    include_once "navigation/guestNav.php";
   ?>	
   
   <!-- *********************************** START ADDING CONTENT ************************************************************-->
   
   
   
   
   
    <!-- *********************************** END ADDING CONTENT ************************************************************-->

   
	
  <?php
  include_once "footer/footer.php";
  ?>
  
 </body>
</html>