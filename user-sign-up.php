<!DOCTYPE html>
<html lang="en">
 <head>
 
  <!-- IMPT do not delete the first three meta tag. Used for bootstrap -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>User Sign Up</title>
  
  <!-- The following three meta is for SEO. Change accordingly for each page. -->
  <meta name="title" content="User Sign Up" />
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
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){ 	
	include_once "class/User.class.php";	
	$username = $_POST['inputUserName'];
	$pwd = md5($_POST['inputPassword']);
	$fname = $_POST['inputFirstName'];
	$lname = $_POST['inputLastName'];
    $email = $_POST['inputEmail'];
	$user = new User();
	if($user->registerUser($username,$pwd,$fname,$lname,$email)){
		
		echo "<div class='container'><div class='col-md-12'><div class='alert alert-success'> <strong> Registration Successful! </strong> </div></div></div>";
		
		  $to  = $email;
		 
		 $subject = 'Appointment has been Scheduled Successfully';
		 
		 $message = "Your Appointment with user Will Stevens has been scheduled successfully at 20th November 2015 at 12:00pm - 20th November 2015 at 13:00pm ";
		 
		 $headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		
		$headers .= 'From: Captains Hub <bryan_augusli@hotmail.com>';

        mail($to, $subject, $message, $headers);
        
	}
	
	else{
		
		echo "<div class='container'><div class='col-md-12'><div class='alert alert-danger'> <strong> Registration Failed! </strong> </div></div></div>";
		
	}
	
	
	}
	else{
   ?>	
   
   <!-- *********************************** START ADDING CONTENT ************************************************************-->
   <div class="container">
   <h2 class="text-center">User Sign Up</h2>
   <hr>
   <form class="form-horizontal" id="userSignUpform" action="user-sign-up.php" method="POST">
  <div class="form-group has-feedback">
    <label for="inputUserName" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputUserName" name="inputUserName" data-exist="exist" placeholder="Username" required>
	  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
	 <input type="hidden" class="form-control" id="usernameExist" name="usernameExist">
	 <div class="help-block with-errors"></div>
  </div>
  
  <div class="form-group has-feedback">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
	  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
	
  </div>
  
  <div class="form-group has-feedback">
    <label for="inputConfirmPassword" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Confirm Password" data-match="#inputPassword" data-match-error="Password does not match" required>
	  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
	 <div class="help-block with-errors"></div>
  </div>
  
   
  <div class="form-group has-feedback">
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email Address" required>
	  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
	 <div class="help-block with-errors"></div>
  </div>
  
  
  <div class="form-group has-feedback">
    <label for="inputFirstName" class="col-sm-2 control-label">First Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="First Name" required>
	  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
  </div>
  
  <div class="form-group has-feedback">
    <label for="inputLastName" class="col-sm-2 control-label">Last Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="Last Name" required>
	  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
      <button type="submit" class="btn btn-default">Register</button>
    </div>
  </div>
  
  
  
</form>

 <?php
 include_once "footer/footer.php";
 ?>
   
 </div>  
   
    <!-- *********************************** END ADDING CONTENT ************************************************************-->

   
	
  <?php
	}
  
  ?>
  
  <script>
  $('#userSignUpform').validator({
	  
	  custom:{
		  
		  'exist': function() { 
		      var input = $('#usernameExist').val();
			 
			  if(input == "exist"){
			  return false;
		      }
		      else if(input == "available"){
			  return true;
		      }
			  
			  }
		 
	  },
	  errors:{
		  'exist':"Username already exist"
	  }
	  
  });
  
	   
    $( "#inputUserName" ).keyup(function() {
      var username = {
            'inputUserName' : $('#inputUserName').val()
            
        }
		
		$.ajax({ 

	//send request to search.php
	 url: 'checkUsername.php',
	 data: username,
	 dataType: 'text',
	 type: 'post',
	  
	  //when success
	  success: function(data){
 
			  $("#usernameExist").val(data);
		
		},
		
		//if error show error.. TO BE DELETED IN PROD AND REPLACE IT WITH ERROR PAGE!!******************************************
	error: function(xhr, status, error) {
		
	}

	});
		
		
    });
	
	
	 
  </script>
  
 </body>
</html>