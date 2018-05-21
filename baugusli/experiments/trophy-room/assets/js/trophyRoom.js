
//First Frame Global Var
var frameOriDepth = 0;
var depthCounter = 0;
var amountToMinus = 0;

//Second Frame Global Var
var secondFrameOriDepth = 0;
var secondFrameDepthCounter = 0;
var secondFrameAmountToMinus = 0;

//Phone Frame Global Var
var phoneOriDepth = 0;
var phoneDepthCounter = 0;
var phoneAmountToMinus = 0;



//For phone to light width
var fourthRectWidth = 0;

//DRAW STAGE
function drawStage(){

//Floor drawing
var floor = c.getContext('2d');
floor.beginPath();
floor.moveTo(0,h);
floor.lineTo(w,h);
floor.lineTo(w-floor3DW, h-floor3DH);
floor.lineTo(floor3DW, h-floor3DH);
floor.lineTo(0,h);
floor.strokeStyle = strokeColor;
floor.stroke();

//Radial Grad for metallic effect
floor.fillStyle = wallColor;
var grad = floor.createRadialGradient(canvasMid,floorMid,10,canvasMid,floorMid,canvasMid);
grad.addColorStop(0,gradFirstColor);
grad.addColorStop(1,gradSecondColor);
floor.fillStyle=grad;
floor.fill();



//Left wall drawing
var leftWall = c.getContext('2d');
leftWall.beginPath();
leftWall.moveTo(0,h);
leftWall.lineTo(0,0);
leftWall.lineTo(floor3DW, 0);
leftWall.lineTo(floor3DW, h-floor3DH);
leftWall.lineTo(0,h);
leftWall.strokeStyle = strokeColor;
leftWall.stroke();

//Left wall grad plotting

var leftWallWidthMid = floor3DW/2;
var leftWallHeightMid = (h-(floor3DH/2))/2;
//Radial Grad for metallic effect
leftWall.fillStyle = wallColor;
var gradLeft = leftWall.createRadialGradient(leftWallWidthMid - leftWallWidthMid * 3.1,leftWallHeightMid,10,leftWallWidthMid- leftWallWidthMid * 0.6,leftWallHeightMid,leftWallHeightMid);
gradLeft.addColorStop(0,gradFirstColor);
gradLeft.addColorStop(1,gradSecondColor);
leftWall.fillStyle=gradLeft;
leftWall.fill();



//Right wall drawing
var rightWall = c.getContext('2d');
rightWall.beginPath();
rightWall.moveTo(w,h);
rightWall.lineTo(w,0);
rightWall.lineTo(w-floor3DW, 0);
rightWall.lineTo(w-floor3DW, h-floor3DH);
rightWall.lineTo(w,h);
rightWall.strokeStyle = strokeColor;
rightWall.stroke();

//Right wall grad plotting

var rightWallWidthMid = (w + (w-floor3DW))/2;
var rightWallHeightMid = (h-(floor3DH/2))/2;


//Radial Grad for metallic effect
rightWall.fillStyle = wallColor;
var gradRight = leftWall.createRadialGradient(rightWallWidthMid + ((w-rightWallWidthMid)*3.1),rightWallHeightMid,10,rightWallWidthMid + ((w-rightWallWidthMid)*0.6),rightWallHeightMid,rightWallHeightMid);
gradRight.addColorStop(0,gradFirstColor);
gradRight.addColorStop(1,gradSecondColor);
rightWall.fillStyle=gradRight;
rightWall.fill();


//Main wall drawing
var mainWall = c.getContext('2d');
mainWall.beginPath();
mainWall.moveTo(floor3DW,0);
mainWall.lineTo(w-floor3DW,0);
mainWall.lineTo(w-floor3DW, h-floor3DH);
mainWall.lineTo(floor3DW, h-floor3DH);
mainWall.lineTo(floor3DW,0);
mainWall.strokeStyle = strokeColor;
mainWall.stroke();

//Main wall grad plotting

var mainWallWidthMid = (floor3DW + (w-floor3DW)) / 2 ;
var mainWallHeightMid = (h-floor3DH) / 2;

//Radial Grad for metallic effect
mainWall.fillStyle = wallColor;
var grad = mainWall.createRadialGradient(mainWallWidthMid,mainWallHeightMid,10,mainWallWidthMid,mainWallHeightMid,mainWallWidthMid + 30);
grad.addColorStop(0,gradFirstColor);
grad.addColorStop(1,gradSecondColor);
mainWall.fillStyle=grad;
mainWall.fill();

}


function drawWall(w,h){

//Colors code for walls
var wallColor = "#6c6c6c";
var strokeColor = "#908962";
var gradFirstColor = "#74767f"; //light
var gradSecondColor = "#393a3f";

//Main wall drawing
var mainWall = c.getContext('2d');
mainWall.beginPath();
mainWall.moveTo(0,0);
mainWall.lineTo(w,0);
mainWall.lineTo(w, h);
mainWall.lineTo(0, h);
mainWall.lineTo(0,0);
mainWall.strokeStyle = strokeColor;
mainWall.stroke();

//Main wall grad plotting

var mainWallWidthMid = w / 2 ;
var mainWallHeightMid = h / 2;

//Radial Grad for metallic effect
mainWall.fillStyle = wallColor;
var grad = mainWall.createRadialGradient(mainWallWidthMid,mainWallHeightMid,10,mainWallWidthMid,mainWallHeightMid,mainWallWidthMid + 30);
grad.addColorStop(0,gradFirstColor);
grad.addColorStop(1,gradSecondColor);
mainWall.fillStyle=grad;
mainWall.fill();

}

//DRAW STANDS

