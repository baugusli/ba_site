<?php

  
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "class/Captain.class.php";
include_once "class/Database.class.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

 if(isset($_POST['searchZipCode']) && isset($_POST['searchWithinRange']) && !empty($_POST['searchZipCode']) && !empty($_POST['searchWithinRange'])){	
$searchZip = $_POST['searchZipCode'];
$searchWithinRange = $_POST['searchWithinRange'];



$api = "yYe8PVJnEAjsXdEgpQT6B5Fu5ZeEBD3aBhiqd2OSD8kAlYQKOKRqQwUVw8z8MDin";
$url = "https://www.zipcodeapi.com/rest/". $api ."/radius.json/".$searchZip."/".$searchWithinRange."/mile";

$json = file_get_contents($url);
$json_data = json_decode($json, true);
/*echo '<pre>' . print_r($json_data, true) . '</pre>';*/
   
  $searchResultCaptList = array();
  $captList = array();
  
  $captain = new Captain();
  $captListCounter = 0;
  
  //Get json data length
  $jsonSize = max(array_map('count', $json_data));
  
  for ($i = 0; $i< $jsonSize; $i++){
	  
	  //Get zip code from 3 dimensional array
	  $zip = $json_data['zip_codes'][$i]['zip_code'];
	 
	 //To captain.class.php to select captain with the zip codes.
      $searchResultCaptList = $captain->searchCaptain($zip);
 	 

	 
	  for ($o = 0; $o < sizeof($searchResultCaptList); $o++){
		  $captList[$captListCounter] = $searchResultCaptList[$o];
		  $captListCounter++;
		  
	  }
  }


  echo json_encode($captList);
  
  
}
else{
	
	echo "You are no authorized to view this page";
}


 }
	

?>