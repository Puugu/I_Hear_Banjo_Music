<!--
Nick Kinderman - I Hear Banjo Music - Paddle Racer project
4/9/17
add.php - insert information to database
This code is modfied from Kristian Guevera's PHP tutorial
Step-by-Step PHP Tutorials for Beginners - Creating your PHP program FROM SCRATCH:
Basic Authentication, Membership and CRUD functionalities
https://www.codeproject.com/Articles/759094/Step-by-Step-PHP-Tutorials-for-Beginners-Creating
-->

<?php
	session_start();
	if($_SESSION['user']){
	}
	else{
		header("location:login.html");
	}
	$user = $_SESSION['user'];
  $con = mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	if($_SERVER['REQUEST_METHOD'] = "POST") //Added an if to keep the page secured
	{
		$race_name = mysqli_real_escape_string($con, $_POST['Race_Name']);
		$race_date = mysqli_real_escape_string($con, $_POST['Date']);
		$location = mysqli_real_escape_string($con, $_POST['Location']);
		$description = mysqli_real_escape_string($con, $_POST['Description']);

		mysqli_select_db($con, "mydb") or die("Cannot connect to database"); //Connect to database
		mysqli_query($con, "INSERT INTO race (Race_Name, Date, Location, Description) VALUES ('$race_name','$race_date','$location','$description')");
		 //SQL query

		$query1 = mysqli_query($con, "select DISTINCT * FROM program_user WHERE username='$user'");
		$row1 = mysqli_fetch_array($query1);
		$id = $row1['id'];

		$query2 = mysqli_query($con, "Select * from race Where Race_Name='$race_name'"); // SQL Query
		$row2 = mysqli_fetch_array($query2);
		$race_id = $row2['idRace'];

		mysqli_query($con, "INSERT INTO user_has_race (user_id, race_id) VALUES ( '$id','$race_id')"); //SQL query
		$url = "createrace.php?idRace=$id";
 		 //SQL query
		header("location:" . $url);
	}
	else
	{
		header("location:home.php"); //redirects back to hom
	}
?>
