<?php
include_once "class/Rating.class.php";
include_once "class/Database.class.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

 if(isset($_POST['rate']) && !empty($_POST['rate'])){	
$rate = $_POST['rate'];
$user_id = $_POST['user_id'];
$captain_id = $_POST['captain_id'];
   $app_id = $_POST['app_id'];
   
  $rating = new Rating();
    
	  $rating->userRateCaptain($rate,$user_id,$captain_id,$app_id);
 	 
  
  
}
else{
	
	echo "You are no authorized to view this page";
}


}
	

?>