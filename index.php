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

  <link href="./main.css" rel="stylesheet">
  <script src="popup.js" type="text/javascript" language="Javascript"></script>
</head>

<body class="">

<div id="dateTime">
	<div id="date">Today</div>
	<div id="time">Now</div>
</div>

<div id="weather">
	<div id="forecast">	
		<a class="weatherwidget-io" href="https://forecast7.com/en/29d42n98d49/san-antonio/?unit=us" data-label_1="SAN ANTONIO" data-label_2="WEATHER" data-textcolor="White" >CIBOLO WEATHER</a>
		<script>
			!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
		</script>
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


<div id="news">

	<script language="JavaScript" src="http://feed2js.org//feed2js.php?src=http%3A%2F%2Frss.slashdot.org%2FSlashdot%2FslashdotMain&chan=titlelinkno&num=4&desc=1&utf=y"  charset="UTF-8" type="text/javascript"></script>
	
	<!-- Other Feeds Confirmed to Work:
	CNN
	<script language="JavaScript" src="http://feed2js.org//feed2js.php?src=http%3A%2F%2Frss.cnn.com%2Frss%2Fcnn_topstories.rss&chan=titlelinkno&num=4&desc=1&utf=y"  charset="UTF-8" type="text/javascript"></script>

	MSNBC
	<script language="JavaScript" src="http://feed2js.org//feed2js.php?src=http%3A%2F%2Fwww.msnbc.com%2Ffeeds%2Flatest&chan=titlelinkno&num=4&desc=1&utf=y"  charset="UTF-8" type="text/javascript"></script>
	
	Fox News
	<script language="JavaScript" src="http://feed2js.org//feed2js.php?src=http%3A%2F%2Ffeeds.foxnews.com%2Ffoxnews%2Flatest&chan=titlelinkno&num=4&desc=1&utf=y"  charset="UTF-8" type="text/javascript"></script>
	
	AP News
	<script language="JavaScript" src="http://feed2js.org//feed2js.php?src=http%3A%2F%2Fhosted.ap.org%2Flineups%2FTOPHEADS.rss%3FSITE%3DPAREA%26SECTION%3DHOME&chan=titlelinkno&num=4&desc=1&utf=y"  charset="UTF-8" type="text/javascript"></script>
	
	ESPN
	<script language="JavaScript" src="http://feed2js.org//feed2js.php?src=http%3A%2F%2Fwww.espn.com%2Fespn%2Frss%2Fnews&chan=titlelinkno&num=4&desc=1&utf=y"  charset="UTF-8" type="text/javascript"></script>
	
	KSAT 12
	<script language="JavaScript" src="http://feed2js.org//feed2js.php?src=https%3A%2F%2Fwww.ksat.com%2Ffeeds%2FrssFeed%2FfeedServlet%3FobfType%3DGMG_RSS_DETAIL%26siteId%3D800001%26nbRows%3D20%26FeedFetchDays%3D180%26categoryId%3D80041&chan=titlelinkno&num=4&desc=1&utf=y"  charset="UTF-8" type="text/javascript"></script>
	
	Slashdot
	<script language="JavaScript" src="http://feed2js.org//feed2js.php?src=http%3A%2F%2Frss.slashdot.org%2FSlashdot%2FslashdotMain&chan=titlelinkno&num=4&desc=1&utf=y"  charset="UTF-8" type="text/javascript"></script>
	-->
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
    	<span class="close">&times;</span>
    	<p id="story-text">Story not available</p>
	</div>
</div>

<script>
	var modNum = 'javascript: void(0)" id="modLink'
	var news = document.getElementById('news');
	var newsSource = document.getElementsByClassName('rss-title')[0].innerHTML;
	var rawFeed = news.innerHTML;
	var mod = document.getElementById('story-text');
	var myRegex = /(<a class="rss-item"\s.+<\/a>)<br>(.+)<li class="rss-item">(<a class="rss-item"\s.+<\/a>)<br>(.+)<li class="rss-item">(<a class="rss-item"\s.+<\/a>)<br>(.+)<li class="rss-item">(<a class="rss-item"\s.+<\/a>)<br>(.+)/;
	var story = myRegex.exec(rawFeed);
	news.innerHTML = "<b>" + newsSource + "</b><br>";
	for (i = 1; i < story.length; i++) {
		if (i % 2 != 0) {
			story[i] = story[i].replace(/http.+_self/, modNum + i);
			news.innerHTML += story[i] + "<br>";
		}
	}

	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var mod1 = document.getElementById("modLink1");
	var mod3 = document.getElementById("modLink3");
	var mod5 = document.getElementById("modLink5");
	var mod7 = document.getElementById("modLink7");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks a link, open the modal 
	mod1.onclick = function() {
		mod.innerHTML = story[2];
    	modal.style.display = "block";
	}
	mod3.onclick = function() {
		mod.innerHTML = story[4];
    	modal.style.display = "block";
	}
	mod5.onclick = function() {
		mod.innerHTML = story[6];
    	modal.style.display = "block";
	}
	mod7.onclick = function() {
		mod.innerHTML = story[8];
    	modal.style.display = "block";
	}
	
	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
    	modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
    	if (event.target == modal) {
        	modal.style.display = "none";
    	}
	}
</script>

</body>
</html>