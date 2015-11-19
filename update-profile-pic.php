<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){ 

if(isset($_POST['profile-pic']) && !empty($_POST['profile-pic'])){	
	 include_once "class/Captain.class.php";
	 include_once "class/Database.class.php";
	 $captain = new Captain();
	 $pic_path = $_POST['profile-pic'];
	 session_start();
	 $userId = $_SESSION['userId'];
	 unset($_SESSION['fileName']);
	 $ss = $captain->captainUpdateProfilePic($userId,$pic_path);
	 if($ss){
		
		 //Redirect to appointment Page
		 $host  = $_SERVER['HTTP_HOST'];
       $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'captain-upload-pic.php';
		$url = "http://".$host.$uri."/".$extra;
		echo "<script>location.href='".$url."'</script>";
        exit;
		
		
	 }
	 else{
		 
		 echo "<div class='container'><div class='col-md-12'><div class='alert alert-danger'> <strong> Cancellation Failed! </strong> </div></div></div>";
	 }
 }
 
 else{
	 
	 echo "<div class='container'><div class='col-md-12'><div class='alert alert-danger'> <strong> You are not authorized to view this page. </strong> </div></div></div>";
 }
}

else{
	echo "<div class='container'><div class='col-md-12'><div class='alert alert-danger'> <strong> You are not authorized to view this page. </strong> </div></div></div>";
}

?>