function drawStands(over,standNo){

var standFirstColor = "#908262";
var standSecondColor = "#5C523B";

var strokeColor = 'rgba(144, 137, 98, 0)';
var strokeWidth = 1;


//Sign Width + Height + Ratios
var signWidth = standWidth * 0.8;
var standToSign = standWidth * 0.1;
var signHeight = signWidth * 0.6;
var standToSignHeight = standHeight * 0.2;

var signShadowColor = "#FCE047";

var blur1 = 0;
var blur2 = 0;
var blur3 = 0;
var blur4 = 0;

var signFillColor = "#DEA72D";
var signSecondColor = "#F1C155";
var signThirdColor = "#B78413";
var signFourthColor = "#906300";

var signFillColorOver = "#F2D016";
var signSecondColorOver = "#FCE047";
var signThirdColorOver = "#FFAE00";
var signFourthColorOver = "#C68700";
//Sign Color
if(over){


if(standNo == 1){
	blur1 = 35;
	
	
}

if(standNo == 2){
	blur2 = 35;
	
}

if(standNo == 3){
	blur3 = 35;
	
}
	
	if(standNo == 4){
	blur4 = 35;
	
}
	
	
}


var signTextSize = signWidth * 0.18;

var signTextFont = signTextSize + "px ubuntuL,arial";
var signStrokeColor = "#E9AC25";

//First Stand
var firstStand = c.getContext('2d');
firstStand.beginPath();
firstStand.moveTo(standGap,standYFront);
firstStand.lineTo(standGap + standWidth,standYFront);
firstStand.lineTo(standGap + standWidth + standDepth, standYBack);
firstStand.lineTo(standGap + standDepth, standYBack);
firstStand.lineTo(standGap,standYFront);
firstStand.strokeStyle = strokeColor;
firstStand.stroke();

 firstStand.shadowColor = '#585023';
 firstStand.shadowBlur = 10;
 firstStand.shadowOffsetX = 0;
 firstStand.shadowOffsetY = 0;
 firstStand.fill();

//First Stand Front
var firstStandFront = c.getContext('2d');
firstStandFront.beginPath();
firstStandFront.moveTo(standGap,standYFront);
firstStandFront.lineTo(standGap, standHeight);
firstStandFront.lineTo(standGap + standWidth, standHeight);
firstStandFront.lineTo(standGap + standWidth, standYFront);
firstStandFront.lineTo(standGap ,standYFront);
firstStandFront.strokeStyle = strokeColor;
firstStandFront.lineWidth = strokeWidth;
firstStandFront.stroke();
firstStandFront.shadowBlur = 0;
firstStandFront.shadowOffsetX = 0;
firstStandFront.shadowOffsetY = 0;
 
//Radial Grad for metallic effect
//firstStandFront.fillStyle = wallColor;
var gradStand = firstStandFront.createLinearGradient(standGap,0, standGap+standWidth,0);
gradStand.addColorStop(0,standFirstColor);
gradStand.addColorStop(1,standSecondColor);
firstStandFront.fillStyle = gradStand;
firstStandFront.fill();
firstStandFront.closePath();


var firstStandSign = c.getContext('2d');
firstStandSign.beginPath();
firstStandSign.moveTo (standGap + standToSign, standYFront-standHeight + standToSignHeight );
firstStandSign.lineTo (standGap + standToSign + signWidth, standYFront-standHeight + standToSignHeight );
firstStandSign.lineTo (standGap + standToSign + signWidth, standYFront-standHeight + standToSignHeight + signHeight );
firstStandSign.lineTo (standGap + standToSign , standYFront-standHeight + standToSignHeight + signHeight );
firstStandSign.lineTo (standGap + standToSign, standYFront-standHeight + standToSignHeight);
firstStandSign.strokeStyle = signStrokeColor;
firstStandSign.stroke();

var grad = firstStandSign.createLinearGradient(standGap + standToSign, 0, standGap + standToSign + signWidth,0);

if(over && standNo == 1){
grad.addColorStop(0,signFillColorOver);
grad.addColorStop(0.3,signSecondColorOver);
grad.addColorStop(0.5, signFillColorOver);
grad.addColorStop(0.9,signThirdColorOver);
grad.addColorStop(1,signFourthColorOver);
}
else{
grad.addColorStop(0,signFillColor);
grad.addColorStop(0.3,signSecondColor);
grad.addColorStop(0.5, signFillColor);
grad.addColorStop(0.9,signThirdColor);
grad.addColorStop(1,signFourthColor);
	
}

firstStandSign.fillStyle = grad;

firstStandSign.shadowColor = signShadowColor;
 firstStandSign.shadowBlur = blur1;
 firstStandSign.shadowOffsetX = 0;
 firstStandSign.shadowOffsetY = 0;

 
firstStandSign.fill();


firstStandSign.font = signTextFont;
firstStandSign.fillStyle= "black";
firstStandSign.fillText("Projects",standGap + standToSign + standWidth * 0.1,standYFront-standHeight + standToSignHeight + signHeight * 0.55);

firstStandSign.closePath();


//First Stand Side
var firstStandSide = c.getContext('2d');
firstStandSide.beginPath();
firstStandSide.moveTo(standGap + standWidth, standHeight);
firstStandSide.lineTo(standGap + standWidth + standDepth, standHeight -(standYFront - standYBack));
firstStandSide.lineTo(standGap + standWidth + standDepth, standYBack);
firstStandSide.lineTo(standGap + standWidth, standYFront);
firstStandSide.lineTo(standGap + standWidth, standHeight);
firstStandSide.closePath();
firstStandSide.strokeStyle = strokeColor;
firstStandSide.stroke();

firstStandSide.shadowBlur = 0;

//Radial Grad for metallic effect

var gradStand = firstStandSide.createLinearGradient(standGap+standWidth,0,standGap+standWidth+standDepth,0);
gradStand.addColorStop(0,standSecondColor);
gradStand.addColorStop(1,standFirstColor);
firstStandSide.fillStyle=gradStand;
firstStandSide.fill();


//First Stand Top
var firstStandTop = c.getContext('2d');
firstStandTop.beginPath();
firstStandTop.moveTo(standGap, standHeight);
firstStandTop.lineTo(standGap + standDepth, standHeight -(standYFront - standYBack));
firstStandTop.lineTo(standGap + standWidth + standDepth, standHeight -(standYFront - standYBack));
firstStandTop.lineTo(standGap + standWidth, standHeight);
firstStandTop.lineTo(standGap, standHeight);
firstStandTop.strokeStyle = strokeColor;
firstStandTop.stroke();
firstStandTop.closePath();

//Radial Grad for metallic effect
var gradStand = firstStandTop.createRadialGradient(standGap + (standWidth / 2) , standYFront - standHeight - ((standYFront - standYBack)*3), standWidth * 0.3 , standGap + (standWidth / 2) , standYFront - standHeight - ((standYFront - standYBack)/2), standWidth);
gradStand.addColorStop(0,standFirstColor);
gradStand.addColorStop(1,standSecondColor);
firstStandTop.fillStyle=gradStand;
firstStandTop.fill();



//Second Stand --------------------------------------------

var secondStandBottomLeftX = standGap * 2 + standWidth;
var secondStandBottomRightX = secondStandBottomLeftX + standWidth;

var secondStand = c.getContext('2d');
secondStand.beginPath();
secondStand.moveTo(secondStandBottomLeftX,standYFront);
secondStand.lineTo(secondStandBottomRightX, standYFront);
secondStand.lineTo(secondStandBottomRightX + secondStandDepth, standYBack);
secondStand.lineTo(secondStandBottomLeftX + secondStandDepth, standYBack);
secondStand.lineTo(secondStandBottomLeftX,standYFront);
secondStand.strokeStyle = strokeColor;

secondStand.stroke();

secondStand.shadowColor = '#585023';
secondStand.shadowBlur = 10;
 secondStand.shadowOffsetX = 0;
 secondStand.shadowOffsetY = 0;
 secondStand.fill();


//Second Stand Front
var secondStandFront = c.getContext('2d');
secondStandFront.beginPath();
secondStandFront.moveTo(secondStandBottomLeftX,standYFront);
secondStandFront.lineTo(secondStandBottomLeftX, standHeight);
secondStandFront.lineTo(secondStandBottomRightX, standHeight);
secondStandFront.lineTo(secondStandBottomRightX, standYFront);
secondStandFront.strokeStyle = strokeColor;
secondStandFront.stroke();
secondStand.shadowBlur = 0;
 
//Radial Grad for metallic effect
secondStandFront.fillStyle = wallColor;
var gradStand = secondStandFront.createLinearGradient(standGap * 2 + standWidth,0, standGap * 2 + standWidth * 2,0);
gradStand.addColorStop(0,standFirstColor);
gradStand.addColorStop(1,standSecondColor);
secondStandFront.fillStyle=gradStand;
secondStandFront.fill();
secondStandFront.closePath();


var secondStandSign = c.getContext('2d');
secondStandSign.beginPath();
secondStandSign.moveTo (secondStandBottomLeftX + standToSign, standYFront-standHeight + standToSignHeight );
secondStandSign.lineTo (secondStandBottomLeftX + standToSign + signWidth, standYFront-standHeight + standToSignHeight );
secondStandSign.lineTo (secondStandBottomLeftX + standToSign + signWidth, standYFront-standHeight + standToSignHeight + signHeight );
secondStandSign.lineTo (secondStandBottomLeftX + standToSign , standYFront-standHeight + standToSignHeight + signHeight );
secondStandSign.lineTo (secondStandBottomLeftX + standToSign, standYFront-standHeight + standToSignHeight);
secondStandSign.strokeStyle = signStrokeColor;
secondStandSign.stroke();

var grad = secondStandSign.createLinearGradient(secondStandBottomLeftX + standToSign, 0, secondStandBottomLeftX + standToSign + signWidth,0);
if(over && standNo == 2){
grad.addColorStop(0,signFillColorOver);
grad.addColorStop(0.3,signSecondColorOver);
grad.addColorStop(0.5, signFillColorOver);
grad.addColorStop(0.9,signThirdColorOver);
grad.addColorStop(1,signFourthColorOver);
}
else{
grad.addColorStop(0,signFillColor);
grad.addColorStop(0.3,signSecondColor);
grad.addColorStop(0.5, signFillColor);
grad.addColorStop(0.9,signThirdColor);
grad.addColorStop(1,signFourthColor);
	
}
secondStandSign.fillStyle = grad;

secondStandSign.shadowColor = signShadowColor;
 secondStandSign.shadowBlur = blur2;
 secondStandSign.shadowOffsetX = 0;
 secondStandSign.shadowOffsetY = 0;
 
secondStandSign.fill();

secondStandSign.font = signTextFont;
secondStandSign.fillStyle= "black";
secondStandSign.fillText("Resume",secondStandBottomLeftX + standToSign + standWidth * 0.1,standYFront-standHeight + standToSignHeight + signHeight * 0.55);

secondStandSign.closePath();


//Second Stand Side
var secondStandSide = c.getContext('2d');
secondStandSide.beginPath();
secondStandSide.moveTo(secondStandBottomRightX, standHeight);
secondStandSide.lineTo(secondStandBottomRightX + secondStandDepth, standHeight -(standYFront - standYBack));
secondStandSide.lineTo(secondStandBottomRightX + secondStandDepth, standYBack);
secondStandSide.lineTo(secondStandBottomRightX, standYFront);
secondStandSide.lineTo(secondStandBottomRightX, standHeight);
secondStandSide.strokeStyle = strokeColor;
secondStandSide.stroke();

secondStandSide.shadowBlur = 0;

//Radial Grad for metallic effect
secondStandSide.fillStyle = wallColor;
var gradStand = secondStandSide.createLinearGradient(standGap * 2 + standWidth * 2,0, standGap * 2 + standWidth * 2 + secondStandDepth,0);
gradStand.addColorStop(0, standSecondColor);
gradStand.addColorStop(1,standFirstColor);
secondStandSide.fillStyle=gradStand;
secondStandSide.fill();
secondStandSide.closePath();


//Second Stand Top
var secondStandTop = c.getContext('2d');
secondStandTop.beginPath();
secondStandTop.moveTo(secondStandBottomLeftX, standHeight);
secondStandTop.lineTo(secondStandBottomLeftX + secondStandDepth, standHeight -(standYFront - standYBack));
secondStandTop.lineTo(secondStandBottomRightX + secondStandDepth, standHeight -(standYFront - standYBack));
secondStandTop.lineTo(secondStandBottomRightX, standHeight);
secondStandTop.lineTo(secondStandBottomLeftX, standHeight);
secondStandTop.strokeStyle = strokeColor;
secondStandTop.stroke();

//Radial Grad for metallic effect
var gradStand = firstStandTop.createRadialGradient(standGap * 2 + standWidth + (standWidth / 2) , standYFront - standHeight - ((standYFront - standYBack)*3), standWidth * 0.3 , standGap * 2 + standWidth + (standWidth / 2)  , standYFront - standHeight - ((standYFront - standYBack)/2), standWidth);
gradStand.addColorStop(0,standFirstColor);
gradStand.addColorStop(1,standSecondColor);
secondStandTop.fillStyle=gradStand;
secondStandTop.fill();


//Third Stand --------------------------------------------

var thirdStandBottomLeftX = standGap * 3 + standWidth * 2;
var thirdStandBottomRightX = thirdStandBottomLeftX + standWidth;



var thirdStand = c.getContext('2d');
thirdStand.beginPath();
thirdStand.moveTo(thirdStandBottomLeftX, standYFront);
thirdStand.lineTo(thirdStandBottomRightX, standYFront);
thirdStand.lineTo(thirdStandBottomRightX - secondStandDepth, standYBack);
thirdStand.lineTo(thirdStandBottomLeftX - secondStandDepth, standYBack);
thirdStand.lineTo(thirdStandBottomLeftX, standYFront);
thirdStand.strokeStyle = strokeColor;
thirdStand.stroke();

thirdStand.shadowColor = '#585023';
thirdStand.shadowBlur = 10;
 thirdStand.shadowOffsetX = 0;
 thirdStand.shadowOffsetY = 0;
 thirdStand.fill();

//Third Stand Front
var thirdStandFront = c.getContext('2d');
thirdStandFront.beginPath();
thirdStandFront.moveTo(thirdStandBottomLeftX,standYFront);
thirdStandFront.lineTo(thirdStandBottomLeftX, standHeight);
thirdStandFront.lineTo(thirdStandBottomRightX, standHeight);
thirdStandFront.lineTo(thirdStandBottomRightX, standYFront);
thirdStandFront.strokeStyle = strokeColor;
thirdStandFront.stroke();

thirdStandFront.shadowBlur = 0;
//Radial Grad for metallic effect

var gradStand = thirdStandFront.createLinearGradient(standGap * 3 + standWidth * 2,0,standGap * 3 + standWidth * 3,0);
gradStand.addColorStop(0, standSecondColor);
gradStand.addColorStop(1,standFirstColor);
thirdStandFront.fillStyle=gradStand;
thirdStandFront.fill();

var thirdStandSign = c.getContext('2d');
thirdStandSign.beginPath();
thirdStandSign.moveTo (thirdStandBottomLeftX + standToSign, standYFront-standHeight + standToSignHeight );
thirdStandSign.lineTo (thirdStandBottomLeftX + standToSign + signWidth, standYFront-standHeight + standToSignHeight );
thirdStandSign.lineTo (thirdStandBottomLeftX + standToSign + signWidth, standYFront-standHeight + standToSignHeight + signHeight );
thirdStandSign.lineTo (thirdStandBottomLeftX + standToSign , standYFront-standHeight + standToSignHeight + signHeight );
thirdStandSign.lineTo (thirdStandBottomLeftX + standToSign, standYFront-standHeight + standToSignHeight);
thirdStandSign.strokeStyle = signStrokeColor;
thirdStandSign.stroke();

var grad = thirdStandSign.createLinearGradient(thirdStandBottomLeftX + standToSign + signWidth, 0,  thirdStandBottomLeftX + standToSign ,0);
if(over && standNo == 3){
grad.addColorStop(0,signFillColorOver);
grad.addColorStop(0.3,signSecondColorOver);
grad.addColorStop(0.5, signFillColorOver);
grad.addColorStop(0.9,signThirdColorOver);
grad.addColorStop(1,signFourthColorOver);
}
else{
grad.addColorStop(0,signFillColor);
grad.addColorStop(0.3,signSecondColor);
grad.addColorStop(0.5, signFillColor);
grad.addColorStop(0.9,signThirdColor);
grad.addColorStop(1,signFourthColor);
	
}
thirdStandSign.fillStyle = grad;

thirdStandSign.shadowColor = signShadowColor;
 thirdStandSign.shadowBlur = blur3;
 thirdStandSign.shadowOffsetX = 0;
 thirdStandSign.shadowOffsetY = 0;
 
 
thirdStandSign.fill();

thirdStandSign.font = signTextFont;
thirdStandSign.fillStyle= "black";
thirdStandSign.fillText("About Me",thirdStandBottomLeftX + standToSign + standWidth * 0.07,standYFront-standHeight + standToSignHeight + signHeight * 0.55);

thirdStandSign.closePath();

thirdStandSign.shadowBlur = 0;

//Third Stand Side
var thirdStandSide = c.getContext('2d');
thirdStandSide.beginPath();
thirdStandSide.moveTo(thirdStandBottomLeftX, standHeight);
thirdStandSide.lineTo(thirdStandBottomLeftX - secondStandDepth, standHeight -(standYFront - standYBack));
thirdStandSide.lineTo(thirdStandBottomLeftX - secondStandDepth, standYBack);
thirdStandSide.lineTo(thirdStandBottomLeftX, standYFront);
thirdStandSide.lineTo(thirdStandBottomLeftX, standHeight);
thirdStandSide.strokeStyle = strokeColor;
thirdStandSide.stroke();

//Radial Grad for metallic effect

var gradStand = thirdStandSide.createLinearGradient((standGap * 3 + standWidth * 2) - secondStandDepth ,0,  standGap * 3 + standWidth * 2 ,0);
gradStand.addColorStop(0, standFirstColor );
gradStand.addColorStop(1, standSecondColor);
thirdStandSide.fillStyle=gradStand;
thirdStandSide.fill();


//Third Stand Top
var thirdStandTop = c.getContext('2d');
thirdStandTop.beginPath();
thirdStandTop.moveTo(thirdStandBottomLeftX, standHeight);
thirdStandTop.lineTo(thirdStandBottomLeftX - secondStandDepth, standHeight -(standYFront - standYBack));
thirdStandTop.lineTo(thirdStandBottomRightX - secondStandDepth, standHeight -(standYFront - standYBack));
thirdStandTop.lineTo(thirdStandBottomRightX, standHeight);
thirdStandTop.lineTo(thirdStandBottomLeftX, standHeight);
thirdStandTop.strokeStyle = strokeColor;
thirdStandTop.stroke();

//Radial Grad for metallic effect

var gradStand = thirdStandTop.createRadialGradient(standGap * 3 + standWidth * 2 + (standWidth / 2) , standYFront - standHeight - ((standYFront - standYBack)*3), standWidth * 0.3 , standGap * 3 + standWidth * 2 + (standWidth / 2)  , standYFront - standHeight - ((standYFront - standYBack)/2), standWidth);
gradStand.addColorStop(0,standFirstColor);
gradStand.addColorStop(1,standSecondColor);
thirdStandTop.fillStyle=gradStand;
thirdStandTop.fill();



//Fourth Stand --------------------------------------------

var fourthStandBottomLeftX = standGap * 4 + standWidth * 3;
var fourthStandBottomRightX = fourthStandBottomLeftX + standWidth;


var fourthStand = c.getContext('2d');
fourthStand.beginPath();
fourthStand.moveTo(fourthStandBottomLeftX, standYFront);
fourthStand.lineTo(fourthStandBottomRightX, standYFront);
fourthStand.lineTo(fourthStandBottomRightX - standDepth, standYBack);
fourthStand.lineTo(fourthStandBottomLeftX - standDepth, standYBack);
fourthStand.lineTo(fourthStandBottomLeftX, standYFront);
fourthStand.strokeStyle = strokeColor;
fourthStand.stroke();

fourthStand.shadowColor = '#585023';
fourthStand.shadowBlur = 10;
 fourthStand.shadowOffsetX = 0;
 fourthStand.shadowOffsetY = 0;
 fourthStand.fill();

//Fourth Stand Front
var fourthStandFront = c.getContext('2d');
fourthStandFront.beginPath();
fourthStandFront.moveTo(fourthStandBottomLeftX,standYFront);
fourthStandFront.lineTo(fourthStandBottomLeftX, standHeight);
fourthStandFront.lineTo(fourthStandBottomRightX, standHeight);
fourthStandFront.lineTo(fourthStandBottomRightX, standYFront);
fourthStandFront.strokeStyle = strokeColor;
fourthStandFront.stroke();

fourthStandFront.shadowBlur = 0;
//Radial Grad for metallic effect
fourthStandFront.fillStyle = wallColor;
var gradStand = fourthStandFront.createLinearGradient(standGap * 4 + standWidth * 3,0,standGap * 4 + standWidth * 4,0);
gradStand.addColorStop(0, standSecondColor);
gradStand.addColorStop(1,standFirstColor);
fourthStandFront.fillStyle=gradStand;
fourthStandFront.fill();


var fourthStandSign = c.getContext('2d');
fourthStandSign.beginPath();
fourthStandSign.moveTo (fourthStandBottomLeftX + standToSign, standYFront-standHeight + standToSignHeight );
fourthStandSign.lineTo (fourthStandBottomLeftX + standToSign + signWidth, standYFront-standHeight + standToSignHeight );
fourthStandSign.lineTo (fourthStandBottomLeftX + standToSign + signWidth, standYFront-standHeight + standToSignHeight + signHeight );
fourthStandSign.lineTo (fourthStandBottomLeftX + standToSign , standYFront-standHeight + standToSignHeight + signHeight );
fourthStandSign.lineTo (fourthStandBottomLeftX + standToSign, standYFront-standHeight + standToSignHeight);
fourthStandSign.strokeStyle = signStrokeColor;
fourthStandSign.stroke();

var grad = fourthStandSign.createLinearGradient(fourthStandBottomLeftX + standToSign + signWidth, 0,  fourthStandBottomLeftX + standToSign ,0);
if(over && standNo == 4){
grad.addColorStop(0,signFillColorOver);
grad.addColorStop(0.3,signSecondColorOver);
grad.addColorStop(0.5, signFillColorOver);
grad.addColorStop(0.9,signThirdColorOver);
grad.addColorStop(1,signFourthColorOver);
}
else{
grad.addColorStop(0,signFillColor);
grad.addColorStop(0.3,signSecondColor);
grad.addColorStop(0.5, signFillColor);
grad.addColorStop(0.9,signThirdColor);
grad.addColorStop(1,signFourthColor);
	
}
fourthStandSign.fillStyle = grad;

fourthStandSign.shadowColor = signShadowColor;
 fourthStandSign.shadowBlur = blur4;
 fourthStandSign.shadowOffsetX = 0;
 fourthStandSign.shadowOffsetY = 0;

fourthStandSign.fill();

fourthStandSign.font = signTextFont;
fourthStandSign.fillStyle= "black";
fourthStandSign.fillText("Contact Me",fourthStandBottomLeftX + standToSign + signWidth * 0.03 ,standYFront-standHeight + standToSignHeight + signHeight * 0.55);

fourthStandSign.closePath();

fourthStandSign.shadowBlur = 0;


//Fourth Stand Side
var fourthStandSide = c.getContext('2d');
fourthStandSide.beginPath();
fourthStandSide.moveTo(fourthStandBottomLeftX, standHeight);
fourthStandSide.lineTo(fourthStandBottomLeftX - standDepth, standHeight -(standYFront - standYBack));
fourthStandSide.lineTo(fourthStandBottomLeftX - standDepth, standYBack);
fourthStandSide.lineTo(fourthStandBottomLeftX, standYFront);
fourthStandSide.lineTo(fourthStandBottomLeftX, standHeight);
fourthStandSide.strokeStyle = strokeColor;
fourthStandSide.stroke();

//Radial Grad for metallic effect
fourthStandSide.fillStyle = wallColor;
var gradStand = fourthStandSide.createLinearGradient((standGap * 4 + standWidth * 3) - standDepth ,0,  standGap * 4 + standWidth * 3 ,0);
gradStand.addColorStop(0, standFirstColor );
gradStand.addColorStop(1, standSecondColor);
fourthStandSide.fillStyle=gradStand;
fourthStandSide.fill();


//Fourth Stand Top
var fourthStandTop = c.getContext('2d');
fourthStandTop.beginPath();
fourthStandTop.moveTo(fourthStandBottomLeftX, standHeight);
fourthStandTop.lineTo(fourthStandBottomLeftX - standDepth, standHeight -(standYFront - standYBack));
fourthStandTop.lineTo(fourthStandBottomRightX - standDepth, standHeight -(standYFront - standYBack));
fourthStandTop.lineTo(fourthStandBottomRightX, standHeight);
fourthStandTop.lineTo(fourthStandBottomLeftX, standHeight);
fourthStandTop.strokeStyle = strokeColor;
fourthStandTop.stroke();

//Radial Grad for metallic effect
fourthStandTop.fillStyle = wallColor;
var gradStand = fourthStandTop.createRadialGradient(standGap * 4 + standWidth * 3 + (standWidth / 2) , standYFront - standHeight - ((standYFront - standYBack)*3), standWidth * 0.3 , standGap * 4 + standWidth * 3 + (standWidth / 2)  , standYFront - standHeight - ((standYFront - standYBack)/2), standWidth);
gradStand.addColorStop(0,standFirstColor);
gradStand.addColorStop(1,standSecondColor);
fourthStandTop.fillStyle=gradStand;
fourthStandTop.fill();


}


