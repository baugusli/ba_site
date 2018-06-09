var windowsHeight = window.innerHeight;
var windowsWidth = window.innerWidth;
// h = window.innerHeight > 700 ? 700 : (window.innerHeight || 500),
var w = windowsWidth;
var h = windowsHeight > 800 ? windowsHeight * 0.5 : windowsHeight * 0.67;
var radius = 5.25;
var links = [];
var simulate = true;
var zoomToAdd = true;
    colorRange = ['#DAE3E8', '#6BA9CB', '#3B83AA', '#1E668C', '#064E75', '#024061'];
    color = d3.scale.quantize().domain([10000, 7250]).range(colorRange)

var brainIconPath = "assets/images/brain-icons/"
var brainIdMapping = {
  // Education
  0: {
      iconPath:'icons8-mortarboard-90.png',
      contentEleId: 'sub-content-school'
     },
  // Language
  1: {
      iconPath: 'icons8-language-filled-500.png',
      contentEleId: 'sub-content-language'
     },
  // Games
  2: {
      iconPath: 'icons8-joystick-filled-100.png',
      contentEleId: 'sub-content-game'
     },
  // Sports
  3: {
      iconPath: 'icons8-weightlifting-filled-100.png',
      contentEleId: 'sub-content-sport'
     },
  // Movie/ tv show
  4: {
      iconPath: 'icons8-movie-96.png',
      contentEleId: 'sub-content-movie'
     },
  // data engineer / data warehouse
  5: {
      iconPath: 'icons8-database-administrator-90.png',
      contentEleId: 'sub-content-data_engineer'
     },
  // business intelligence.. raw data useseless to information that can predict the future
  6: {
      iconPath: 'icons8-combo-chart-filled-100.png',
      contentEleId: 'sub-content-bi'
     },
  // About Me
  7: {
      iconPath: 'icons8-user-96.png',
      contentEleId: 'sub-content-about'
     },
  // Food
  8: {
      iconPath: 'icons8-dining-room-filled-100.png',
      contentEleId: 'sub-content-food'
     },
  // Learning
  9: {
      iconPath: 'icons8-mind-map-52.png',
      contentEleId: 'sub-content-learning'
     }
}
var numVertices = 24;
var vertices = d3.range(numVertices).map(function(i) {
    angle = radius * (i + 10);
    return {x: angle*Math.cos(angle)+(w/2) + 100, y: angle*Math.sin(angle)+(h/2) + 50};
});

var d3_geom_voronoi = d3.geom.voronoi().x(function(d) { return d.x; }).y(function(d) { return d.y; })
var prevEventScale = 1;
// ZOOM!!
var zoom = d3.behavior.zoom().on("zoom", function(d,i) {
    if (zoomToAdd){
      if (d3.event.scale > prevEventScale) {
          angle = radius * vertices.length;
          vertices.push({x: angle*Math.cos(angle)+(w/2), y: angle*Math.sin(angle)+(h/2)})
      } else if (vertices.length > 2 && d3.event.scale != prevEventScale) {
          vertices.pop();
      }
      force.nodes(vertices).start()
    } else {
      if (d3.event.scale > prevEventScale) {
        radius += .01
      } else {
        radius -= .01
      }
      vertices.forEach(function(d, i) {
        angle = radius * (i+10);
        vertices[i] = {x: angle*Math.cos(angle)+(w/2), y: angle*Math.sin(angle)+(h/2)};
      });
      force.nodes(vertices).start()
    }
    prevEventScale = d3.event.scale;
});

// Keep number of vertices but run the force animation
var zoomTest = d3.behavior.zoom().on("zoom", function(d, i) {
  force.nodes(vertices).start();
  prevEventScale = d3.event.scale;
});

var svg = d3.select("#brain_canvas")
        .append("svg")
        .attr("width", w)
        .attr("height", h)

var force = d3.layout.force()
        .charge(-300)
        .size([w, h])
        .on("tick", update);

force.nodes(vertices).start();

var circle = svg.selectAll("circle");
var path = svg.selectAll("path");
var link = svg.selectAll("line");
var img = svg.selectAll("image");
var imgW = 30;
var imgH = 30;

var moreDetail = function(d, i) {
  var subContentId = brainIdMapping[i].contentEleId;
  if (subContentId) scrollToContent('#' + subContentId);
  resetShapeScale(this);
};

var percentageIncrease = 40;

var getScaleTransformString = function(currXPos, currYPos, grow) {
  var percentageDivided = (percentageIncrease / 100)
  var scale = (grow) ? 1 + percentageDivided : 1 - percentageDivided;
  var scaleStr = 'scale(' + scale + ')';

  var scaledXPos = currXPos * percentageDivided;
  var scaledYPos = currYPos * percentageDivided;

  if (grow) {
    scaledXPos = -scaledXPos;
    scaledYPos = -scaledYPos;
  }

  var translateStr = 'translate(' + scaledXPos + ',' + scaledYPos + ')';

  var transformStr = translateStr + ' ' + scaleStr;
  return transformStr;
};  


