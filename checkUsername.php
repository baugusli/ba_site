<?php


include_once "class/Captain.class.php";
include_once "class/Database.class.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

 if(isset($_POST['inputUserName']) && !empty($_POST['inputUserName'])){	
$inputUserName = $_POST['inputUserName'];
   
  $captain = new Captain();
	 
      $exist = $captain->captCheckUsername($inputUserName);
 	 
	 if($exist){
		 echo "exist";
	 }
	 else{
		 echo "available";
	 }
  
  
}
else{
	
	echo "You are no authorized to view this page";
}


}
	

?>