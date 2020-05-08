/**
 * custom-scripting.js
 *  
 * Cordova NativeController Instance plugin
 * Copyright (c) Hyunchul Kim 2012
 *
 */

$.fn.quickChange = function(handler) {
	return this.each(function() {
		var interval;
		var self = this;
		self.qcindex = self.selectedIndex;
		function handleChange() {
			if (self.selectedIndex != self.qcindex) {
				self.qcindex = self.selectedIndex;
				handler.apply(self);
				self.qcindex = self.selectedIndex;
			}
		}
		$(self).focus(function() {
			interval = setInterval(handleChange, 100);
		}).blur(function() { 
			window.clearInterval(interval); 
		}).change(handleChange); //also wire the change event in case the interval technique isn't supported (chrome on android)
	});
};
$.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    })
}

var lastLifeInfoUpdateDate = 0; // 페이지 이동시 페이지 내용 초기화

var NativeController = {
     setInitializeView: function(types, success, fail) {
          return Cordova.exec(success, fail, "NativeController", "setInitializeView", types);
     },
     enableWebViewBounce: function(types, success, fail) {
          return Cordova.exec(success, fail, "NativeController", "enableWebViewBounce", types);
     },
     getWeather: function(types, success, fail) {
          return Cordova.exec(success, fail, "NativeController", "getWeather", types);
     },
     getTodayMission: function(types, success, fail) {
         return Cordova.exec(success, fail, "NativeController", "getTodayMission", types);
     }
};

function onDeviceReady() {
	lastLifeInfoUpdateDate = 0;
}

var page_number = -1;

function setInitialize() 
{
	$('body').append('<div class="footer">Copyright ⓒ 2003 NEXON Korea Corporation. All Rights Reserved.</div>');
}

function setMibiTime (mabiHours, mabiMinutes, realDate, realDay) {
	
	if ($('#mabi_clock').html()) {
		setMibiTimeOnLifeInfo (mabiHours, mabiMinutes, realDate, realDay);
	}
}
function wrapP(text) {
	return "<p>" + text + "</p>";
}
function getNowDate() 
{
	var now = new Date();
	var year = now.getFullYear();
	var month = now.getMonth();
	var day = now.getDate();
	var hours = now.getHours();
	var minutes = now.getMinutes();
	var seconds = now.getSeconds();
	minutes = Math.floor(minutes / 20) * 20;
	return [year, month, day, hours, minutes, seconds];
}
var g_page;
function changePage(page)
{
	location.href = page;
}
function callback() 
{
	setTimeout(function() {location.href = g_page;}, 200 );
}

function getNumber(numStr) {
	return Number(numStr.replace(/[^0-9-]/g, ''))
}

function initMiniMap(imgUrl, minimap, zoombutton) 
{
  var frameWidth = getNumber($(minimap).css('width'));
  var frameHeight = getNumber($(minimap).css('height'));
  var zoomoutRatio = 0.5;
  var zoomInRatio = 1;
  var ratio = zoomInRatio;
  var ratioDiff = 0;
  var bgWidth,bgHeight;
  var bgPosX,bgPosY;
  var x, y;
  var img = new Image();
  img.onload = function() {
	bgWidth = this.width;
	bgHeight = this.height;
	
	var zoomoutRatioX = frameWidth / bgWidth;
	var zoomoutRatioY = frameHeight / bgHeight;
	
	zoomoutRatio = (zoomoutRatioX > zoomoutRatioY) ? zoomoutRatioX : zoomoutRatioY;
	zoomoutRatio = (zoomoutRatio > 0.5)? zoomoutRatio : 0.5;
	zoomoutRatio = (zoomoutRatio > 1)? 1 : zoomoutRatio;
  
	$(minimap).each(function(index, frame) {
	  bgPosX = -(bgWidth * ratio - frameWidth) / 2;
	  bgPosY = -(bgHeight * ratio - frameHeight) / 2;
	  $(frame).css('background', 'url('+imgUrl+') no-repeat');
	  $(frame).css('background-position', bgPosX +'px '+bgPosY + 'px');
	  $(frame).css('background-size', bgWidth * ratio +'px auto');
	  
	  frame.addEventListener('touchstart', function(event) {
		// Save the position of the touchstart
		var touch = event.targetTouches[0];
		x = touch.pageX;
		y = touch.pageY;
	  });
  
	  frame.addEventListener('touchmove', function(event) {
		// Compute the difference between the start and the new position
		var touch = event.targetTouches[0];
		// Update the position of the frame
		
		var diffX = touch.pageX - x;
		if (frameWidth / (bgWidth * ratio) <= 1) {
		  x = touch.pageX;
		  bgPosX += diffX;
		  if (bgPosX > 0 ) bgPosX = 0;
		  if (bgPosX < -(bgWidth * ratio - frameWidth)) bgPosX = -(bgWidth * ratio - frameWidth);
		}
		
		var diffY = touch.pageY - y;
		if (frameHeight / (bgHeight * ratio) <= 1) {
		  y = touch.pageY;
		  bgPosY += diffY;
		  if (bgPosY > 0 ) bgPosY = 0;
		  if (bgPosY < -(bgHeight * ratio - frameHeight)) bgPosY = -(bgHeight * ratio - frameHeight);
		}
		
		var bgPos = bgPosX +'px '+bgPosY + 'px';
		$(frame).css('background-position', bgPos);
  
		// Prevent iPad from scrolling
		event.preventDefault();
		// Prevent event from bubbling up to document
		event.stopPropagation();
	  });
  
	  frame.addEventListener('touchend', function(event) {
	  });
	});
	
	if (zoomoutRatio != 1) {
	  $(zoombutton).click(function(e) {
		if (ratio == zoomInRatio) {
		  ratio = zoomoutRatio;
		  ratioDiff = zoomoutRatio / zoomInRatio;
		  $(this).empty();
		  $(this).append('+');
		} else {
		  ratio = zoomInRatio;
		  ratioDiff = zoomInRatio / zoomoutRatio;
		  $(this).empty();
		  $(this).append('-');
		}
		$(minimap).each(function(index, frame) {
		  bgPosX = ((getNumber($(frame).css('background-position').split(" ")[0]) - (frameWidth/2)) * ratioDiff) + (frameWidth/2);
		  bgPosY = ((getNumber($(frame).css('background-position').split(" ")[1]) - (frameHeight/2)) * ratioDiff) + (frameHeight/2);
		  if (bgPosX > 0 ) bgPosX = 0;
		  if (bgPosX < -(bgWidth * ratio - frameWidth)  ) bgPosX = -(bgWidth * ratio - frameWidth) ;
		  if (bgPosY > 0 ) bgPosY = 0;
		  if (bgPosY < -(bgHeight * ratio - frameHeight) ) bgPosY = -(bgHeight * ratio - frameHeight);
		  var bgPos = bgPosX  +'px ' + bgPosY  + 'px';
		  $(frame).css('background-size', bgWidth * ratio +'px auto');
		  $(frame).css('background-position', bgPos);
		});
	  });
	  $(zoombutton).trigger('click');
	} else {
	  $(zoombutton).remove();
	}
  }
  img.src = imgUrl;
}

function makeSpinner(selector) {
	$(selector).append('<div class="spinner"><div class="bar1"></div><div class="bar2"></div><div class="bar3"></div><div class="bar4"></div><div class="bar5"></div><div class="bar6"></div><div class="bar7"></div><div class="bar8"></div><div class="bar9"></div><div class="bar10"></div><div class="bar11"></div><div class="bar12"></div></div>');
}