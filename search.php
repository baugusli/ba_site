<?php


include_once "class/Captain.class.php";
include_once "class/Database.class.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
$searchZip = $_POST['searchZipCode'];
$searchWithinRange = $_POST['searchWithinRange'];
}
else{
	
	$searchZip = "22003";
	$searchWithinRange = "50";
}
$url = "https://www.zipcodeapi.com/rest/D34HXEETyax2pzAbnZNPfk79W4YfEddighZeWD8vNFxde7pC7csmwzwtDuIiIWAY/radius.json/".$searchZip."/".$searchWithinRange."/mile";

$json = file_get_contents($url);
$json_data = json_decode($json, true);
/*echo '<pre>' . print_r($json_data, true) . '</pre>';*/
   
  $searchResultCaptList = array();
  $captList = array();
  $captain = new Captain();
  $captListCounter = 0;
  $jsonSize = max(array_map('count', $json_data));
  
  for ($i = 0; $i< $jsonSize; $i++){
	  
	  $zip = $json_data['zip_codes'][$i]['zip_code'];
	 
      $searchResultCaptList = $captain->searchCaptain($zip);
 	 
	  for ($o = 0; $o < sizeof($searchResultCaptList); $o++){
		  $captList[$captListCounter] = $searchResultCaptList[$o];
		  $captListCounter++;
		  
	  }
  }
  
  echo json_encode($captList);
  /*
    for ($a =0;$a<sizeof($captList);$a++){
			   
			   $captName = $captList[$a]->getFirstName() . " " . $captList[$a]->getLastName();
			   echo $captName;
	}
	*/




	

?>