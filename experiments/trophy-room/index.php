<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
   <title>Bryan Austin Augusli Portfolio Home</title>
  <meta name="description" content="Online portfolio created by Bryan Austin Augusli showcasing his prior projects and about himself.">
<meta name="keywords" content="Portfolio,Projects,Personal Website, Bryan Austin Augusli, Bryan Augusli, baugusli, bryanaugusli ">
<meta name="author" content="Bryan Austin Augusli">
<meta name="robots" content="index,follow" />
<meta name="title" content="Bryan Austin Augusli's Portfolio Home" />

 
  <link rel="stylesheet" href="baugusli.css">
  <!-- 32x32 -->
  <!--[if IE]><link rel="shortcut icon" href="assets/icon/baugusli.ico"><![endif]-->
  
  <!-- Touch Icons - iOS and Android 2.1+ 180x180 pixels in size. --> 
  <link rel="apple-touch-icon-precomposed" href="assets/icon/apple-touch-icon-baugusli.png">

  <!--196x196 -->
  <link rel="icon" href="assets/icon/baugusli.png">
  
  
  <script src="assets/js/jquery-1.11.3.js"></script>
  <script src="assets/js/trophyRoom.js"></script>
 </head>
 
 <body>
 
 <?php
	
require_once('assets/js/Mobile_Detect.php');
$detect = new Mobile_Detect; 
 
if( $detect->isMobile() || $detect->isTablet() ) { 

?>
<div id="mob">Mobile Version is still in development. </br> </br> Sorry about that. </br> </br> Please view my website with your desktop.</div>

<script>
$('div').show();
</script>
<?php
}
else{ ?>
	 

 

   <header id="logoHeader">
     <div id="logo"> Bryan Augusli </div>
	 
	 <div id="indexIntro"><span>A</span> Student.
	 
	 
   </header>
   
     <canvas id="roomCanvas">
Your browser does not support the HTML5 canvas tag.</canvas>
   
   <img id="myPhotoHome" src="assets/images/baugusli_drawed.jpg"></img>
   <footer>
   <div id="copyRightStatement"> Copyright &copy 2015 by Bryan Austin Augusli. |  <a href="http://www.bryanaugusli.com/sitemap.html">Site Map</a></div>
   </footer>
<?php }?>
<script>

//Getting window inner size
var w = window.innerWidth;
var h = window.innerHeight;

var c = document.getElementById("roomCanvas");

if(w < 950){
  w = 950;

  }
  
  if(h < 600){
  h = 600;
  
  }
  
//Set canvas size
c.width = w;
c.height = h;

 
  $("#logoHeader").css("width",w);
  $("#logo").css("font-size",w*0.025);
  
  $("#indexIntro").css("font-size",w*0.018);
var canvasMid = w/2;

//Colors code for walls
var wallColor = "#6c6c6c";
var strokeColor = "rgb(57, 58, 63)";
var gradFirstColor = "#74767f"; //light
var gradSecondColor = "#393a3f";


//Floors 3d plotting
var floor3DW = w * 0.12; 
var floor3DH = h * 0.12;
var floorMid = (h+(h-floor3DH))/2;

//Stand -> Stage width
var standWidth = (w * 0.11);
var standHeight = (h * 0.52);

//Gap for every stand
var standGap = (w - (standWidth * 4)) / 5;
var standYGap = ((h - (h-floor3DH)) * 0.3);

//Y position for stand
var standYFront = h - standYGap;
var standYBack = (h-floor3DH) + standYGap;

//angle 
var standDepth = standWidth * 0.39;
var secondStandDepth = standWidth * 0.17;


//Radial Gradient
var rightWallWidthMid = (w + (w-floor3DW))/2;
var rightWallHeightMid = (h-(floor3DH/2))/2;

var globalCubeHeight;
var globalFrameHeight;
var globalPhoneHeight;

var cubeGlobalID;
var firstFrameGlobalID;
var secondFrameGlobalID;
var phoneGlobalID;

   //Cube vars
	var y = 0;
	var x = 0;
	var yRotate = 0;
	var fixY = 0;
	var inCeiling = true;
	var newY = 0;
	
	//First frame vars
	var yFrame = 0;
	var yFrameRotate = 0;
	var fixFrameY = 0;
	var inFrameCeiling = true;
	var newFrameY = 0;
	
	//Second frame vars
	var ySecondFrame = 0;
	var newSecondFrameY = 0;
	var fixSecondFrameY = 0;
	var ySecondFrameRotate = 0;
	var inSecondFrameCeiling = true;
	
	//Phone vars
	var phoneYFrame = 0;
	var newPhoneY = 0;
	var fixPhoneY = 0;
	var yPhoneRotate = 0;
	var inPhoneCeiling = true;
	
	//Animation Status 
	var firstStandAnimated = false;
    var secondStandAnimated = false;
    var thirdStandAnimated = false;
    var fourthStandAnimated = false;