function drawCube(x,yPlus,y){
 //CUBE

//cube ratio to stand
var cubeToStandPercentage = 0.19;

//Cube width 
var cubeToStandWidth = standWidth * cubeToStandPercentage;
var cubeWidth = standWidth - cubeToStandWidth * 2;


//Cube Height
var cubeHeight = cubeWidth;
globalCubeHeight = cubeHeight;
var cubeToStandHeight = (standHeight - (standHeight -(standYFront - standYBack))) * 0.2;

//Cube Depth
var cubeDepth = cubeWidth * 0.39;

//blue color stroke var strokeColor ="rgba(0,238,245,1)";
var strokeColor ="rgba(0,0,0,0.5)";
//CUBE BOTTOM
//Cube x coordinates

x = 0.07 * standWidth;

var xTopRight = (standGap+ standWidth + cubeDepth) - cubeToStandWidth + x;
var xTopLeft = standGap + cubeToStandWidth + cubeDepth + x;

	var xBottomLeft = standGap + cubeToStandWidth + x;
    var xBottomRight = (standGap+ standWidth) - cubeToStandWidth + x;



//Cube Y coordinates


if(yPlus){
	
//Left	
var yBottomLeft = standHeight - cubeToStandHeight + y ;
var yTopLeft = (standHeight -(standYFront - standYBack)) + cubeToStandHeight + y;

//Right
var yBottomRight =  standHeight - cubeToStandHeight + y;
var yTopRight = (standHeight -(standYFront - standYBack)) + cubeToStandHeight + y;


}
else{
	
//Left	
var yBottomLeft = standHeight - cubeToStandHeight - y;
var yTopLeft = (standHeight -(standYFront - standYBack)) + cubeToStandHeight - y;

//Right
var yTopRight = (standHeight -(standYFront - standYBack)) + cubeToStandHeight - y;
var yBottomRight =  standHeight - cubeToStandHeight - y;

	
}


var cubeBottom = c.getContext('2d');
cubeBottom.beginPath();
cubeBottom.moveTo(xBottomLeft, yBottomLeft);
cubeBottom.lineTo(xBottomRight , yBottomRight );
cubeBottom.lineTo(xTopRight, yTopRight);
cubeBottom.lineTo(xTopLeft , yTopLeft);
cubeBottom.lineTo(xBottomLeft , yBottomLeft);
cubeBottom.strokeStyle = strokeColor;
cubeBottom.stroke();
cubeBottom.closePath();


//CUBE LEFT SIDE
var cubeLeftSide = c.getContext('2d');
cubeLeftSide.beginPath();
cubeLeftSide.moveTo(xBottomLeft,yBottomLeft);
cubeLeftSide.lineTo(xBottomLeft,yBottomLeft - cubeHeight);
cubeLeftSide.lineTo(xTopLeft,yTopLeft - cubeHeight);
cubeLeftSide.lineTo(xTopLeft,yTopLeft);
cubeLeftSide.lineTo(xBottomLeft,yBottomLeft);
cubeLeftSide.strokeStyle = strokeColor;
cubeLeftSide.stroke();
cubeLeftSide.closePath();


//CUBE BACK SIDE
var cubeBackSide = c.getContext('2d');
cubeBackSide.beginPath();
cubeBackSide.moveTo(xTopLeft,yTopLeft - cubeHeight);
cubeBackSide.lineTo(xTopRight,yTopRight - cubeHeight);
cubeBackSide.lineTo(xTopRight, yTopRight);
cubeBackSide.lineTo(xTopLeft,yTopLeft);
cubeBackSide.lineTo(xTopLeft,yTopLeft - cubeHeight);
cubeBackSide.strokeStyle = strokeColor;
cubeBackSide.stroke();

cubeBackSide.closePath();


//CUBE RIGHT SIDE
var cubeRightSide = c.getContext('2d');
cubeRightSide.beginPath();
cubeRightSide.moveTo(xTopRight,yTopRight - cubeHeight);
cubeRightSide.lineTo(xTopRight,yTopRight);
cubeRightSide.lineTo(xBottomRight, yBottomRight);
cubeRightSide.lineTo(xBottomRight, yBottomRight - cubeHeight);
cubeRightSide.lineTo(xTopRight,yTopRight - cubeHeight);
cubeRightSide.strokeStyle = strokeColor;
cubeRightSide.stroke();

var gradCube = cubeRightSide.createLinearGradient(xBottomRight,0, xBottomRight + cubeDepth,0);
gradCube.addColorStop(1,"#58747D");
gradCube.addColorStop(0,"#3E5F69");

cubeRightSide.fillStyle=gradCube;
cubeRightSide.fill();
cubeRightSide.closePath();


//CUBE TOP SIDE
var cubeTopSide = c.getContext('2d');
cubeTopSide.beginPath();
cubeTopSide.moveTo(xTopRight,yTopRight - cubeHeight);
cubeTopSide.lineTo(xTopLeft,yTopLeft - cubeHeight);
cubeTopSide.lineTo(xBottomLeft,yBottomLeft - cubeHeight);
cubeTopSide.lineTo(xBottomRight,yBottomRight - cubeHeight);
cubeTopSide.lineTo(xTopRight,yTopRight - cubeHeight);
cubeTopSide.strokeStyle = strokeColor;
cubeTopSide.stroke();

var gradCube = cubeTopSide.createRadialGradient(xBottomLeft + (cubeWidth / 2) , yBottomLeft - cubeHeight - ((yBottomLeft - yTopLeft)*3), cubeWidth * 0.3 , xBottomLeft + (cubeWidth / 2) , yBottomLeft - cubeHeight - ((yBottomLeft - yTopLeft)/2), cubeWidth);
gradCube.addColorStop(0,"#646B89");
gradCube.addColorStop(1,"#485073");
cubeTopSide.fillStyle=gradCube;
cubeTopSide.fill();
cubeTopSide.closePath();

//CUBE FRONT SIDE
var cubeFrontSide = c.getContext('2d');
cubeFrontSide.beginPath();
cubeFrontSide.moveTo(xBottomLeft,yBottomLeft - cubeHeight);
cubeFrontSide.lineTo(xBottomRight,yBottomRight - cubeHeight);
cubeFrontSide.lineTo(xBottomRight,yBottomRight);
cubeFrontSide.lineTo(xBottomLeft,yBottomLeft);
cubeFrontSide.lineTo(xBottomLeft,yBottomLeft - cubeHeight);
cubeFrontSide.strokeStyle = strokeColor;
cubeFrontSide.stroke();


var gradCube = cubeFrontSide.createLinearGradient(xBottomLeft,0, xBottomRight,0);
gradCube.addColorStop(1,"#564773");
gradCube.addColorStop(0,"#706389");

cubeFrontSide.fillStyle=gradCube;

cubeFrontSide.fill();
cubeFrontSide.closePath();


}


