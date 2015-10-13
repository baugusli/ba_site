<!DOCTYPE html>
<html lang="en">
 <head>
 
  <!-- IMPT do not delete the first three meta tag. Used for bootstrap -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Captains' Hub</title>
  
  <!-- The following three meta is for SEO. Change accordingly for each page. -->
  <meta name="title" content="Captain's Hub" />
  <meta name="description" content="Captains' Hub is a portal where anglers can search for the best captain that serves charter boat services to take the anglers fishing.">
  <meta name="keywords" content="Portal,Captains,Hub,Captains' Hub, Charter Boat, Fishing, Fish, Tour Guide ">
  
  
  <!-- header.php contains js,css, and favicon links and some fix meta for SEO. -->
  <?php
  require "header/header.php";
  ?>
  
 <body>
 
   <!-- navigation folder stores the dynamic navigation bar. If user logn, it will retrieve different nav bar (Capt / User nav). -->
   <?php
    include_once "navigation/guestNav.php";
   ?>	

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">	
	  
	  <!-- Search Form -->
       <form class="form-inline">	  
        <div class="row">
		  <div class="col-md-2"> Quick Search </div>
		  <div class="col-md-2"> 
		     <div class="input-group"> 
			    <div class="input-group-addon">
			       <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
				</div>
			 <input type="text" class="form-control" id="searchZipCode" name="searchZipCode"placeholder="Zip Code">
			 
			 </div>
			 
		  </div>
		  
		  <div class="col-md-2">
            <div class="input-group"> 
			    <div class="input-group-addon">
			       <span class="glyphicon glyphicon-road" aria-hidden="true"></span>
				</div>
			 <input type="text" class="form-control" id="searchWithinRange" name="searchWithinRange" placeholder="Within">
			 </div>
          </div>

		  <div class="col-md-2">
              <div class="input-group"> 
			    <div class="input-group-addon">
			       <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
				</div>
			 <input type="text" class="form-control" id="searchDate" name="searchDate"placeholder="Date">
			 </div>
		</div>	 
		  
		  <div class="col-md-2">
             <div class="input-group"> 
			    <div class="input-group-addon">
			       <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				</div>
			 <input type="text" class="form-control" id="searchNoOfPppl" name="searchNoOfPppl" placeholder="No. Of People"> <!--RETRIEVE DYNAMICALLY FROM THE MAX NO OF PEOPLE OUR BIGGEST BOAT CAN HANDLE -->
			 </div>
		 </div>	 


		  <div class="col-md-2"> <button type="submit" class="btn btn-primary">Search</button> </div>
		 </form>
		 
		</div>
		
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Captain 1</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Captain 2</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Captain 3</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Captain's Hub 2015</p>
      </footer>
    </div> <!-- /container -->
	
	
	
    <!--************************************************************************************************************************************************88 
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
-->
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