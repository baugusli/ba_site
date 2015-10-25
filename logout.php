<?php
session_start();

if(isset($_SESSION['userType']) && isset($_SESSION['userId']) && !empty($_SESSION['userType']) && !empty($_SESSION['userId'])){
session_unset(); 
header( 'Location: index.php' ) ;
}
else{
	
	echo "You are not authorized to view this page";
}

?>