var maxBrainId = 9;
var maxBrainCoord;
var resetScalingTransformation = function() {
  path[0].forEach(function(p, i) {
    d3.select(p).attr('transform', '');
  });
};

function generateThoughtPath(offset, dimension) {
   //////
  var thoughtPath = [];
  var width = dimension.width || 59;
  var height = dimension.height || 30;
  var startingX = maxBrainCoord.maxPoint.x + offset[0];
  var startingY = maxBrainCoord.maxPoint.y + offset[1];

  // thoughtPath.point = maxBrainCoord.maxPoint;
  thoughtPath.push([startingX, startingY]);
  thoughtPath.push([startingX + width * 0.026, startingY - height * 0.286]);
  thoughtPath.push([startingX + width * 0.195, startingY - height * 0.536]);
  thoughtPath.push([startingX + width * 0.485, startingY - height * 0.667]);
  thoughtPath.push([startingX + width * 0.805, startingY - height * 0.536]);
  thoughtPath.push([startingX + width * 0.974, startingY - height * 0.286]);
  thoughtPath.push([startingX + width * 1, startingY]);
  // middle
  thoughtPath.push([startingX + width * 0.974, startingY + height * 0.24]);
  thoughtPath.push([startingX + width * 0.814, startingY + height * 0.6]);
  thoughtPath.push([startingX + width * 0.5, startingY + height * 0.75]);
  thoughtPath.push([startingX + width * 0.186, startingY + height * 0.6]);
  thoughtPath.push([startingX + width * 0.026, startingY + height * 0.24]);
  //thoughtPath.push([startingX, startingY]);

  return thoughtPath;
}

function drawPath(thoughtPath) {
   svg.append("path")
    .attr("class", "dream-path")
    .attr("d", function(d, i) { 
      var data = "M" + thoughtPath.join("L") + "Z"; 
      return data; 
    })
    .transition().duration(150)
    .style("fill", "none")
    .style("stroke-width", "3px")
    .style("stroke", "#144A56");
}

function drawThoughts(id) {
  var brainContentId = brainIdMapping[id].contentEleId;
  if (brainContentId) {
    var smallThoughtDimension = {width: 59, height: 30};
    var offset = [-4, 0];
    var firstThought = generateThoughtPath(offset, smallThoughtDimension);

    var secondOffset = [82, -30];
    var secondThought = generateThoughtPath(secondOffset, smallThoughtDimension);

    var contentDimension = {width: 400, height: 390};
    var contentOffset = secondOffset.map((coord, i) => (i === 0) ? coord + 30 : coord + 190);
    var content = generateThoughtPath(contentOffset, contentDimension);

    // Content
    var contentPadding = 10;
    var leftCoord = maxBrainCoord.maxPoint.x + contentOffset[0] + contentPadding;
    var topCoord = maxBrainCoord.maxPoint.y - contentDimension.height * 0.19;
    d3.select("#" + brainContentId)
      .style("left", leftCoord + 'px')
      .style("top", topCoord + 'px')
      .style("width", contentDimension.width + 'px')
      .style("height", contentDimension.height + 'px')
      .style("display", "block");

    d3.selectAll(".dream-path").remove();
    drawPath(firstThought);
    drawPath(secondThought);
    drawPath(content);
  }
}

var highlightPart = function(d, i) {
  resetScalingTransformation();
  if (i <= maxBrainId) {
    var xPos = d.point.x;
    var yPos = d.point.y;
    d3.select(this)
        .attr('transform', getScaleTransformString(xPos, yPos, true));
    this.parentNode.appendChild(this);

    var hoveredImage = img[0][i];
    hoveredImage.parentNode.appendChild(hoveredImage);

    document.body.style.cursor = "pointer";
  }
  
}

var highlightImage = function(d, i) {
  if (i <= maxBrainId) {
    var xPos = d.point.x;
    var yPos = d.point.y;
    var hoveredPath = path[0][i];
    d3.select(hoveredPath).attr('transform', getScaleTransformString(xPos, yPos, true));
    document.body.style.cursor = "pointer";
  }
}

var unhighlightPart = function() {
  resetShapeScale(this);
}

function resetShapeScale(target) {
  d3.select(target).attr('transform', '');
  document.body.style.cursor = "";
}

