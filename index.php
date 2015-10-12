<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
   <title>Captains' Hub</title>
  <meta name="description" content="Captains' Hub is a portal where anglers can search for the best captain that serves charter boat services to take the anglers fishing.">
<meta name="keywords" content="Portal,Captains,Hub,Captains' Hub, Charter Boat, Fishing, Fish, Tour Guide ">
<meta name="author" content="Bryan Austin Augusli, Nazira Bukhari, John Youngblut, Sagar Singh, Harka Rai, William Parker, Jacinta Lam">
<meta name="robots" content="index,follow" />
<meta name="title" content="Captain's Hub" />

 
  <link rel="stylesheet" href="">
  <!-- 32x32 -->
  <!--[if IE]><link rel="shortcut icon" href="assets/icon/baugusli.ico"><![endif]-->
  
  <!-- Touch Icons - iOS and Android 2.1+ 180x180 pixels in size. --> 
  <link rel="apple-touch-icon-precomposed" href="">

  <!--196x196 -->
  <link rel="icon" href="">
  
  <!--
  <script src="assets/js/jquery-1.11.3.js"></script>
  <script src="assets/js/trophyRoom.js"></script>
  -->
 </head>
 
 <body>
   
    <h1>
	 Does script works?
	</h1>
	
	<button id="yesButton" onClick=workButton("Yes")>Yes</button> &nbsp &nbsp <button id="noButton" onClick=workButton("No")>No</button>
	
	<hr>
	</br>
	
	<h1>
	Does PHP works?
	</h1>
	
	<?php
	if (isset($_GET['submit'])){
		
		$name = $_GET['nameText'];
		echo "<p>Welcome " . $name . "!</p>";
	}
	?>
	<form action="index.php" method="GET">
	<p>What is your name, Sir?  <input type="text" id="nameText" name="nameText"></input></p>
	<p><input type="submit" value="submit"></input></p>
	</form>

 </body>
 
 <script>
 
 function workButton(ans){
	 
	 var userInput = ans;
 if(userInput == "Yes"){
	 alert("YAY!! IT WORKSS");
 }
 
 if (userInput == "No"){
	 
	 alert("NOOOOOOOOO!!!! WHYYYYYYYYYY?!?!! JK IT STILL WORKS");
 }
	 
 }
 </script>
 

</html>