function drawFrame(fPlus,d,inPlus,inD,yPlus, y){
	var cubeToStandPercentage = 0.18;

//Cube width 
var cubeToStandWidth = standWidth * cubeToStandPercentage;
var cubeWidth = standWidth - cubeToStandWidth * 2;

var frameHeight = cubeWidth + 0.3 * cubeWidth;
var cubeToStandHeight = (standHeight - (standHeight -(standYFront - standYBack))) * 0.40;

globalFrameHeight = frameHeight;
//Cube Depth
var cubeDepth = cubeWidth * 0.06;

var frameFillColor =  "#7E795E";
var frameFillSecondColor = "#B4AD87";


//frame Depth 
var frameMastDepth = cubeWidth * 0.1;
frameOriDepth = frameMastDepth;
if(fPlus){
	var frameDepth = frameMastDepth + d;
	
}
else{
	var frameDepth = frameMastDepth - d;
}

//Cube x coordinate
var x = 0.07 * standWidth;

var xTopRight = (standGap * 2 + standWidth * 2 + cubeDepth) - cubeToStandWidth + x ;
var xTopLeft = standGap * 2 + standWidth + cubeToStandWidth + cubeDepth + x ;

var xBottomLeft = standGap * 2 + standWidth + cubeToStandWidth + x ;
var xBottomRight = (standGap * 2 + standWidth * 2) - cubeToStandWidth + x;

frameBottomXLeft = xBottomLeft;

//Cube Y coordinates

if(yPlus){
	//Left	
var yBottomLeft = standHeight - cubeToStandHeight + y;
var yTopLeft = (standHeight -(standYFront - standYBack)) + cubeToStandHeight + y ;

//Right
var yBottomRight =  standHeight - cubeToStandHeight + y;
var yTopRight = (standHeight -(standYFront - standYBack)) + cubeToStandHeight+ y;
}
else{
	
	//Left	
var yBottomLeft = standHeight - cubeToStandHeight -y ;
var yTopLeft = (standHeight -(standYFront - standYBack)) + cubeToStandHeight-y ;

//Right
var yBottomRight =  standHeight - cubeToStandHeight -y ;
var yTopRight = (standHeight -(standYFront - standYBack)) + cubeToStandHeight -y;
}


var frameFront = c.getContext('2d');
frameFront.beginPath();
frameFront.moveTo(xBottomLeft,yBottomLeft);
frameFront.lineTo(xBottomLeft + frameDepth, yBottomLeft - frameHeight);	
frameFront.lineTo(xBottomRight + frameDepth, yBottomLeft - frameHeight);
frameFront.lineTo(xBottomRight, yBottomRight);
frameFront.strokeStyle = "#484536";
frameFront.stroke();

var frameSide = c.getContext('2d');
frameSide.beginPath();
frameSide.moveTo(xBottomRight + frameDepth, yBottomLeft - frameHeight);
frameSide.lineTo(xBottomRight + frameDepth + cubeDepth - 1, yBottomLeft - frameHeight + cubeDepth);
frameSide.lineTo(xTopRight,yTopRight);
frameSide.lineTo(xBottomRight,yBottomRight);
frameSide.stroke();

var grad = frameSide.createLinearGradient(xBottomRight,0, xBottomRight + frameDepth + 15, 0);
grad.addColorStop(0,frameFillColor);
grad.addColorStop(1,frameFillSecondColor);
frameSide.fillStyle = grad;
frameSide.fill();


var frameInsideWidth = cubeWidth * 0.12;
var frameInsideMastDepth = cubeWidth * 0.084;

if(inPlus){
	var frameInsideDepth = frameInsideMastDepth + inD;
}
else{
	var frameInsideDepth = frameInsideMastDepth - inD;
}



var frameInside = c.getContext('2d');
frameInside.beginPath();
frameInside.moveTo(xBottomLeft + frameInsideWidth, yBottomLeft - frameInsideWidth);
frameInside.lineTo(xBottomRight - frameInsideWidth, yBottomLeft - frameInsideWidth);
frameInside.lineTo(xBottomRight + frameInsideDepth - frameInsideWidth, yBottomLeft - frameHeight + frameInsideWidth);
frameInside.lineTo(xBottomLeft + frameInsideDepth + frameInsideWidth, yBottomLeft - frameHeight + frameInsideWidth);
frameInside.lineTo(xBottomLeft + frameInsideWidth, yBottomLeft - frameInsideWidth);

var resumeTextSize = cubeWidth * 0.18;

var resumeTextFont = resumeTextSize + "px ubuntuL,arial";
frameInside.font = resumeTextFont;




frameInside.stroke();
frameInside.fillStyle="#CFD0B2";
frameInside.fill();

frameInside.fillStyle="#201932";
frameInside.fillText("Resume",xBottomLeft + frameInsideDepth + cubeWidth*0.17, yBottomLeft-frameHeight + frameHeight * 0.25);


if(inD != 0){
	
frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.164,yBottomLeft-frameHeight + frameHeight *0.34);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.6, yBottomLeft-frameHeight + frameHeight *0.34);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.164,yBottomLeft-frameHeight + frameHeight *0.38);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.795, yBottomLeft-frameHeight + frameHeight *0.38);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.164,yBottomLeft-frameHeight + frameHeight *0.46);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.4, yBottomLeft-frameHeight + frameHeight *0.46);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.164,yBottomLeft-frameHeight + frameHeight *0.50);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.795, yBottomLeft-frameHeight + frameHeight *0.50);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.164,yBottomLeft-frameHeight + frameHeight *0.54);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.795, yBottomLeft-frameHeight + frameHeight *0.54);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.164,yBottomLeft-frameHeight + frameHeight *0.58);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.795, yBottomLeft-frameHeight + frameHeight *0.58);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.164,yBottomLeft-frameHeight + frameHeight *0.62);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.795, yBottomLeft-frameHeight + frameHeight *0.62);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.164,yBottomLeft-frameHeight + frameHeight *0.66);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.795, yBottomLeft-frameHeight + frameHeight *0.66);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.164,yBottomLeft-frameHeight + frameHeight *0.74);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.5, yBottomLeft-frameHeight + frameHeight *0.74);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.164,yBottomLeft-frameHeight + frameHeight *0.78);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.795, yBottomLeft-frameHeight + frameHeight *0.78);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.164,yBottomLeft-frameHeight + frameHeight *0.82);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.795, yBottomLeft-frameHeight + frameHeight *0.82);


}

else{
	
	frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.164,yBottomLeft-frameHeight + frameHeight *0.34);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.6, yBottomLeft-frameHeight + frameHeight *0.34);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.161,yBottomLeft-frameHeight + frameHeight *0.38);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.795, yBottomLeft-frameHeight + frameHeight *0.38);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.158,yBottomLeft-frameHeight + frameHeight *0.46);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.4, yBottomLeft-frameHeight + frameHeight *0.46);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.155,yBottomLeft-frameHeight + frameHeight *0.50);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.79, yBottomLeft-frameHeight + frameHeight *0.50);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.152,yBottomLeft-frameHeight + frameHeight *0.54);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.785, yBottomLeft-frameHeight + frameHeight *0.54);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.149,yBottomLeft-frameHeight + frameHeight *0.58);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.78, yBottomLeft-frameHeight + frameHeight *0.58);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.146,yBottomLeft-frameHeight + frameHeight *0.62);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.775, yBottomLeft-frameHeight + frameHeight *0.62);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.143,yBottomLeft-frameHeight + frameHeight *0.66);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.77, yBottomLeft-frameHeight + frameHeight *0.66);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.140,yBottomLeft-frameHeight + frameHeight *0.74);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.5, yBottomLeft-frameHeight + frameHeight *0.74);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.137,yBottomLeft-frameHeight + frameHeight *0.78);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.765, yBottomLeft-frameHeight + frameHeight *0.78);

frameInside.moveTo(xBottomLeft + frameInsideDepth + cubeWidth*0.134,yBottomLeft-frameHeight + frameHeight *0.82);
frameInside.lineTo(xBottomLeft + frameInsideDepth + cubeWidth*0.76, yBottomLeft-frameHeight + frameHeight *0.82);

}


frameInside.lineWidth =1.5;
frameInside.strokeStyle="#201932";
frameInside.stroke();
frameInside.closePath();
frameInside.strokeStyle=strokeColor;


var frameInsideTop = c.getContext ('2d');
frameInsideTop.beginPath();
frameInsideTop.moveTo(xBottomLeft + frameDepth, yBottomLeft - frameHeight);
frameInsideTop.lineTo(xBottomLeft + frameInsideDepth + frameInsideWidth, yBottomLeft - frameHeight + frameInsideWidth);
frameInsideTop.lineTo(xBottomRight + frameInsideDepth - frameInsideWidth, yBottomLeft - frameHeight + frameInsideWidth);
frameInsideTop.lineTo(xBottomRight + frameDepth, yBottomLeft - frameHeight);
frameInsideTop.lineTo(xBottomLeft + frameDepth, yBottomLeft - frameHeight);
frameInsideTop.stroke();

var grad = frameInsideTop.createLinearGradient(0,yBottomLeft - frameHeight,0,yBottomLeft-frameHeight+frameInsideWidth);
grad.addColorStop(0,frameFillColor);
grad.addColorStop(1,frameFillSecondColor);
frameInsideTop.fillStyle = grad;
frameInsideTop.fill();

var frameInsideRight = c.getContext ('2d');
frameInsideRight.beginPath();
frameInsideRight.moveTo(xBottomRight + frameDepth, yBottomLeft - frameHeight);
frameInsideRight.lineTo(xBottomRight + frameInsideDepth - frameInsideWidth, yBottomLeft - frameHeight + frameInsideWidth);
frameInsideRight.lineTo(xBottomRight - frameInsideWidth, yBottomLeft - frameInsideWidth);
frameInsideRight.lineTo(xBottomRight,yBottomRight);
frameInsideRight.lineTo(xBottomRight + frameDepth, yBottomLeft - frameHeight);
frameInsideRight.stroke();

var grad = frameInsideRight.createLinearGradient(xBottomRight + frameDepth,yBottomLeft- (frameHeight / 2),xBottomRight - frameInsideWidth,yBottomLeft- (frameHeight / 2));
grad.addColorStop(0,frameFillColor);
grad.addColorStop(1,frameFillSecondColor);
frameInsideRight.fillStyle = grad;
frameInsideRight.fill();

var frameInsideBottom = c.getContext ('2d');
frameInsideBottom.beginPath();
frameInsideBottom.moveTo(xBottomRight,yBottomRight);
frameInsideBottom.lineTo(xBottomRight - frameInsideWidth, yBottomLeft - frameInsideWidth);
frameInsideBottom.lineTo(xBottomLeft + frameInsideWidth, yBottomLeft - frameInsideWidth);
frameInsideBottom.lineTo(xBottomLeft,yBottomLeft);
frameInsideBottom.lineTo(xBottomRight,yBottomRight);
frameInsideBottom.stroke();


var grad = frameInsideBottom.createLinearGradient(xBottomLeft,yBottomLeft,xBottomLeft,yBottomLeft-frameInsideWidth);
grad.addColorStop(0,frameFillColor);
grad.addColorStop(1,frameFillSecondColor);
frameInsideBottom.fillStyle = grad;
frameInsideBottom.fill();


