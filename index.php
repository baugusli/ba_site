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
    include "navigation/guestNav.php";
	
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
	
		
	   </div>
      </div>
   

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
	    
		<?php
		include_once "class/Captain.class.php";
		$captList = array();
		$captain = new Captain();
		$captList = $captain->retrieveCaptain();
		
		   for ($i =0;$i<sizeof($captList);$i++){
			   
			   $captName = $captList[$i]->getFirstName() . " " . $captList[$i]->getLastName();
			  
			  
	    ?>
		
			   <div class="col-xs-6 col-sm-4 col-md-3">
            <div class="thumbnail">
             <img src="assets/images/captainsTest.jpg" alt="...">
               <div class="caption">
                 <h3><?php echo $captName; ?></h3>
				   <div class="captRate"></div>
                   <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                   <p><a href="#" class="btn btn-primary" role="button">Book Now</a> </p>
               </div>
            </div>
         </div>
			
        <?php			
		   }
		?>
	

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

$('.captRate').raty({ score: 2 });

$('#searchForm').submit(function(event) {
	 event.preventDefault();
  $.ajax({
  url: "https://www.zipcodeapi.com/rest/D34HXEETyax2pzAbnZNPfk79W4YfEddighZeWD8vNFxde7pC7csmwzwtDuIiIWAY/radius.json/",
  type: "GET",
  data: {zip_code : $("#searchZipCode").text(), distance : $("searchWithinRange").text(), units : "mile"},
  dataType: "json",
  success: function(data){
	  alert("OMG");
  }
});

});


  </script>
  
 </body>
</html>