$( window ).load(function() {


		drawStage();
        drawStands(false,1);
		drawRectLight(true);
		drawFirstRectLight(true);
		drawThirdRectLight(true);
		drawFourthRectLight(true);
		drawFrame(false,0 ,false,0 ,false, 0);
		drawSecondFrame(false,0 ,false,0 ,false, 0);
       drawCube(14,true,0);
	   drawPhone(false,0,false,0,false,0);
	   
	   $('div').show();
		
});

$(window).ready(function() {

 drawStage();
        drawStands(false,1);
		drawRectLight(true);
		drawFirstRectLight(true);
		drawThirdRectLight(true);
		drawFourthRectLight(true);
		drawFrame(false,0 ,false,0 ,false, 0);
		drawSecondFrame(false,0 ,false,0 ,false, 0);
       drawCube(14,true,0);
	   drawPhone(false,0,false,0,false,0);
	   
	   	   $('div').show();
		   
		   
		   
});



$( window ).resize(function() {

  w = window.innerWidth;
  h = window.innerHeight;
  
  if(w < 950){
  w = 950;

  }
  
  if(h < 600){
  h = 600;
  
  }
$("#logoHeader").css("width",w);
$("#logo").css("font-size",w*0.025);
$("#indexIntro").css("font-size",w*0.018);
c.width = w;
c.height = h;
  
  //Floors 3d plotting
floor3DW = w * 0.12; 
 floor3DH = h * 0.12;
 floorMid = (h+(h-floor3DH))/2;

//Stand -> Stage width
 standWidth = (w * 0.11);
 standHeight = (h * 0.52);

//Gap for every stand
 standGap = (w - ((w * 0.11) * 4)) / 5;
 standYGap = ((h - (h-floor3DH)) * 0.3);

//Y position for stand
standYFront = h - standYGap;
 standYBack = (h-floor3DH) + standYGap;

//angle 
 standDepth = standWidth * 0.39;
 secondStandDepth = standWidth * 0.17;


//Radial Gradient
 rightWallWidthMid = (w + (w-floor3DW))/2;
rightWallHeightMid = (h-(floor3DH/2))/2;

  var context = c.getContext('2d');
  context.clearRect(0,0,c.width,c.height);
        drawStage();
        drawStands(false,0);
		drawRectLight(true);
		drawFirstRectLight(true);
		drawThirdRectLight(true);
		drawFourthRectLight(true);
		drawFrame(false,0 ,false,0 ,false, 0);
		drawSecondFrame(false,0 ,false,0 ,false, 0);
       drawCube(14,true,0);
	   drawPhone(false,0,false,0,false,0);
});