var frameInsideLeft = c.getContext ('2d');
frameInsideLeft.beginPath();
frameInsideLeft.moveTo(xBottomLeft,yBottomLeft);
frameInsideLeft.lineTo(xBottomLeft + frameInsideWidth, yBottomLeft - frameInsideWidth);
frameInsideLeft.lineTo(xBottomLeft + frameInsideDepth + frameInsideWidth, yBottomLeft - frameHeight + frameInsideWidth);
frameInsideLeft.lineTo(xBottomLeft + frameDepth, yBottomLeft - frameHeight);
frameInsideLeft.lineTo(xBottomLeft,yBottomLeft);
frameInsideLeft.stroke();


var grad = frameInsideLeft.createLinearGradient(xBottomLeft,yBottomLeft-frameHeight/2,xBottomLeft+frameInsideWidth+frameDepth,yBottomLeft-frameHeight/2);
grad.addColorStop(0,frameFillColor);
grad.addColorStop(1,frameFillSecondColor);
frameInsideLeft.fillStyle = grad;
frameInsideLeft.fill();
}


function drawSecondFrame(fPlus,d,inPlus,inD,yPlus, y){
	var cubeToStandPercentage = 0.18;

//Cube width 
var cubeToStandWidth = standWidth * cubeToStandPercentage;
var cubeWidth = standWidth - cubeToStandWidth * 2;

var frameHeight = cubeWidth + 0.3 * cubeWidth;
var cubeToStandHeight = (standHeight - (standHeight -(standYFront - standYBack))) * 0.40;

//Cube Depth
var cubeDepth = cubeWidth * 0.06;

var frameFillColor =  "#7E795E";
var frameFillSecondColor = "#B4AD87";

//frame Depth 
var secondFrameMastDepth = cubeWidth * 0.1;
secondFrameOriDepth = secondFrameMastDepth;
if(fPlus){
	var frameDepth = secondFrameMastDepth + d;
	
}
else{
	var frameDepth = secondFrameMastDepth - d;
}

//Cube x coordinate
var x = 0.07 * standWidth;

var xTopRight = (standGap * 3 + standWidth * 3 + cubeDepth) - cubeToStandWidth - x;
var xTopLeft = standGap * 3 + standWidth * 2 + cubeToStandWidth + cubeDepth - x;

var xBottomLeft = standGap * 3 + standWidth * 2 + cubeToStandWidth - x;
var xBottomRight = (standGap * 3 + standWidth * 3) - cubeToStandWidth - x;


//Cube Y coordinates

if(yPlus){
	//Left	
var yBottomLeft = standHeight - cubeToStandHeight + y;
var yTopLeft = (standHeight -(standYFront - standYBack)) + cubeToStandHeight + y ;

//Right
var yBottomRight =  standHeight - cubeToStandHeight + y;
var yTopRight = (standHeight -(standYFront - standYBack)) + cubeToStandHeight+ y;
}
else{
	
	//Left	
var yBottomLeft = standHeight - cubeToStandHeight -y ;
var yTopLeft = (standHeight -(standYFront - standYBack)) + cubeToStandHeight-y ;

//Right
var yBottomRight =  standHeight - cubeToStandHeight -y ;
var yTopRight = (standHeight -(standYFront - standYBack)) + cubeToStandHeight -y;
}

var frameFront = c.getContext('2d');
frameFront.beginPath();
frameFront.moveTo(xBottomLeft,yBottomLeft);
frameFront.lineTo(xBottomLeft - frameDepth, yBottomLeft - frameHeight);	
frameFront.lineTo(xBottomRight - frameDepth, yBottomLeft - frameHeight);
frameFront.lineTo(xBottomRight, yBottomRight);
frameFront.strokeStyle = "#484536";
frameFront.lineWidth="1";
frameFront.stroke();

var frameSide = c.getContext('2d');
frameSide.beginPath();
frameSide.moveTo(xBottomLeft - frameDepth, yBottomLeft - frameHeight);
frameSide.lineTo(xBottomLeft - frameDepth - cubeDepth - 1, yBottomLeft - frameHeight + cubeDepth);
frameSide.lineTo(xBottomLeft - cubeDepth - 1 ,yTopLeft);
frameSide.lineTo(xBottomLeft,yBottomLeft);
frameSide.stroke();

var grad = frameSide.createLinearGradient(xBottomLeft,0, xBottomLeft - frameDepth - 15, 0);
grad.addColorStop(0,frameFillColor);
grad.addColorStop(1,frameFillSecondColor);
frameSide.fillStyle = grad;
frameSide.fill();




var frameInsideWidth = cubeWidth * 0.12;
var frameInsideMastDepth = cubeWidth * 0.084;

if(inPlus){
	var frameInsideDepth = frameInsideMastDepth + inD;
}
else{
	var frameInsideDepth = frameInsideMastDepth - inD;
}



var frameInside = c.getContext('2d');
frameInside.beginPath();
frameInside.moveTo(xBottomLeft + frameInsideWidth, yBottomLeft - frameInsideWidth);
frameInside.lineTo(xBottomRight - frameInsideWidth, yBottomLeft - frameInsideWidth);
frameInside.lineTo(xBottomRight - frameInsideDepth - frameInsideWidth, yBottomLeft - frameHeight + frameInsideWidth);
frameInside.lineTo(xBottomLeft - frameInsideDepth + frameInsideWidth, yBottomLeft - frameHeight + frameInsideWidth);
frameInside.lineTo(xBottomLeft + frameInsideWidth, yBottomLeft - frameInsideWidth);
frameInside.stroke();


var img = document.getElementById("myPhotoHome");

frameInside.drawImage(img,xBottomLeft+frameInsideWidth-frameInsideDepth,yBottomLeft - frameHeight + frameInsideWidth, cubeWidth - (2 * frameInsideWidth) + frameInsideDepth, frameHeight - (frameInsideWidth * 2) );
frameInside.closePath();


var frameInsideTop = c.getContext ('2d');
frameInsideTop.beginPath();
frameInsideTop.moveTo(xBottomLeft - frameDepth, yBottomLeft - frameHeight);
frameInsideTop.lineTo(xBottomLeft - frameInsideDepth + frameInsideWidth, yBottomLeft - frameHeight + frameInsideWidth);
frameInsideTop.lineTo(xBottomRight - frameInsideDepth - frameInsideWidth, yBottomLeft - frameHeight + frameInsideWidth);
frameInsideTop.lineTo(xBottomRight - frameDepth, yBottomLeft - frameHeight);
frameInsideTop.lineTo(xBottomLeft - frameDepth, yBottomLeft - frameHeight);
frameInsideTop.stroke();

var grad = frameInsideTop.createLinearGradient(0,yBottomLeft - frameHeight,0,yBottomLeft-frameHeight+frameInsideWidth);
grad.addColorStop(0,frameFillColor);
grad.addColorStop(1,frameFillSecondColor);
frameInsideTop.fillStyle = grad;
frameInsideTop.fill();


var frameInsideRight = c.getContext ('2d');
frameInsideRight.beginPath();
frameInsideRight.moveTo(xBottomRight - frameDepth, yBottomLeft - frameHeight);
frameInsideRight.lineTo(xBottomRight - frameInsideDepth - frameInsideWidth, yBottomLeft - frameHeight + frameInsideWidth);
frameInsideRight.lineTo(xBottomRight - frameInsideWidth, yBottomLeft - frameInsideWidth);
frameInsideRight.lineTo(xBottomRight,yBottomRight);
frameInsideRight.lineTo(xBottomRight - frameDepth, yBottomLeft - frameHeight);
frameInsideRight.stroke();

var grad = frameInsideRight.createLinearGradient(xBottomRight+frameDepth ,yBottomLeft- (frameHeight / 2),xBottomRight - frameInsideWidth - frameDepth,yBottomLeft- (frameHeight / 2));
grad.addColorStop(0,frameFillColor);
grad.addColorStop(1,frameFillSecondColor);
frameInsideRight.fillStyle = grad;
frameInsideRight.fill();


var frameInsideBottom = c.getContext ('2d');
frameInsideBottom.beginPath();
frameInsideBottom.moveTo(xBottomRight,yBottomRight);
frameInsideBottom.lineTo(xBottomRight - frameInsideWidth, yBottomLeft - frameInsideWidth);
frameInsideBottom.lineTo(xBottomLeft + frameInsideWidth, yBottomLeft - frameInsideWidth);
frameInsideBottom.lineTo(xBottomLeft,yBottomLeft);
frameInsideBottom.lineTo(xBottomRight,yBottomRight);
frameInsideBottom.stroke();

var grad = frameInsideBottom.createLinearGradient(xBottomLeft,yBottomLeft,xBottomLeft,yBottomLeft-frameInsideWidth);
grad.addColorStop(0,frameFillColor);
grad.addColorStop(1,frameFillSecondColor);
frameInsideBottom.fillStyle = grad;
frameInsideBottom.fill();


var frameInsideLeft = c.getContext ('2d');
frameInsideLeft.beginPath();
frameInsideLeft.moveTo(xBottomLeft,yBottomLeft);
frameInsideLeft.lineTo(xBottomLeft + frameInsideWidth, yBottomLeft - frameInsideWidth);
frameInsideLeft.lineTo(xBottomLeft - frameInsideDepth + frameInsideWidth, yBottomLeft - frameHeight + frameInsideWidth);
frameInsideLeft.lineTo(xBottomLeft - frameDepth, yBottomLeft - frameHeight);
frameInsideLeft.lineTo(xBottomLeft,yBottomLeft);
frameInsideLeft.stroke();


var grad = frameInsideLeft.createLinearGradient(xBottomLeft - frameDepth ,yBottomLeft- (frameHeight / 2),xBottomLeft + frameInsideWidth,yBottomLeft- (frameHeight / 2));
grad.addColorStop(0,frameFillColor);
grad.addColorStop(1,frameFillSecondColor);
frameInsideLeft.fillStyle = grad;
frameInsideLeft.fill();

}