var drawImg = function() {
    img = img.data(d3_geom_voronoi(vertices));
    img.enter().append("image")
      .on("click", moreDetail)
      .on("mouseover", highlightImage)
      .transition().duration(1000);

    img
      .attr("xlink:href", function(d, i) {
        if (i <= maxBrainId) { 
          var imgPath = "";
          //var excludeColor = colorRange[colorRange.length - 1];
          var excludeColor = colorRange[0];
          if (color(d3.geom.polygon(d).area()) !== excludeColor) {
            imgPath = brainIconPath + brainIdMapping[i].iconPath;
          }
          return imgPath;
        }
      })
      .attr("x", function(d, i) { if (i <= maxBrainId) { return d.point.x - (imgW / 2);} })
      .attr("y", function(d, i) { if (i <= maxBrainId) { return d.point.y - (imgH / 2);} })
      .attr("width", imgW)
      .attr("height", imgH);
    img.exit().remove();
};

function setMaxBrainPath(data) {
  maxBrainCoord = data;

  var topRightBrainCoord = {x: 0, y: 0};
  maxBrainCoord.forEach(function(d, index) {
    if (index < maxBrainCoord.length - 1) {
      if (d[0] > topRightBrainCoord.x || index === 0) {
        topRightBrainCoord.x = d[0];
      }

      if (d[1] < topRightBrainCoord.y || index === 0) {
        topRightBrainCoord.y = d[1];
      }
    }
  });
  maxBrainCoord.maxPoint = topRightBrainCoord;
}


function update(e) {
    var voronoiVertices = d3_geom_voronoi(vertices);
    voronoiVertices = voronoiVertices.slice(0, maxBrainId + 1);
    path = path.data(voronoiVertices);
    path.enter().append("path")
        .style("fill", function(d, i) { return color(0) });
    path.attr("d", function(d, i) { 
          if (i === maxBrainId) {
            setMaxBrainPath(d);
          }
          var data = "M" + d.join("L") + "Z"; 
          return data; 
          
        })
        .on("click", moreDetail)
        .on("mouseover", highlightPart)
        .on("mouseout", unhighlightPart)
        .transition().duration(150).style("fill", function(d, i) { return color(d3.geom.polygon(d).area()) });
    path.exit().remove();
    
    drawImg();

    var clickMePath = document.querySelector('#click-me-path');
    if (clickMePath) clickMePath.remove();
    svg.append("path")
      .attr("id", "click-me-path")
      .attr("d", function(d, i) { 
        // TODO: MAGIC NUMBER!!
        // Not actual width and height..
        var brainWidth = 330;
        var brainHeight = 140;
        var startCoord = (maxBrainCoord.maxPoint.x - brainWidth) + "," + (maxBrainCoord.maxPoint.y + brainHeight);

        var data = "M" + startCoord
        + " C" + (maxBrainCoord.maxPoint.x - brainWidth * 0.7) + "," + (maxBrainCoord.maxPoint.y - brainHeight * 0.82)
        + " " + (maxBrainCoord.maxPoint.x) + "," + (maxBrainCoord.maxPoint.y + brainHeight * 0.9)
        + " " + maxBrainCoord.maxPoint.x + "," + maxBrainCoord.maxPoint.y;
        return data; 
      })
      .style("fill", "none")
      .style("stroke-width", "3px")
      .style("stroke", "#144A56")
      .style("display", "none");

    var pickMePath = document.querySelector('#pick-me-brain');
    if (pickMePath) pickMePath.remove();
    svg
      .append("text")
      .attr("id", "pick-me-brain")
      .attr("class", "main-font")
      .append("textPath")
      .attr('xlink:xlink:href', '#click-me-path')
      .text("Pick My Brain");    

    if(!simulate) force.stop()
}

function scrollToContent(contentSelector) {
  var target = $(contentSelector);
  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    if (target.length) {
      // Only prevent default if animation is actually gonna happen
      event.preventDefault();
      $('html, body').animate({
        scrollTop: target.offset().top - 70
      }, 1000, function() {
        // Callback after animation
        // Must change focus!
        var $target = $(target);
        $target.focus();
        if ($target.is(":focus")) { // Checking if the target was focused
          return false;
        } else {
          $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
          $target.focus(); // Set focus again
        };
      });
    }
}

var brainCanvasId = '#brain_canvas';
var brainMenuNavigationId = '#brain-navigation-menu';

var scrollToTop = '#scroll-to-top, #ba-title';
$(brainCanvasId).onScreen({
   doIn: function() {
   $(brainMenuNavigationId).css('display', 'none');
   // $(scrollToTop).css('display', 'none')
   },
   doOut:function() {
    $(brainMenuNavigationId).css('display', 'block');
    // $(scrollToTop).css('display', 'block')
   },
   tolerance: 0
});

//go to top
$(scrollToTop).click(function(event) {
  scrollToContent('#brain_canvas');
});

$('.brain-navigation-menu-icon, #contact-me-btn').click(function() {
  var subContentId = $(this).attr('sub-content-id');
  scrollToContent('#' + subContentId);
});