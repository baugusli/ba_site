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
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
	include_once "class/Captain.class.php";
	
	$username = $_POST['inputUserName'];
	$pwd = md5($_POST['inputPassword']);
	$fname = $_POST['inputFirstName'];
	$lname = $_POST['inputLastName'];
	$street = $_POST['inputAddress'];
	$city = $_POST['inputCity'];
	$state = $_POST['inputState'];
	$zip = $_POST['inputZip'];
	$rating = $_POST['inputRating'];
	
	$captain = new Captain();
	if($captain->registerCaptain($username,$pwd,$fname,$lname,$zip,$rating,$street,$city,$state)){
		
		echo "<div class='alert alert-success'> <strong> Registration Successful! </strong> </div>";

	}
	
	else{
		
		echo "<div class='alert alert-danger'> <strong> Registration Failed! </strong> </div>";
		
	}
	
	
	}
   ?>	
   
   <!-- *********************************** START ADDING CONTENT ************************************************************-->
   
   <form class="form-horizontal" id="captainSignUpform" action="sign-up.php" method="POST">
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
  
   <div class="form-group has-feedback">
    <label for="inputAddress" class="col-sm-2 control-label">Address:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Address" data-error="Please enter your address" required>
	  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
	 <div class="help-block with-errors"></div>
  </div>
  
  <div class="form-group has-feedback">
    <label for="inputCity" class="col-sm-2 control-label">City:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="City" data-error="Please enter your city" required>
	  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
	 <div class="help-block with-errors"></div>
  </div>
  
  <div class="form-group has-feedback">
    <label for="inputState" class="col-sm-2 control-label">State:</label>
    <div class="col-sm-8">
	  
	  <select class="form-control" id="inputState" name="inputState">
		<option value="AL">Alabama</option>
		<option value="AK">Alaska</option>
		<option value="AZ">Arizona</option>
		<option value="AR">Arkansas</option>
		<option value="CA">California</option>
		<option value="CO">Colorado</option>
		<option value="CT">Connecticut</option>
		<option value="DE">Delaware</option>
		<option value="DC">District Of Columbia</option>
		<option value="FL">Florida</option>
		<option value="GA">Georgia</option>
		<option value="HI">Hawaii</option>
		<option value="ID">Idaho</option>
		<option value="IL">Illinois</option>
		<option value="IN">Indiana</option>
		<option value="IA">Iowa</option>
		<option value="KS">Kansas</option>
		<option value="KY">Kentucky</option>
		<option value="LA">Louisiana</option>
		<option value="ME">Maine</option>
		<option value="MD">Maryland</option>
		<option value="MA">Massachusetts</option>
		<option value="MI">Michigan</option>
		<option value="MN">Minnesota</option>
		<option value="MS">Mississippi</option>
		<option value="MO">Missouri</option>
		<option value="MT">Montana</option>
		<option value="NE">Nebraska</option>
		<option value="NV">Nevada</option>
		<option value="NH">New Hampshire</option>
		<option value="NJ">New Jersey</option>
		<option value="NM">New Mexico</option>
		<option value="NY">New York</option>
		<option value="NC">North Carolina</option>
		<option value="ND">North Dakota</option>
		<option value="OH">Ohio</option>
		<option value="OK">Oklahoma</option>
		<option value="OR">Oregon</option>
		<option value="PA">Pennsylvania</option>
		<option value="RI">Rhode Island</option>
		<option value="SC">South Carolina</option>
		<option value="SD">South Dakota</option>
		<option value="TN">Tennessee</option>
		<option value="TX">Texas</option>
		<option value="UT">Utah</option>
		<option value="VT">Vermont</option>
		<option value="VA">Virginia</option>
		<option value="WA">Washington</option>
		<option value="WV">West Virginia</option>
		<option value="WI">Wisconsin</option>
		<option value="WY">Wyoming</option>
	</select>


	  
    </div>
	 
  </div>
  
  
  <div class="form-group has-feedback">
    <label for="inputZip" class="col-sm-2 control-label">Zip:</label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="inputZip" name="inputZip" placeholder="Zip Code" data-minlength="5" data-maxlength="5" data-error="Please enter your 5 digit Zip Code" required>
	  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
	 <div class="help-block with-errors"></div>
  </div>
  
  <div class="form-group has-feedback">
  <label for="inputZip" class="col-sm-2 control-label">Rating:</label>
    <div class="col-sm-offset-2 col-sm-8">
      <div class='captRate'></div><input type="text" id="inputRating" name="inputRating" style="display:none;" >
	  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
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
  $('#captainSignUpform').validator({
	  
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
  
   $('.captRate').raty({
	   
	   path: 'assets/rate/images',
	   click: function(score,evt){
		   $('#inputRating').val(score);
		   
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
		
	  alert(xhr.responseText);
	}

	});
		
		
    });
	
	
	 
  </script>
  
 </body>
</html>