function drawPhone(fPlus,d,inPlus,inD,yPlus, y){
	
	
var phoneToStandPercentage = 0.30;

//Cube width 
var phoneToStandWidth = standWidth * phoneToStandPercentage;
var phoneWidth = standWidth - phoneToStandWidth * 2;

var phoneHeight = phoneWidth + 1.2 * phoneWidth;
var phoneToStandHeight = (standHeight - (standHeight -(standYFront - standYBack))) * 0.40;

globalPhoneHeight = phoneHeight;

//Cube Depth
var cubeDepth = phoneWidth * 0.1;

//frame Depth 
var phoneMastDepth = phoneWidth * 0.15;
phoneOriDepth = phoneMastDepth;
if(fPlus){
	var phoneDepth = phoneMastDepth + d;
	
}
else{
	var phoneDepth = phoneMastDepth - d;
}

var rectLightToPhone = fourthRectWidth * 0.22;
var x = 0.09 * standWidth;

var xTopRight = (standGap * 4 + standWidth * 4 + cubeDepth) - phoneToStandWidth - rectLightToPhone - x  ;
var xTopLeft = standGap * 4 + standWidth * 3 + phoneToStandWidth + cubeDepth - rectLightToPhone - x  ;


var xBottomLeft = standGap * 4 + standWidth * 3 + phoneToStandWidth -  rectLightToPhone - x  ;
var xBottomRight = (standGap * 4 + standWidth * 4) - phoneToStandWidth - rectLightToPhone - x  ;


//Cube Y coordinates

if(yPlus){
	//Left	
var yBottomLeft = standHeight - phoneToStandHeight + y;
var yTopLeft = (standHeight -(standYFront - standYBack)) + phoneToStandHeight + y ;

//Right
var yBottomRight =  standHeight - phoneToStandHeight + y;
var yTopRight = (standHeight -(standYFront - standYBack)) + phoneToStandHeight+ y;
}
else{
	
	//Left	
var yBottomLeft = standHeight - phoneToStandHeight -y ;
var yTopLeft = (standHeight -(standYFront - standYBack)) + phoneToStandHeight-y ;

//Right
var yBottomRight =  standHeight - phoneToStandHeight -y ;
var yTopRight = (standHeight -(standYFront - standYBack)) + phoneToStandHeight -y;
}

var cornerRadius = phoneHeight * 0.06;

var phoneFront = c.getContext('2d');
phoneFront.beginPath();
phoneFront.moveTo(xBottomLeft,yBottomLeft - cornerRadius);
phoneFront.lineTo(xBottomLeft - phoneDepth, yBottomLeft - phoneHeight + cornerRadius);	
phoneFront.arcTo(xBottomLeft - phoneDepth, yBottomLeft - phoneHeight, xBottomLeft - phoneDepth + cornerRadius ,yBottomLeft - phoneHeight, cornerRadius);
phoneFront.lineTo(xBottomRight - phoneDepth - cornerRadius, yBottomLeft - phoneHeight);
phoneFront.arcTo(xBottomRight - phoneDepth, yBottomRight - phoneHeight, xBottomRight - phoneDepth ,yBottomRight -phoneHeight + cornerRadius,cornerRadius);
phoneFront.lineTo(xBottomRight, yBottomRight - cornerRadius);
phoneFront.arcTo(xBottomRight, yBottomRight, xBottomRight - cornerRadius, yBottomRight, cornerRadius);
phoneFront.lineTo(xBottomLeft + cornerRadius,yBottomLeft);
phoneFront.arcTo(xBottomLeft, yBottomLeft, xBottomLeft , yBottomLeft - cornerRadius, cornerRadius);
phoneFront.strokeStyle = "black";
phoneFront.stroke();

phoneFront.fillStyle="#DDDEEE";
phoneFront.fill();
phoneFront.closePath();

var sideRadius = cornerRadius * 0.5;
var phoneSide = c.getContext('2d');
phoneSide.beginPath();
phoneSide.moveTo(xBottomLeft - phoneDepth + sideRadius, yBottomLeft - phoneHeight);
phoneSide.arcTo(xBottomLeft - phoneDepth - cubeDepth , yBottomLeft - phoneHeight + sideRadius, xBottomLeft - phoneDepth - cubeDepth, yBottomLeft - phoneHeight + sideRadius + 2, cornerRadius  );
phoneSide.lineTo(xBottomLeft - cubeDepth, yBottomLeft-cornerRadius-sideRadius);
phoneSide.arcTo(xBottomLeft - cubeDepth, yBottomLeft-cornerRadius, xBottomLeft,yBottomLeft,cornerRadius);
phoneSide.lineTo(xBottomLeft+cornerRadius,yBottomLeft);
phoneSide.arcTo(xBottomLeft, yBottomLeft, xBottomLeft , yBottomLeft - cornerRadius, cornerRadius);
phoneSide.lineTo(xBottomLeft - phoneDepth, yBottomLeft - phoneHeight + cornerRadius);	
phoneSide.arcTo(xBottomLeft - phoneDepth, yBottomLeft - phoneHeight, xBottomLeft - phoneDepth + cornerRadius ,yBottomLeft - phoneHeight, cornerRadius);
phoneSide.stroke();

var grad = phoneSide.createLinearGradient(xBottomLeft - phoneDepth - cubeDepth,0, xBottomLeft-phoneDepth,0);
grad.addColorStop(0,"#A2A2A2");
grad.addColorStop(1,"#707070");
phoneSide.fillStyle= grad;
phoneSide.fill();
phoneSide.closePath();

var phoneInsideWidth = phoneWidth * 0.10;
var phoneInsideMastDepth = phoneWidth * 0.12;

if(inPlus){
	var phoneInsideDepth = phoneInsideMastDepth + inD;
}
else{
	var phoneInsideDepth = phoneInsideMastDepth - inD;
}

var phoneInsideHeight = phoneHeight * 0.15;


var phoneScreen = c.getContext('2d');
phoneScreen.beginPath();
phoneScreen.moveTo(xBottomLeft + phoneInsideWidth, yBottomLeft - phoneInsideHeight);
phoneScreen.lineTo(xBottomRight - phoneInsideWidth, yBottomLeft - phoneInsideHeight);
phoneScreen.lineTo(xBottomRight - phoneInsideWidth - phoneInsideDepth, yBottomLeft - phoneHeight + phoneInsideHeight);
phoneScreen.lineTo(xBottomLeft + phoneInsideWidth - phoneInsideDepth , yBottomLeft - phoneHeight + phoneInsideHeight);
phoneScreen.lineTo(xBottomLeft + phoneInsideWidth, yBottomLeft - phoneInsideHeight);

if(y == 0){
	phoneScreen.fillStyle="black";
}

else{
	phoneScreen.fillStyle="black";
	
}

phoneScreen.stroke();
phoneScreen.fill();

var phoneMid = (xBottomRight - xBottomLeft) / 2;
var buttonY = yBottomLeft - (phoneInsideHeight / 2);
var buttonRad = phoneWidth * 0.1;
var phoneButton = c.getContext('2d');
phoneButton.beginPath();
phoneButton.arc(xBottomLeft + phoneMid, buttonY,buttonRad,0, 2*Math.PI);
phoneButton.stroke();


}

function drawFirstRectLight(off){
	
	//cube ratio to stand
var cubeToStandPercentage = 0.18;

//Cube width 
var cubeToStandWidth = standWidth * cubeToStandPercentage;
var cubeWidth = standWidth - cubeToStandWidth * 2;


//Cube Height
var cubeHeight = cubeWidth;
var cubeToStandHeight = (standHeight - (standHeight -(standYFront - standYBack))) * 0.40;

//Cube Depth
var cubeDepth = cubeWidth * 0.14;

var yDiff = yBottomLeft - yTopLeft;


//Second Light--------------------------------------------------------------------------------
//second light x coordinates
var x = 0.12 * standWidth;

var xTopRight = (standGap + standWidth + cubeDepth) - cubeToStandWidth + x ;
var xTopLeft = standGap  + cubeToStandWidth + cubeDepth + x ;

var xBottomLeft = standGap   + cubeToStandWidth + x;
var xBottomRight = (standGap  + standWidth ) - cubeToStandWidth + x;



//Second Light Y coordinates

//Left	
var yBottomLeft = standHeight - cubeToStandHeight ;
var yTopLeft = (standHeight -(standYFront - standYBack)) + cubeToStandHeight ;

//Right
var yBottomRight =  standHeight - cubeToStandHeight ;
var yTopRight = (standHeight -(standYFront - standYBack)) + cubeToStandHeight;


var insideYDepth = yDiff * 0.6;
var insideXDepth = cubeWidth * 0.08;

var cubeBottom = c.getContext('2d');
cubeBottom.beginPath();
cubeBottom.moveTo(xBottomLeft, yBottomLeft);
cubeBottom.lineTo(xBottomRight , yBottomRight );
cubeBottom.lineTo(xTopRight, yTopRight);
cubeBottom.lineTo(xTopLeft , yTopLeft);
cubeBottom.lineTo(xBottomLeft , yBottomLeft);
cubeBottom.strokeStyle = strokeColor;
cubeBottom.stroke();

cubeBottom.fillStyle = wallColor;
var gradCube = cubeBottom.createRadialGradient(rightWallWidthMid + ((w-rightWallWidthMid)*3.1),rightWallHeightMid,10,rightWallWidthMid + ((w-rightWallWidthMid)*0.6),rightWallHeightMid,rightWallHeightMid);
gradCube.addColorStop(0,gradFirstColor);
gradCube.addColorStop(1,gradSecondColor);
//cubeBottom.fillStyle=gradCube;
cubeBottom.fillStyle="brown";
//cubeBottom.fill();

var lightInside = c.getContext('2d');
lightInside.beginPath();
lightInside.moveTo(xTopLeft, yTopLeft);
lightInside.lineTo(xTopLeft, yTopLeft + insideYDepth);
lightInside.lineTo(xBottomLeft + insideXDepth,yBottomLeft);

lightInside.stroke();


var lightInsideToRight = c.getContext('2d');
lightInsideToRight.beginPath();
lightInsideToRight.moveTo(xTopLeft, yTopLeft + insideYDepth);
lightInsideToRight.lineTo(xBottomRight + insideXDepth - insideXDepth * 0.5, yTopLeft + insideYDepth);

lightInsideToRight.stroke();

var lightHeight = h * 0.09 ;
var lightWall = c.getContext('2d');
var opacity = 0; //55% visible
var lightWallDepth = cubeWidth * 0.10;


lightWall.beginPath();
lightWall.moveTo(xBottomLeft,yBottomLeft);
lightWall.lineTo(xBottomLeft - lightWallDepth, yBottomLeft - lightHeight);
lightWall.lineTo(xBottomRight + lightWallDepth, yBottomLeft - lightHeight);
lightWall.lineTo(xBottomRight,yBottomRight);
lightWall.lineTo(xBottomLeft,yBottomLeft);


lightWall.strokeStyle = 'rgba(224,224,224,'+opacity+')';
lightWall.stroke();

var grad = lightWall.createLinearGradient(xBottomLeft,yBottomLeft,xBottomLeft,yBottomLeft - lightHeight);
grad.addColorStop(0,"#15527e");

grad.addColorStop(1,'rgba(0,238,245,'+opacity+')');

lightWall.fillStyle = grad;

if(off){
	
	
}

else{
	lightWall.fill();
}

	
	
}


function drawRectLight(off){
	//cube ratio to stand
var cubeToStandPercentage = 0.18;

//Cube width 
var cubeToStandWidth = standWidth * cubeToStandPercentage;
var cubeWidth = standWidth - cubeToStandWidth * 2;


//Cube Height
var cubeHeight = cubeWidth;
var cubeToStandHeight = (standHeight - (standHeight -(standYFront - standYBack))) * 0.40;

//Cube Depth
var cubeDepth = cubeWidth * 0.06;

var yDiff = yBottomLeft - yTopLeft;


//Second Light--------------------------------------------------------------------------------
//second light x coordinates

var x = 0.07 * standWidth;

var xTopRight = (standGap * 2 + standWidth * 2 + cubeDepth) - cubeToStandWidth + x ;
var xTopLeft = standGap * 2 + standWidth + cubeToStandWidth + cubeDepth + x;

var xBottomLeft = standGap * 2 + standWidth + cubeToStandWidth + x ;
var xBottomRight = (standGap * 2 + standWidth * 2) - cubeToStandWidth + x;



//Second Light Y coordinates

//Left	
var yBottomLeft = standHeight - cubeToStandHeight ;
var yTopLeft = (standHeight -(standYFront - standYBack)) + cubeToStandHeight ;

//Right
var yBottomRight =  standHeight - cubeToStandHeight ;
var yTopRight = (standHeight -(standYFront - standYBack)) + cubeToStandHeight;


var insideYDepth = yDiff * 0.6;
var insideXDepth = cubeWidth * 0.08;

var cubeBottom = c.getContext('2d');
cubeBottom.beginPath();
cubeBottom.moveTo(xBottomLeft, yBottomLeft);
cubeBottom.lineTo(xBottomRight , yBottomRight );
cubeBottom.lineTo(xTopRight, yTopRight);
cubeBottom.lineTo(xTopLeft , yTopLeft);
cubeBottom.lineTo(xBottomLeft , yBottomLeft);
cubeBottom.strokeStyle = strokeColor;
cubeBottom.stroke();

cubeBottom.fillStyle = wallColor;
var gradCube = cubeBottom.createRadialGradient(rightWallWidthMid + ((w-rightWallWidthMid)*3.1),rightWallHeightMid,10,rightWallWidthMid + ((w-rightWallWidthMid)*0.6),rightWallHeightMid,rightWallHeightMid);
gradCube.addColorStop(0,gradFirstColor);
gradCube.addColorStop(1,gradSecondColor);
//cubeBottom.fillStyle=gradCube;
cubeBottom.fillStyle="brown";
//cubeBottom.fill();

var lightInside = c.getContext('2d');
lightInside.beginPath();
lightInside.moveTo(xTopLeft, yTopLeft);
lightInside.lineTo(xTopLeft, yTopLeft + insideYDepth);
lightInside.lineTo(xBottomLeft + insideXDepth,yBottomLeft);

lightInside.stroke();


var lightInsideToRight = c.getContext('2d');
lightInsideToRight.beginPath();
lightInsideToRight.moveTo(xTopLeft, yTopLeft + insideYDepth);
lightInsideToRight.lineTo(xBottomRight + insideXDepth - insideXDepth * 0.5, yTopLeft + insideYDepth);

lightInsideToRight.stroke();

var lightHeight = h * 0.09 ;
var lightWall = c.getContext('2d');
var opacity = 0; //55% visible
var lightWallDepth = cubeWidth * 0.10;


lightWall.beginPath();
lightWall.moveTo(xBottomLeft,yBottomLeft);
lightWall.lineTo(xBottomLeft - lightWallDepth, yBottomLeft - lightHeight);
lightWall.lineTo(xBottomRight + lightWallDepth, yBottomLeft - lightHeight);
lightWall.lineTo(xBottomRight,yBottomRight);
lightWall.lineTo(xBottomLeft,yBottomLeft);


lightWall.strokeStyle = 'rgba(224,224,224,'+opacity+')';
lightWall.stroke();

var grad = lightWall.createLinearGradient(xBottomLeft,yBottomLeft,xBottomLeft,yBottomLeft - lightHeight);
grad.addColorStop(0,"#15527e");

grad.addColorStop(1,'rgba(0,238,245,'+opacity+')');

lightWall.fillStyle = grad;

if(off){
	
	
}

else{
	lightWall.fill();
}

//lightWall.fillRect(xBottomLeft,yBottomLeft - lightHeight,cubeWidth,lightHeight);


}