//MOUSE OVER AND OUT ------------------------------------------------------------------------------------
c.addEventListener('mousemove', function(evt){
   
     var mousePos = getMousePos(c,evt);
	 var mouseX = mousePos.x;
	 var mouseY = mousePos.y;
	 var standAddArea = 0;
	 var standTopAddArea = h * 0.10;
	 
	 //if mouseOver the first stand -----------------------------------------------------------------------
	 var firstStandLeftX = standGap - standAddArea;
	 var firstStandRightX = standGap + standWidth + standDepth + standAddArea;
	 var firstStandTopY = standYFront - globalCubeHeight - standHeight - standTopAddArea;
	 var firstStandBottomY = standYFront;
	 
	 //if within first stand reach
	 if(mouseX >= firstStandLeftX && mouseX <= firstStandRightX && mouseY >= firstStandTopY && mouseY <= firstStandBottomY && firstStandAnimated == false){
	  $("#roomCanvas").css("cursor","pointer");
	   firstStandAnimated = true;
	   y = 0;
       yFrame = 0;
       ySecondFrame = 0;
       phoneYFrame = 0;
	
	   cancelAnimationFrame(cubeGlobalID);
       cubeAnimateUp();
	 
	 }
	 
	 //if outside first stand reach
	 if(mouseX < firstStandLeftX || mouseX > firstStandRightX || mouseY < firstStandTopY || mouseY > firstStandBottomY){
	   
	   if(firstStandAnimated == true){
	    $("#roomCanvas").css("cursor","default");
	     firstStandAnimated = false;
	   y = 0;
       yFrame = 0;
       ySecondFrame = 0;
       phoneYFrame = 0;
  
       cancelAnimationFrame(cubeGlobalID);
       cubeAnimateDown();
	   }
	   
	 }
	 
	 //if mouseOver the first stand ---------------------------------------------------------------------
	 var secondStandLeftX = standGap * 2 + standWidth - standAddArea;
	 var secondStandRightX = standGap * 2 + standWidth * 2 + secondStandDepth + standAddArea;
	 var secondStandTopY = standYFront - globalFrameHeight - standHeight - standTopAddArea;
	 var secondStandBottomY = standYFront;
	 
	  //if within Second stand reach
	 if(mouseX >= secondStandLeftX && mouseX <= secondStandRightX && mouseY >= secondStandTopY && mouseY <= secondStandBottomY && secondStandAnimated == false){
	   $("#roomCanvas").css("cursor","pointer");
	   secondStandAnimated = true;
	   y = 0;
       yFrame = 0;
       ySecondFrame = 0;
       phoneYFrame = 0;
       cancelAnimationFrame(firstFrameGlobalID);
       resumeAnimateUp();
	 
	 }
	 
	 //if outside second stand reach
	 if(mouseX < secondStandLeftX || mouseX > secondStandRightX || mouseY < secondStandTopY || mouseY > secondStandBottomY){
	   
	   if(secondStandAnimated == true){
	      $("#roomCanvas").css("cursor","default");
	     secondStandAnimated = false;
	   y = 0;
       yFrame = 0;
       ySecondFrame = 0;
       phoneYFrame = 0;
  
       cancelAnimationFrame(firstFrameGlobalID);
	   frameAnimateDown();
	   }
	   
	 }
	 
	  //if mouseOver the third stand ---------------------------------------------------------------------
	 var thirdStandLeftX = standGap * 3 + standWidth * 2 - secondStandDepth - standAddArea;
	 var thirdStandRightX = standGap * 3 + standWidth * 3 + standAddArea;
	 var thirdStandTopY = standYFront - globalFrameHeight - standHeight - standTopAddArea;
	 var thirdStandBottomY = standYFront;
	 
	   //if within Third stand reach
	 if(mouseX >= thirdStandLeftX && mouseX <= thirdStandRightX && mouseY >= thirdStandTopY && mouseY <= thirdStandBottomY && thirdStandAnimated == false){
	  $("#roomCanvas").css("cursor","pointer");
	   thirdStandAnimated = true;
	   y = 0;
       yFrame = 0;
       ySecondFrame = 0;
       phoneYFrame = 0;
       cancelAnimationFrame(secondFrameGlobalID);
       secondFrameAnimateUp();
	 
	 }
	 
	 //if outside third stand reach
	 if(mouseX < thirdStandLeftX || mouseX > thirdStandRightX || mouseY < thirdStandTopY || mouseY > thirdStandBottomY){
	   
	   if(thirdStandAnimated == true){
	    $("#roomCanvas").css("cursor","default");
	     thirdStandAnimated = false;
	   y = 0;
       yFrame = 0;
       ySecondFrame = 0;
       phoneYFrame = 0;
  
       cancelAnimationFrame(secondFrameGlobalID);
       secondFrameAnimateDown();
	   }
	   
	 }
	 
	  //if mouseOver the first stand -----------------------------------------------------------------------
	 var fourthStandLeftX = standGap * 4  + standWidth * 3 - standDepth - standAddArea;
	 var fourthStandRightX = standGap * 4 + standWidth * 4 + standAddArea;
	 var fourthStandTopY = standYFront - globalPhoneHeight - standHeight - standTopAddArea;
	 var fourthStandBottomY = standYFront;
	 
	    //if within Fourth stand reach
	 if(mouseX >= fourthStandLeftX && mouseX <= fourthStandRightX && mouseY >= fourthStandTopY && mouseY <= fourthStandBottomY && fourthStandAnimated == false){
	  $("#roomCanvas").css("cursor","pointer");
	   fourthStandAnimated = true;
	   y = 0;
       yFrame = 0;
       ySecondFrame = 0;
       phoneYFrame = 0;
      cancelAnimationFrame(phoneGlobalID);
      phoneAnimateUp();
	 
	 }
	 
	  //if outside fourth stand reach
	 if(mouseX < fourthStandLeftX || mouseX > fourthStandRightX || mouseY < fourthStandTopY || mouseY > fourthStandBottomY){
	   
	   if(fourthStandAnimated == true){
	    $("#roomCanvas").css("cursor","default");
	     fourthStandAnimated = false;
	   y = 0;
       yFrame = 0;
       ySecondFrame = 0;
       phoneYFrame = 0;
  
       cancelAnimationFrame(phoneGlobalID);
       phoneAnimateDown();
	   }
	   
	 }
	 
}, false);


