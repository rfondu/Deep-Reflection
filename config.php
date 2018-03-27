<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <meta content="description" name="description">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="google" content="notranslate" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link href="./favicon.ico" rel="icon">
  <link href="./favicon.ico" rel="shortcut icon">
    
  <title>Deep Reflection - Configuration</title>  

  <link href="./main.css" rel="stylesheet">
  <script src="popup.js" type="text/javascript" language="Javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="">
    <div class="container-fluid" style="margin-top: 5%;">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4" style="border-style: solid;border-color: gray;height:100%;">
                
                <article>
                    <h3 style="color: aliceblue;">User Preferences</h3>
                    <?php

include "connect.php";
      

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $location = $_POST["locationDropdown"];
    $newsfeed = $_POST["newsfeedDropdown"];
    $username = $_POST["nameDropdown"];
    
     $sql = "UPDATE profiles SET Location='$location',NewsFeed='$newsfeed', Username='$username' where Name='Active'";
  //  $sql3 = "UPDATE classes SET classSize='$numStudents' where classname='$theClass'";

    $conn->query($sql);
/*
    if(mysqli_query($conn, $sql){
        echo "hey";
   
    }
    else{
        echo "no record".mysqli_error($con);
    }*/
    
	
}

?>
                    <form style="margin-left: 5%;margin-top: 10%;" method="post">
                        Name<br><!--<input id="name" name="name" type="text" style="margin-left: 10%; color: black;" required/>-->
                        <select id="name" name="nameDropdown" style="margin-left: 10%;">
                        	<?php
								include("connect.php");
								session_start();
								ob_start();

								$sql = "SELECT * FROM profiles WHERE Name!='Active'";

								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
    								while($row = $result->fetch_assoc()) {
        								echo '<option value="'.$row['Username'].'">'.$row['Username'].'</option>';    
    								}
								} else {
    								echo "No Valid Choices";
								}

								$conn->close();
							?>
						</select>
                        <br><br>
                        Location<br>
                        <select id="location" name="locationDropdown" style="margin-left: 10%;">
							<?php
								include("connect.php");
								session_start();
								ob_start();

								$sql = "SELECT * FROM locations";

								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
    								while($row = $result->fetch_assoc()) {
        								echo '<option value="'.$row['LocationName'].'">'.$row['LocationName'].'</option>';    
    								}
								} else {
    								echo "No Valid Choices";
								}

								$conn->close();
							?>
						</select>
                        <br><br>
                        News Feed<br>
                        <select id="newsfeed" name="newsfeedDropdown" style="margin-left: 10%;">
                        	<?php
								include("connect.php");
								session_start();
								ob_start();

								$sql = "SELECT * FROM newsFeeds";

								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
    								while($row = $result->fetch_assoc()) {
        								echo '<option value="'.$row['FeedName'].'">'.$row['FeedName'].'</option>';    
    								}
								} else {
    								echo "No Valid Choices";
								}

								$conn->close();
							?>
                        </select>
                        <br><br>
                        <input type="submit" value="Update" style="float: right; color: blue">
                        
                    </form>
                </article>
        
            </div>
            <div class="col-md-4">
            </div>
    
        </div>
    </div>
</body>
</html>