function drawThirdRectLight(off){
	//cube ratio to stand
var cubeToStandPercentage = 0.18;

//Cube width 
var cubeToStandWidth = standWidth * cubeToStandPercentage;
var cubeWidth = standWidth - cubeToStandWidth * 2;


//Cube Height
var cubeHeight = cubeWidth;
var cubeToStandHeight = (standHeight - (standHeight -(standYFront - standYBack))) * 0.40;

//Cube Depth
var cubeDepth = cubeWidth * 0.06;

var yDiff = yBottomLeft - yTopLeft;


//Second Light--------------------------------------------------------------------------------
//second light x coordinates

var x = 0.07 * standWidth;

var xTopRight = (standGap * 3 + standWidth * 3 - cubeDepth) - cubeToStandWidth - x;
var xTopLeft = standGap * 3 + standWidth * 2 + cubeToStandWidth - cubeDepth - x ;

var xBottomLeft = standGap * 3 + standWidth * 2 + cubeToStandWidth - x ;
var xBottomRight = (standGap * 3 + standWidth * 3) - cubeToStandWidth - x;



//Second Light Y coordinates

//Left	
var yBottomLeft = standHeight - cubeToStandHeight ;
var yTopLeft = (standHeight -(standYFront - standYBack)) + cubeToStandHeight ;

//Right
var yBottomRight =  standHeight - cubeToStandHeight ;
var yTopRight = (standHeight -(standYFront - standYBack)) + cubeToStandHeight;


var insideYDepth = yDiff * 0.6;
var insideXDepth = cubeWidth * 0.08;

var cubeBottom = c.getContext('2d');
cubeBottom.beginPath();
cubeBottom.moveTo(xBottomLeft, yBottomLeft);
cubeBottom.lineTo(xBottomRight , yBottomRight );
cubeBottom.lineTo(xTopRight, yTopRight);
cubeBottom.lineTo(xTopLeft , yTopLeft);
cubeBottom.lineTo(xBottomLeft , yBottomLeft);
cubeBottom.strokeStyle = strokeColor;
cubeBottom.stroke();

cubeBottom.fillStyle = wallColor;
var gradCube = cubeBottom.createRadialGradient(rightWallWidthMid + ((w-rightWallWidthMid)*3.1),rightWallHeightMid,10,rightWallWidthMid + ((w-rightWallWidthMid)*0.6),rightWallHeightMid,rightWallHeightMid);
gradCube.addColorStop(0,gradFirstColor);
gradCube.addColorStop(1,gradSecondColor);
//cubeBottom.fillStyle=gradCube;
cubeBottom.fillStyle="brown";
//cubeBottom.fill();

var lightInside = c.getContext('2d');
lightInside.beginPath();
lightInside.moveTo(xTopRight, yTopRight);
lightInside.lineTo(xTopRight, yTopRight - insideYDepth);
lightInside.lineTo(xBottomRight - insideXDepth,yBottomRight);

lightInside.stroke();


var lightInsideToRight = c.getContext('2d');
lightInsideToRight.beginPath();
lightInsideToRight.moveTo(xTopRight, yTopRight - insideYDepth);
lightInsideToRight.lineTo(xBottomLeft - insideXDepth + insideXDepth * 0.5, yTopRight - insideYDepth);
lightInsideToRight.stroke();

var lightHeight = h * 0.09 ;
var lightWall = c.getContext('2d');
var opacity = 0; //55% visible
var lightWallDepth = cubeWidth * 0.10;


lightWall.beginPath();
lightWall.moveTo(xBottomLeft,yBottomLeft);
lightWall.lineTo(xBottomLeft - lightWallDepth, yBottomLeft - lightHeight);
lightWall.lineTo(xBottomRight + lightWallDepth, yBottomLeft - lightHeight);
lightWall.lineTo(xBottomRight,yBottomRight);
lightWall.lineTo(xBottomLeft,yBottomLeft);


lightWall.strokeStyle = 'rgba(224,224,224,'+opacity+')';
lightWall.stroke();

var grad = lightWall.createLinearGradient(xBottomLeft,yBottomLeft,xBottomLeft,yBottomLeft - lightHeight);
grad.addColorStop(0,"#15527e");

grad.addColorStop(1,'rgba(0,238,245,'+opacity+')');

lightWall.fillStyle = grad;

if(off){
	
	
}

else{
	lightWall.fill();
}


}

function drawFourthRectLight(off){
	//cube ratio to stand
var cubeToStandPercentage = 0.30;

//Cube width 
var cubeToStandWidth = standWidth * cubeToStandPercentage;
var cubeWidth = standWidth - cubeToStandWidth * 2;
fourthRectWidth = cubeWidth;

//Cube Height
var cubeHeight = cubeWidth;
var cubeToStandHeight = (standHeight - (standHeight -(standYFront - standYBack))) * 0.40;

//Cube Depth
var cubeDepth = cubeWidth * 0.23;

var yDiff = yBottomLeft - yTopLeft;


//Second Light--------------------------------------------------------------------------------
//second light x coordinates
var x = 0.05 * standWidth;


var xTopRight = (standGap * 4 + standWidth * 3 - cubeDepth) - cubeToStandWidth + standDepth - x ;
var xTopLeft = standGap * 4 + standWidth * 3 + cubeToStandWidth - cubeDepth + standDepth - x;

var xBottomLeft = standGap * 4 + standWidth * 3 + cubeToStandWidth + standDepth - x;
var xBottomRight = (standGap * 4 + standWidth * 3) - cubeToStandWidth + standDepth - x;



//Second Light Y coordinates

//Left	
var yBottomLeft = standHeight - cubeToStandHeight ;
var yTopLeft = (standHeight -(standYFront - standYBack)) + cubeToStandHeight ;

//Right
var yBottomRight =  standHeight - cubeToStandHeight ;
var yTopRight = (standHeight -(standYFront - standYBack)) + cubeToStandHeight;


var insideYDepth = yDiff * 0.6;
var insideXDepth = cubeWidth * 0.08;

var cubeBottom = c.getContext('2d');
cubeBottom.beginPath();
cubeBottom.moveTo(xBottomLeft, yBottomLeft);
cubeBottom.lineTo(xBottomRight , yBottomRight );
cubeBottom.lineTo(xTopRight, yTopRight);
cubeBottom.lineTo(xTopLeft , yTopLeft);
cubeBottom.lineTo(xBottomLeft , yBottomLeft);
cubeBottom.strokeStyle = strokeColor;
cubeBottom.stroke();

cubeBottom.fillStyle = wallColor;
var gradCube = cubeBottom.createRadialGradient(rightWallWidthMid + ((w-rightWallWidthMid)*3.1),rightWallHeightMid,10,rightWallWidthMid + ((w-rightWallWidthMid)*0.6),rightWallHeightMid,rightWallHeightMid);
gradCube.addColorStop(0,gradFirstColor);
gradCube.addColorStop(1,gradSecondColor);
//cubeBottom.fillStyle=gradCube;
cubeBottom.fillStyle="brown";
//cubeBottom.fill();
cubeBottom.closePath();

//MIGHT BE USELESS????
var lightInside = c.getContext('2d');
lightInside.beginPath();
lightInside.moveTo(xTopLeft, yTopRight);
lightInside.lineTo(xTopLeft, yTopRight - insideYDepth);
lightInside.lineTo(xBottomLeft - insideXDepth * 1.3,yBottomRight);

lightInside.stroke();


var lightInsideToRight = c.getContext('2d');
lightInsideToRight.beginPath();
lightInsideToRight.moveTo(xTopRight, yTopRight - insideYDepth);
lightInsideToRight.lineTo(xBottomLeft - insideXDepth + insideXDepth * 0.5, yTopRight - insideYDepth);

lightInsideToRight.stroke();

var lightHeight = h * 0.09 ;
var lightWall = c.getContext('2d');
var opacity = 0; //55% visible
var lightWallDepth = cubeWidth * 0.10;


lightWall.beginPath();
lightWall.moveTo(xBottomLeft,yBottomLeft);
lightWall.lineTo(xBottomLeft + lightWallDepth, yBottomLeft - lightHeight);
lightWall.lineTo(xBottomRight - lightWallDepth, yBottomLeft - lightHeight);
lightWall.lineTo(xBottomRight,yBottomRight);
lightWall.lineTo(xBottomLeft,yBottomLeft);


lightWall.strokeStyle = 'rgba(224,224,224,'+opacity+')';
lightWall.stroke();

var grad = lightWall.createLinearGradient(xBottomLeft,yBottomLeft,xBottomLeft,yBottomLeft - lightHeight);
grad.addColorStop(0,"#15527e");

grad.addColorStop(1,'rgba(0,238,245,'+opacity+')');

lightWall.fillStyle = grad;
if(off){
	
	
}

else{
	lightWall.fill();
}


}


// CUBE ANIMATION UP -----------------------------------	
function cubeAnimateUp(){
   
   var c = document.getElementById("roomCanvas");
   var context = c.getContext('2d');
   //context.clearRect(0,0,c.width,c.height);
   drawStage();
   drawStands(true,1);
   drawFirstRectLight(false);
   drawRectLight(true);
   drawThirdRectLight(true);
   drawFourthRectLight(true);
   drawFrame(false,0 ,false,0 ,false, 0);
   drawSecondFrame(false,0 ,false,0 ,false, 0);
   drawPhone(false,0,false,0,false,0);
		
		
   //Float Up
   if(y < h*0.11){
    y = y + 1.4;
	drawCube(14,false,y);
	newY = y;
	cubeGlobalID = requestAnimationFrame(cubeAnimateUp);
   }
   
   //After certain height stop and do flying animation
   else{
   fixY = y;
   
   //Back and Forth from 0 to 1.4 percent
    if(yRotate <= 0){
	
	inCeiling = true;
	
	}
	
	if(yRotate >= h*0.014){
	inCeiling = false;
	}
	
	if(inCeiling){
	
	yRotate = yRotate + 0.15;
	
	}
	
	else{
	
	yRotate = yRotate - 0.15;
	
	}
	newY = fixY - yRotate;
	drawCube(14,false,fixY - yRotate);
	cubeGlobalID = requestAnimationFrame(cubeAnimateUp);
 
  
   }
   
   
}

//CUBE ANIMATION DOWN -----------------------------------
function cubeAnimateDown(){
  var c = document.getElementById("roomCanvas");
   var context = c.getContext('2d');
   //context.clearRect(0,0,c.width,c.height);
   drawStage();
   drawStands(false,0);
    drawFirstRectLight(true);
   drawRectLight(true);
   drawThirdRectLight(true);
   drawFourthRectLight(true);
   drawFrame(false,0 ,false,0 ,false, 0);
   drawSecondFrame(false,0 ,false,0 ,false, 0);
   drawPhone(false,0,false,0,false,0);
   //Float Up
   if(newY == 0 ){
	drawCube(14,false,0);
   }
   else{
     
	 var t = newY - 1.4;
	 if (t > 0 || t == 0){
	 
	 newY = newY - 1.4;
	
	 }
	 
	 else if (t > 0 && t < 1.4){
	 
	  newY = newY - 0.15;
	 }
	 
	 
	 drawCube(14,false,newY);
	 globalID = requestAnimationFrame(cubeAnimateDown);
   }

}