//Canvas MOUSE CLICK ----------------------------------------------------------------------------------------------
c.addEventListener('mousedown', function(evt){
   
     var mousePos = getMousePos(c,evt);
	 var mouseX = mousePos.x;
	 var mouseY = mousePos.y;
	 var standAddArea = standGap * 0.1;
	 var standTopAddArea = h * 0.11;
	 
	 //if mouseOver the first stand -----------------------------------------------------------------------
	 var firstStandLeftX = standGap - standAddArea;
	 var firstStandRightX = standGap + standWidth + standDepth + standAddArea;
	 var firstStandTopY = standYFront - globalCubeHeight - standHeight - standTopAddArea;
	 var firstStandBottomY = standYFront;
	 
	 //if within first stand reach
	 if(mouseX >= firstStandLeftX && mouseX <= firstStandRightX && mouseY >= firstStandTopY && mouseY <= firstStandBottomY ){
	   window.location.href="projects/";
	 
	 }
	 
	
	 
	 //if mouseOver the first stand ---------------------------------------------------------------------
	 var secondStandLeftX = standGap * 2 + standWidth - standAddArea;
	 var secondStandRightX = standGap * 2 + standWidth * 2 + secondStandDepth + standAddArea;
	 var secondStandTopY = standYFront - globalFrameHeight - standHeight - standTopAddArea;
	 var secondStandBottomY = standYFront;
	 
	  //if within Second stand reach
	 if(mouseX >= secondStandLeftX && mouseX <= secondStandRightX && mouseY >= secondStandTopY && mouseY <= secondStandBottomY ){
	   window.location.href="resume.html";
	 
	 }
	 

	 
	  //if mouseOver the third stand ---------------------------------------------------------------------
	 var thirdStandLeftX = standGap * 3 + standWidth * 2 - secondStandDepth - standAddArea;
	 var thirdStandRightX = standGap * 3 + standWidth * 3 + standAddArea;
	 var thirdStandTopY = standYFront - globalFrameHeight - standHeight - standTopAddArea;
	 var thirdStandBottomY = standYFront;
	 
	   //if within Third stand reach
	 if(mouseX >= thirdStandLeftX && mouseX <= thirdStandRightX && mouseY >= thirdStandTopY && mouseY <= thirdStandBottomY){
	    window.location.href="about.html";
	 
	 }
	 
	
	 
	  //if mouseOver the first stand -----------------------------------------------------------------------
	 var fourthStandLeftX = standGap * 4  + standWidth * 3 - standDepth - standAddArea;
	 var fourthStandRightX = standGap * 4 + standWidth * 4 + standAddArea;
	 var fourthStandTopY = standYFront - globalPhoneHeight - standHeight - standTopAddArea;
	 var fourthStandBottomY = standYFront;
	 
	    //if within Fourth stand reach
	 if(mouseX >= fourthStandLeftX && mouseX <= fourthStandRightX && mouseY >= fourthStandTopY && mouseY <= fourthStandBottomY ){
	    
window.location.href = "contact.php";
	 
	 }
	 
	
	 
}, false);


//Logo Click Event
$("#logo").click(function(){

window.location.href = "index.php";

});

$("#roomCanvas").mouseleave(function(){

if(firstStandAnimated == true){
 $("#roomCanvas").css("cursor","default");
	     firstStandAnimated = false;
	   y = 0;
       yFrame = 0;
       ySecondFrame = 0;
       phoneYFrame = 0;
  
       cancelAnimationFrame(cubeGlobalID);
       cubeAnimateDown();
	   
}
else if(secondStandAnimated == true){
   $("#roomCanvas").css("cursor","default");
	     secondStandAnimated = false;
	   y = 0;
       yFrame = 0;
       ySecondFrame = 0;
       phoneYFrame = 0;
  
       cancelAnimationFrame(firstFrameGlobalID);
	   frameAnimateDown();
}
else if(thirdStandAnimated == true){
 $("#roomCanvas").css("cursor","default");
	     thirdStandAnimated = false;
	   y = 0;
       yFrame = 0;
       ySecondFrame = 0;
       phoneYFrame = 0;
  
       cancelAnimationFrame(secondFrameGlobalID);
       secondFrameAnimateDown();
}
else if(fourthStandAnimated == true){
 $("#roomCanvas").css("cursor","default");
	     fourthStandAnimated = false;
	   y = 0;
       yFrame = 0;
       ySecondFrame = 0;
       phoneYFrame = 0;
  
       cancelAnimationFrame(phoneGlobalID);
       phoneAnimateDown();

}

});

 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63891360-1', 'auto');
  ga('send', 'pageview');
  
  
  
 

</script> 

 </body>
 

</html>