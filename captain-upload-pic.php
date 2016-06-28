<!DOCTYPE html>
<html lang="en">
 <head>
 
  <!-- IMPT do not delete the first three meta tag. Used for bootstrap -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Captains' Hub</title>
  
  <!-- The following three meta is for SEO. Change accordingly for each page. -->
  <meta name="title" content="Captain's Hub Upload Picture" />
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
if(isset($_SESSION['userType']) && isset($_SESSION['userId']) && !empty($_SESSION['userType']) && !empty($_SESSION['userId'])){
		
		    $userType = $_SESSION['userType'];
			$userId = $_SESSION['userId'];
			
			if($userType == "Captain"){
				include_once "class/Captain.class.php";
				$captList = array();
		$captain = new Captain();
		
		$captList = $captain->retrieveCaptainProfile($userId);
			   $captPic = $captList[0]->getCaptainPic();
		
			   
			   if(isset($_SESSION['fileName'])){
								$captPic = "assets/images/upload/" . $_SESSION['fileName'];
								
							}
							
							
				?>
				   <!-- *********************************** START ADDING CONTENT ************************************************************-->
				 <div class="container">
      
                    <div class="row">
	  
	                    <div class="col-xs-6 col-sm-3 col-md-4 ">
						  <img src="<?php echo $captPic;?>" class="img-responsive img-thumbnail">
						   </br>
						   
						   <form action="update-profile-pic.php" method="post">
						    <input type="hidden" name="profile-pic" id="profile-pic" value="<?php echo $captPic?>">
							<button type="submit" class="btn btn-primary">Save</button>
						   </form>
						   
						</div>
						
						<div class="col-xs-6 col-sm-3 col-md-8 ">
						<form action="upload.php" method="post" enctype="multipart/form-data">
							Select picture to upload:
							<input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-buttonName="btn-primary">
							<input type="submit" value="Upload Image" class="btn btn-default" name="submit">
						</form>
						</div>
						
						
						
					</div>
					
					
                 </div>					
		 
		 
   
    <!-- *********************************** END ADDING CONTENT ************************************************************-->

				
				<?php
				
			}
			else{
				
				echo "<div class='container'><div class='col-md-12'><div class='alert alert-danger'> <strong> You are not authorized to view this page. </strong> </div></div></div>";
			}
		
	} 
			   
			 
   ?>	
   

   
  
   
	
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