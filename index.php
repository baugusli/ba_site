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


<!-- SEARCH ************************* -->
	  
	    <div class="row row-5-gutter">
	  <!-- Search Form -->
       <form class="form-inline" id="searchForm" method="post" action="search.php">	  
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
				<select class="form-control" id="searchWithinRange" name="searchWithinRange">
                  <option value="5" selected="selected">5 Miles</option>
                  <option value="15">15 Miles</option>
                  <option value="25">25 Miles</option>
                  <option value="50">50 Miles</option>
				  <option value="100">100 Miles</option>
                </select>
				
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
		
		<!-- FILTER **************** -->
		 <div class="row row-5-gutter">
	  <!-- Search Form -->
       <form class="form-inline" id="filterForm">	  
		  <div class="col-sm-12 col-md-2 col-5-gutter" > 
		    
		     <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Filter</button>
			 
		  </div>
		 	  
		  <div class="col-sm-12 col-md-8 col-5-gutter" >
		     <div class="form-group">
			   <label for="filterRating" class="col-sm-2 control-label">Captain's Rating</label>
			 </div>
			   
			   <div class="form-control" id="filterRatingOption"> </div> & up
        
	  		 
		 </div>	 	

		 </form>
		 
		</div>	
		
		
		<!-- END************************* -->
		
		<h2>Are you ready to fish?</h2>
		<div class="loadingPage"><!-- Place at bottom of page --></div>
		
	   </div>
      </div>
   

    <div class="container">
      
      <div class="row" id="captRow">
	    
		<?php
		if($_SERVER['REQUEST_METHOD'] != 'POST'){ 
		include_once "class/Captain.class.php";
		$captList = array();
		$captain = new Captain();
		$captList = $captain->retrieveCaptain();
		
		   for ($i =0;$i<sizeof($captList);$i++){
			   
			   $captName = $captList[$i]->getFirstName() . " " . $captList[$i]->getLastName();
			   $rating = $captList[$i]->getRating();
			   $captId = $captList[$i]->getCaptainId();
	    ?>
		
		<div class="col-xs-6 col-sm-4 col-md-3 captClass">
            <div class="thumbnail">
             <img src="assets/images/captainsTest.jpg" alt="...">
               <div class="caption">
                 <h3><?php echo $captName; ?></h3>
				   <div id="captRate" class="captRate" data-score="<?php echo $rating; ?>"></div>
                   <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
                   <p><a href="captain.php?captainId=<?php echo $captId;  ?>" class="btn btn-primary" role="button">View Captain</a> <a href="#" class="btn btn-primary" role="button">Book Now</a> </p>
               </div>
            </div>
         </div>
			
        <?php			
		   }
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

$('.captRate').raty({ 
  readOnly:true,
   score: function() {
    return $(this).attr('data-score');
  },
  
  path: 'assets/rate/images'
  
});

//Filter click on rating stars event
$('#filterRatingOption').raty({ 
   score: 1,
  path: 'assets/rate/images',
   click: function(score,evt){
		 var captRatingPulled = 0;
		 
            //For every captain that has captClass class		 
		 $(".captClass").each( function () {	

                //Fade everything first		 
                 $(this).fadeOut();		
				 
				 //Once done execute the below code
          }).promise().done(function(){
			  
			  //for loop again
			   $(".captClass").each( function () {
			 captRatingPulled = $(this).find("#captRate").attr('data-score');
			 
			 //if higher than the filter score fade em in
			 if(captRatingPulled >= score){
				$(this).fadeIn();
				
			 }			
			
            });		  
			  
		  });

	   }
	   
});


		
$("#searchForm").submit(function(event) {
	
	//getting value from search bar and store it 
	var searchFormData = {
            'searchZipCode'      : $('#searchZipCode').val(),
            'searchWithinRange'  : $('#searchWithinRange').val()
        }
		
	//ajax function	
$.ajax({ 

//send request to search.php
 url: 'search.php',
 data: searchFormData,
 dataType: 'json',
 type: 'post',
  encode:true,
  
  //start loading page by adding class to the body to show the loading gif in main.ss
  beforeSend: function() { $("body").addClass("loading");},
  complete: function() {$("body").removeClass("loading");},
  
  //when success
  success: function(data){
	  
	  //populate the home page using javascript DOM manipulation
	populateHomePage(data);
	$('.captRate').raty({ 
      readOnly:true,
      score: function() {
      return $(this).attr('data-score');
     },
  
     path: 'assets/rate/images'
 
    });
    },
	
	//if error show error.. TO BE DELETED IN PROD AND REPLACE IT WITH ERROR PAGE!!******************************************
error: function(xhr, status, error) {
	
  //alert(xhr.responseText);
  searchFailedMessage();
}

});
 
 //Prevent form submitting by default - meaning stop it from redirecting user to the action in the form
 event.preventDefault();
 
});

function populateHomePage(data){
	 var firstName = "";
	 var lastName = "";
     var fullName = "";
	 var captain = "";
	 var rating = "";
	 $("#captRow").empty();
	 for (var i = 0;i<data.length;i++){
			   captain_id = data[i]['captain_id'];
			   firstName = data[i]['firstName'];
			   secondName = data[i]['lastName'];
			   
			   fullName = firstName + " " + secondName;
			   
			   rating = data[i]['rating'];
			   
			  captain = "<div class='col-xs-6 col-sm-4 col-md-3 captClass'>" +
                         " <div class='thumbnail'>" +
							 "<img src='assets/images/captainsTest.jpg' alt='...'>" +
							   "<div class='caption'>" +
								 "<h3>"+ fullName + "</h3>" +
								   "<div id='captRate' class='captRate' data-score='"+ rating +"'></div>" +
								   "<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p><p> " +
								   "<a href='captain.php?captainId="+captain_id+"' class='btn btn-primary' role='button'>View Captain</a>" +
								   "<a href='#' class='btn btn-primary' role='button'>Book Now</a> </p>" +
							   "</div>" +
							"</div>" +
						 "</div>";
		 
		      
			  //append the divs to the row with id captRow
			   $("#captRow").append(captain);
			   
	 }
}

function searchFailedMessage(){
	 $("#captRow").empty();
			   
			  captain = "<div class='col-xs-12 col-sm-12 col-md-12 captClass'>" +
                         "No Captain is found. Please widen the search criteria."
						 "</div>";
		 
		      
			  //append the divs to the row with id captRow
			   $("#captRow").append(captain);
			   
	 
	
}



  </script>
  
 </body>
</html>