function resumeAnimateUp(){
  
   
   var c = document.getElementById("roomCanvas");
   var context = c.getContext('2d');
   //context.clearRect(0,0,c.width,c.height);
   drawStage();
   drawStands(true,2);
   drawFirstRectLight(true);
   drawRectLight(false);
   drawThirdRectLight(true);
   drawFourthRectLight(true);
    drawCube(14,true,0);
   drawSecondFrame(false,0 ,false,0 ,false, 0);
   drawPhone(false,0,false,0,false,0);
   
   
   amountToMinus = frameOriDepth / 10;
   
   //Straigthen frame
   if(depthCounter <= 10){
	   depthCounter = depthCounter + 1;
	   
	   
	   drawFrame(false,amountToMinus * depthCounter ,false,amountToMinus * depthCounter *0.90 ,false, 0);
	   
	   
	   
		firstFrameGlobalID = requestAnimationFrame(resumeAnimateUp);
   }
   
   //Straight already
   else{
	   
	   
	   //Float Up
   if(yFrame < h*0.11){
    yFrame = yFrame + 1.4;
	
	
	  drawFrame(false,amountToMinus * depthCounter ,false,amountToMinus * depthCounter * 0.90 ,false, yFrame);
	  
	   
	
	newFrameY = yFrame;
	firstFrameGlobalID = requestAnimationFrame(resumeAnimateUp);
		
   }
   
   //After certain height stop and do flying animation
   else{
   fixFrameY = yFrame;
   
   //Back and Forth from 0 to 1.4 percent
    if(yFrameRotate <= 0){
	
	inFrameCeiling = true;
	
	}
	
	if(yFrameRotate >= h*0.014){
	inFrameCeiling = false;
	}
	
	if(inFrameCeiling){
	
	yFrameRotate = yFrameRotate + 0.15;
	
	}
	
	else{
	
	yFrameRotate = yFrameRotate - 0.15;
	
	}
	newFrameY = fixFrameY - yFrameRotate;
	
	   drawFrame(false,amountToMinus * depthCounter ,false,amountToMinus * depthCounter * 0.90 ,false, fixFrameY - yFrameRotate);
	   
	   
	   
	
	
	firstFrameGlobalID = requestAnimationFrame(resumeAnimateUp);
 
  
   }
   
   
	   
   }
   
 
}

function frameAnimateDown(){
  var c = document.getElementById("roomCanvas");
   var context = c.getContext('2d');
   context.clearRect(0,0,c.width,c.height);
   drawStage();
   drawStands(false,0);
    drawFirstRectLight(true);
   drawRectLight(true);
   drawThirdRectLight(true);
   drawFourthRectLight(true);
    drawCube(14,true,0);
   drawSecondFrame(false,0 ,false,0 ,false, 0);
   drawPhone(false,0,false,0,false,0);
   
   
   //Bottom
   if(newFrameY > 0 && newFrameY < 1.4 ){
	
	 if(depthCounter > 0){
	   depthCounter = depthCounter - 1;
	   
	   
		    drawFrame(false,amountToMinus * depthCounter ,false,amountToMinus * depthCounter *0.90 ,false, 0);
	   
	  
	   
		globalID = requestAnimationFrame(frameAnimateDown);
    }
	else{
			 
		     drawFrame(false,0,false,0,false, 0);
	 
		
		
	}
   
   
   }
   else{
     
	 var t = newFrameY - 1.4;
	 if (t > 0 || t == 0){
	 
	 newFrameY = newFrameY - 1.4;
	
	 }
	 
	 else if (t > 0 && t < 1.4){
	 
	  newFrameY = newFrameY - 0.15;
	 }
	 
		     drawFrame(false,amountToMinus * depthCounter ,false,amountToMinus * depthCounter * 0.90 ,false, newFrameY);
	   
	
	 
	 globalID = requestAnimationFrame(frameAnimateDown);
   }

}


function secondFrameAnimateUp(){
  
   
   var c = document.getElementById("roomCanvas");
   var context = c.getContext('2d');
  // context.clearRect(0,0,c.width,c.height);
   drawStage();
   drawStands(true,3);
   drawFirstRectLight(true);
   drawRectLight(true);
   drawThirdRectLight(false);
   drawFourthRectLight(true);
    drawCube(14,true,0);
   drawFrame(false,0 ,false,0 ,false, 0);
   drawPhone(false,0,false,0,false,0);
   
   
   secondFrameAmountToMinus = secondFrameOriDepth / 10;
   
   //Straigthen frame
   if(secondFrameDepthCounter <= 10){
	   secondFrameDepthCounter = secondFrameDepthCounter + 1;
	   
	  
		   drawSecondFrame(false,secondFrameAmountToMinus * secondFrameDepthCounter ,false,secondFrameAmountToMinus * secondFrameDepthCounter *0.90 ,false, 0);
	   
	   
		secondFrameGlobalID = requestAnimationFrame(secondFrameAnimateUp);
   }
   
   //Straight already
   else{
	   
	   
	   //Float Up
   if(ySecondFrame < h*0.11){
    ySecondFrame = ySecondFrame + 1.4;
	
		   drawSecondFrame(false,secondFrameAmountToMinus * secondFrameDepthCounter ,false,secondFrameAmountToMinus * secondFrameDepthCounter *0.90 ,false, ySecondFrame);
	   
	newSecondFrameY = ySecondFrame;
	secondFrameGlobalID = requestAnimationFrame(secondFrameAnimateUp);
		
   }
   
   //After certain height stop and do flying animation
   else{
   fixSecondFrameY = ySecondFrame;
   
   //Back and Forth from 0 to 1.4 percent
    if(ySecondFrameRotate <= 0){
	
	inSecondFrameCeiling = true;
	
	}
	
	if(ySecondFrameRotate >= h*0.014){
	inSecondFrameCeiling = false;
	}
	
	if(inSecondFrameCeiling){
	
	ySecondFrameRotate = ySecondFrameRotate + 0.15;
	
	}
	
	else{
	
	ySecondFrameRotate = ySecondFrameRotate - 0.15;
	
	}
	newSecondFrameY = fixSecondFrameY - ySecondFrameRotate;
	
		   drawSecondFrame(false,secondFrameAmountToMinus * secondFrameDepthCounter ,false,secondFrameAmountToMinus * secondFrameDepthCounter *0.90 ,false, fixSecondFrameY - ySecondFrameRotate);
	   
	   
	secondFrameGlobalID = requestAnimationFrame(secondFrameAnimateUp);
 
  
   }
   
   
	   
   }
   
 
}

function secondFrameAnimateDown(){
  var c = document.getElementById("roomCanvas");
   var context = c.getContext('2d');
  // context.clearRect(0,0,c.width,c.height);
   drawStage();
   drawStands(false,0);
    drawFirstRectLight(true);
   drawRectLight(true);
   drawThirdRectLight(true);
   drawFourthRectLight(true);
    drawCube(14,true,0);
   drawFrame(false,0 ,false,0 ,false, 0);
   drawPhone(false,0,false,0,false,0);
   
   //Bottom
   if(newSecondFrameY > 0 && newSecondFrameY < 1.4 ){
	
	 if(secondFrameDepthCounter > 0){
	   secondFrameDepthCounter = secondFrameDepthCounter - 1;
	   
	  
		    drawSecondFrame(false,secondFrameAmountToMinus * secondFrameDepthCounter ,false,secondFrameAmountToMinus * secondFrameDepthCounter *0.90 ,false, 0);
		   
	   
	  
	   
		globalID = requestAnimationFrame(secondFrameAnimateDown);
    }
	else{
			 
		   
		    drawSecondFrame(false,0,false,0,false, 0);
		   
	   
		
		
	}
   
   
   }
   else{
     
	 var t = newSecondFrameY - 1.4;
	 if (t > 0 || t == 0){
	 
	 newSecondFrameY = newSecondFrameY - 1.4;
	
	 }
	 
	 else if (t > 0 && t < 1.4){
	 
	  newSecondFrameY = newSecondFrameY - 0.15;
	 }
	
		   
		    drawSecondFrame(false,secondFrameAmountToMinus * secondFrameDepthCounter ,false,secondFrameAmountToMinus * secondFrameDepthCounter *0.90 ,false, newSecondFrameY);
		   
	globalID = requestAnimationFrame(secondFrameAnimateDown);
   }

}

function phoneAnimateUp(){
  
   
   var c = document.getElementById("roomCanvas");
   var context = c.getContext('2d');
   //context.clearRect(0,0,c.width,c.height);
   drawStage();
   drawStands(true,4);
    drawFirstRectLight(true);
   drawRectLight(true);
   drawThirdRectLight(true);
   drawFourthRectLight(false);
   drawCube(14,true,0);
   drawFrame(false,0 ,false,0 ,false, 0);
   drawSecondFrame(false,0 ,false,0 ,false, 0);
   
   phoneAmountToMinus = phoneOriDepth / 10;
   //Straigthen frame
   if(phoneDepthCounter <= 10){
	   phoneDepthCounter = phoneDepthCounter + 1;
	   
	   drawPhone(false,phoneAmountToMinus * phoneDepthCounter ,false,phoneAmountToMinus * phoneDepthCounter *0.90 ,false, phoneYFrame);
	   
	   
	 
		phoneGlobalID = requestAnimationFrame(phoneAnimateUp);
   }
   
   //Straight already
   else{
	   
	   
	   //Float Up
   if(phoneYFrame < h*0.11){
    phoneYFrame = phoneYFrame + 1.4;
	
	 drawPhone(false,phoneAmountToMinus * phoneDepthCounter ,false,phoneAmountToMinus * phoneDepthCounter *0.90 ,false, phoneYFrame);
	  
	newPhoneY = phoneYFrame;
	phoneGlobalID = requestAnimationFrame(phoneAnimateUp);
		
   }
   
   //After certain height stop and do flying animation
   else{
   fixPhoneY = phoneYFrame;
   
   //Back and Forth from 0 to 1.4 percent
    if(yPhoneRotate <= 0){
	
	inPhoneCeiling = true;
	
	}
	
	if(yPhoneRotate >= h*0.014){
	inPhoneCeiling = false;
	}
	
	if(inPhoneCeiling){
	
	yPhoneRotate = yPhoneRotate + 0.15;
	
	}
	
	else{
	
	yPhoneRotate = yPhoneRotate - 0.15;
	
	}
	newPhoneY = fixPhoneY - yPhoneRotate;
	
	   drawPhone(false,phoneAmountToMinus * phoneDepthCounter ,false,phoneAmountToMinus * phoneDepthCounter *0.90 ,false, fixPhoneY - yPhoneRotate);
	   
	   
	
	
	phoneGlobalID = requestAnimationFrame(phoneAnimateUp);
  
   }
   
	   
   }
   
 
}


function phoneAnimateDown(){
  var c = document.getElementById("roomCanvas");
   var context = c.getContext('2d');
   context.clearRect(0,0,c.width,c.height);
   drawStage();
   drawStands(false,0);
    drawFirstRectLight(true);
   drawRectLight(true);
   drawThirdRectLight(true);
   drawFourthRectLight(true);
    drawCube(14,true,0);
   drawFrame(false,0 ,false,0 ,false, 0);
   drawSecondFrame(false,0 ,false,0 ,false, 0);
   
   //Bottom
   if(newPhoneY > 0 && newPhoneY < 1.4 ){
	
	 if(phoneDepthCounter > 0){
	   phoneDepthCounter = phoneDepthCounter - 1;
	   
	   
		    drawPhone(false,phoneAmountToMinus * phoneDepthCounter ,false,phoneAmountToMinus * phoneDepthCounter *0.90 ,false, 0);
		   
	   
	  
	   
		globalID = requestAnimationFrame(phoneAnimateDown);
    }
	else{
			 
		   
		    drawPhone(false,0,false,0,false, 0);
		   
		
	}
   
   
   }
   else{
     
	 var t = newPhoneY - 1.4;
	 if (t > 0 || t == 0){
	 
	 newPhoneY = newPhoneY - 1.4;
	
	 }
	 
	 else if (t > 0 && t < 1.4){
	 
	  newPhoneY = newPhoneY - 0.15;
	 }
	 
		   
		    drawPhone(false,phoneAmountToMinus * phoneDepthCounter ,false,phoneAmountToMinus * phoneDepthCounter *0.90 ,false, newPhoneY);
		   
	 globalID = requestAnimationFrame(phoneAnimateDown);
   }

}


function getMousePos(c,evt){
  var area = c.getBoundingClientRect();
  return{
   x: Math.round((evt.clientX-area.left)/(area.right-area.left) * c.width),
   y: Math.round((evt.clientY-area.top)/(area.bottom-area.top) * c.height)
  };
}





