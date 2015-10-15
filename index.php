<!DOCTYPE html>
<html lang="en">
 <head>
 
  <!-- IMPT! do not delete the first three meta tag. For bootstrap -->
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
    <div class="jumbotron jumbotronImg">
      <div class="container">	
	    <div class="row row-5-gutter">
	  <!-- Search Form -->
       <form class="form-inline" id="searchForm">	  
		  <div class="col-sm-12 col-md-2 col-5-gutter" > 
		    
		     <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Quick Search <span class="caret"></span></button>
			  <ul class="dropdown-menu">
               <li><a href="#">Quick Search</a></li>
               <li><a href="#">Advanced Search</a></li>
              </ul>
		 
		  </div>
		 	  
		  <div class="col-sm-12 col-md-2 col-5-gutter" > 
		     <div class="input-group"> 
			    <div class="input-group-addon">
			       <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
				</div>
			 <input type="text" class="form-control" id="searchZipCode" name="searchZipCode"placeholder="Zip Code">
			 
			 </div>
			 
		  </div>
		  
		  <div class="col-sm-12 col-md-2 col-5-gutter" >
            <div class="input-group"> 
			    <div class="input-group-addon">
			       <span class="glyphicon glyphicon-road" aria-hidden="true"></span>
				</div>
			 <input type="text" class="form-control" id="searchWithinRange" name="searchWithinRange" placeholder="Within">
			 </div>
          </div>

		  <div class="col-sm-12 col-md-2 col-5-gutter">
              <div class="input-group"> 
			    <div class="input-group-addon">
			       <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
				</div>
			 <input type="text" class="form-control" id="searchDate" name="searchDate"placeholder="Date">
			 </div>
		</div>	 
		  
		  <div class="col-sm-12 col-md-2 col-5-gutter" >
             <div class="input-group"> 
			    <div class="input-group-addon">
			       <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				</div>
				
				<!--RETRIEVE DYNAMICALLY FROM THE MAX NO OF PEOPLE OUR BIGGEST BOAT CAN HANDLE -->
				<select class="form-control" id="searchNoOfPpl" name="searchNoOfPpl">
                  <option value="1" selected="selected">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
				  <option value="5">5</option>
				  <option value="6">6</option>
                </select>
	  
			 
			 </div>
		 </div>	 
		 
		  <div class="col-sm-12 col-md-2 col-5-gutter" >
		     <div class="input-group"> 
			
			   <button type="submit" class="btn btn-primary">Search</button>
			 </div>
			 
		</div>
			


		 </form>
		 
		</div>
		
		
		<h2>Are you ready to fish?</h2>
		
		<?php
	
			
			/*
			$db = Database::getInstance();
            $mysqli = $db->getConnection(); 
            $query = "SELECT * FROM testTable";
    	    if($result = $mysqli->query($query)){
				
				while($row = $result->fetch_row()){
					printf("<p>Name is:" . $row[1] ."</p>");
				}
			}
			*/
		?>
		
	   </div>
      </div>
   

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
	    
		<?php
		include_once "class/Captain.class.php";
		
		$captain = new Captain();
		$capt = retrieveCaptain();
				$firstName = $capt->getFirstName();
				$lastName = $capt->getLastName();
				
				echo "<h1>".$firstName." ".$lastName."</h1>";
		?>
		
           <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail">
             <img src="assets/images/captainsTest.jpg" alt="...">
               <div class="caption">
                 <h3>Captain 1</h3>
                   <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                   <p><a href="#" class="btn btn-primary" role="button">Book Now</a> </p>
               </div>
            </div>
         </div>
		 
		  <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail">
             <img src="assets/images/captainsTest.jpg" alt="...">
               <div class="caption">
                 <h3>Captain 2</h3>
                   <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                   <p><a href="#" class="btn btn-primary" role="button">Book Now</a> </p>
               </div>
            </div>
         </div>
		 
		 <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail">
             <img src="assets/images/captainsTest.jpg" alt="...">
               <div class="caption">
                 <h3>Captain 3</h3>
                   <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                   <p><a href="#" class="btn btn-primary" role="button">Book Now</a> </p>
               </div>
            </div>
         </div>
		 
		 <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail">
             <img src="assets/images/captainsTest.jpg" alt="...">
               <div class="caption">
                 <h3>Captain 4</h3>
                   <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                   <p><a href="#" class="btn btn-primary" role="button">Book Now</a></p>
               </div>
            </div>
         </div>
      

      </div>

      <hr>

      
	   <?php
        include_once "footer/footer.php";
       ?>
  
    </div> <!-- /container -->
	
 
  
  
  <script>
    $( "#searchDate" ).datepicker({
	inline: true
  });


  </script>
  
 </body>
</html>