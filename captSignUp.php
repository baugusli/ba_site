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
    include "navigation/guestNav.php";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
	include_once "class/Captain.class.php";
	
	$username = $_POST['inputUserName'];
	$pwd = md5($_POST['inputPassword']);
	$fname = $_POST['inputFirstName'];
	$lname = $_POST['inputLastName'];
	$zip = $_POST['inputZip'];
	$rating = $_POST['inputRating'];
	
	$captain = new Captain();
	if($captain->registerCaptain($username,$pwd,$fname,$lname,$zip,$rating)){
		
		echo "<div class='alert alert-success'> <strong> Registration Successful! </strong> </div>";


	}
	
	else{
		
		echo "<div class='alert alert-danger'> <strong> Registration Failed! </strong> </div>";
	}
	
	
	}
   ?>	
   
   <!-- *********************************** START ADDING CONTENT ************************************************************-->
   
   <form class="form-horizontal" action="captSignUp.php" method="POST">
  <div class="form-group">
    <label for="inputUserName" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputUserName" name="inputUserName" placeholder="Username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputFirstName" class="col-sm-2 control-label">First Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="First Name">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputLastName" class="col-sm-2 control-label">Last Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="Last Name">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputZip" class="col-sm-2 control-label">Zip:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputZip" name="inputZip" placeholder="Zip Code">
    </div>
  </div>
  
  <div class="form-group">
  <label for="inputZip" class="col-sm-2 control-label">Rating:</label>
    <div class="col-sm-offset-2 col-sm-8">
      <div class='captRate'></div><input type="text" id="inputRating" name="inputRating" style="display:none;">
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
      <button type="submit" class="btn btn-default">Register</button>
    </div>
  </div>
  
  
  
</form>

   <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonName="btn-primary">
    <input type="submit" value="Upload Image" class="btn btn-default" name="submit">
   </form>
   
   
   
    <!-- *********************************** END ADDING CONTENT ************************************************************-->

   
	
  <?php
  include_once "footer/footer.php";
  ?>
  
  <script>
   $('.captRate').raty({
	   
	   path: 'assets/rate/images',
	   click: function(score,evt){
		   $('#inputRating').val(score);
		   
	   }
	   
	   });
  </script>
  
 </body>
</html>