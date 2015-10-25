<!DOCTYPE html>
<html lang="en">
 <head>
 
  <!-- IMPT do not delete the first three meta tag. Used for bootstrap -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Captains' Hub Login</title>
  
  <!-- The following three meta is for SEO. Change accordingly for each page. -->
  <meta name="title" content="Captain's Hub Login" />
  <meta name="description" content="Captains' Hub is a portal where anglers can search for the best captain that serves charter boat services to take the anglers fishing.">
  <meta name="keywords" content="Portal,Captains,Hub,Captains' Hub, Charter Boat, Fishing, Fish, Tour Guide , Login">
  
  
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
	
	$username = $_POST['loginUsername'];
	$pwd = md5($_POST['loginPassword']);
	
	$captList = array();
	$captain = new Captain();
	$captList = $captain->captainAuthenticate($username,$pwd);
	
	if(count($captList) == 0) {
		
		echo "<div class='alert alert-danger'> <strong> Login Failed! </strong> </div>";
	}
	
	elseif(count($captList) == 1){
		$_SESSION["userId"] = $captList[0]->getCaptainId();
		$_SESSION["userType"] = "Captain";
	   	$host  = $_SERVER['HTTP_HOST'];
       $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'index.php';
		$url = "http://".$host.$uri."/".$extra;
		echo "<script>location.href='".$url."'</script>";
        exit;
		
	}
	

	
	}
	
	
   ?>	
   
   <!-- *********************************** START ADDING CONTENT ************************************************************-->
   
   <form class="form-horizontal" action="login.php" method="POST">
  <div class="form-group">
    <label for="loginUsername" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="loginUsername" name="loginUsername" placeholder="Username">
    </div>
  </div>
  <div class="form-group">
    <label for="loginPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="Password">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
      <button type="submit" class="btn btn-default">Login</button>
    </div>
  </div>
   
</form>

    
    <!-- *********************************** END ADDING CONTENT ************************************************************-->

   
	
  <?php
  include_once "footer/footer.php";
  ?>
  
 </body>
</html>