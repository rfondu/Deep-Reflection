<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <meta content="description" name="description">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="google" content="notranslate" />

  <link href="./favicon.ico" rel="icon">
  <link href="./favicon.ico" rel="shortcut icon">

  <title>Deep Reflection</title>  

<link href="./main.css" rel="stylesheet"></head>

<body class="">

<div id="dateTime">
	<div id="date"></div>
	<div id="time"></div>
</div>



<div id="weather">
	<div id="forecast"></div>
	<div id="attrib">
		<a href="https://www.yahoo.com/?ilc=401" target="_blank"> <img src="https://poweredby.yahoo.com/white.png" width="134" height="29"/> </a>
	</div>
</div>



<script type= "text/javascript">
	var options = { weekday: 'long', month: 'short', day: 'numeric' };
	document.getElementById("date").innerHTML = new Date().toLocaleDateString('en-US', options);
	options = { hour: 'numeric', minute: '2-digit' };
	myTimer();
	setInterval(myTimer, 60000);

	function myTimer() {
    	var t = new Date();
    	document.getElementById("time").innerHTML = t.toLocaleTimeString('en-US', options);
	}
</script>

<script>
  var callbackFunction = function(data) {
    var wind = data.query.results.channel.wind;
    document.getElementById("forecast").innerHTML = wind.chill.toString() + "&#8457;";
  };
</script>

<script src="https://query.yahooapis.com/v1/public/yql?q=select wind from weather.forecast where woeid in (select woeid from geo.places(1) where text='san antonio, tx')&format=json&callback=callbackFunction"></script>



</body>
</html>