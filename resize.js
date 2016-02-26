var rect = document.getElementById('side_nav').getBoundingClientRect();
  	var rect2 = document.getElementById('foot').getBoundingClientRect();
  	height = Math.max(rect2.top - rect.top, document.getElementById('side_nav').style.height);
  	document.getElementById('side_nav').style.height = "" + (height) +"px";

  	window.addEventListener('resize', function(event){
  		var rect = document.getElementById('side_nav').getBoundingClientRect();
  		var rect2 = document.getElementById('foot').getBoundingClientRect();
  		height = rect2.top - rect.top;
  		document.getElementById('side_nav').style.height = "" + (height) +"px";
	});