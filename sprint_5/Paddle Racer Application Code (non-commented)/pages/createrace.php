


<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Create Race</title>

    <!-- Bootstrap core CSS -->
    <link href="../style/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="../style/bootstrap-theme.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="../style/theme.css" rel="stylesheet">

</head>

<!--
  php to verify login session
-->
<?php
session_start(); //starts the session
if($_SESSION['user']){ // checks if the user is logged in
}
else{
   header("location: login.php"); // redirects if user is not logged in
}
$user = $_SESSION['user']; //assigns user value
?>

<body>


    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Paddle Racer</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="../index.html">Home</a></li>
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Race Director<span class="caret"></span></a>
              <ul class="dropdown-menu">
			    <li class="dropdown-header">Races</li>
                <li><a href="createrace.php">Create Race</a></li>
                <li><a href="home.php">Edit/Delete Race</a></li>
				<li role="separator" class="divider"></li>
                <li class="dropdown-header">Potential Participants</li>
				<li><a href="addparticipant.php">Add Participant</a></li>
				<li><a href="editparticipant.php">Edit Participant</a></li>
				<li role="separator" class="divider"></li>
                <li><a href="enterracetime.php">Enter Race Times</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Race Participant<span class="caret"></span></a>
              <ul class="dropdown-menu">
			    <li class="dropdown-header">Races</li>
                <li><a href="viewraces.php">View Races</a></li>
                <li><a href="register.php">Register</a></li>
              </ul>
            </li>
			<li><a href="viewresults.php">View Results</a></li>
			<li><a href="about.html">About</a></li>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Help<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="questions.html">FAQ</a></li>
                <li><a href="userguide.html">User Guide</a></li>
              </ul>
            </li>
		  <li><a href="login.php">Log in/out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">


			<div class="well">

        <p>Hello <?php Print "$user"?>!</p><!--Display's user name-->
        <a href="home.php">Return to Director Home</a><br/>
        <a href="logout.php">Logout</a><br/>

        <h1>My Races</h1>
        <table class="table table-striped">

                 <tr>
                     <th>Race_Name</th>
                     <th>Date</th>
                     <th>Location</th>
                     <th>Description</th>
                 </tr>
                 <!--
                     PHP code to read race info from database and print to html table
                 -->
                 <?php
                   $con = mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
                   mysqli_select_db($con, "mydb") or die("Cannot connect to database"); //connect to database
                   $query = mysqli_query($con, "SELECT DISTINCT R.* FROM program_user p, race r, user_has_race u
                   WHERE p.id = u.user_id and r.idRace = u.race_id and p.username = '$user' "); // SQL Query
                   while($row = mysqli_fetch_array($query))
                   {
                     Print "<tr>";
                       Print '<td align="center">'. $row['Race_Name'] . "</td>";
                       Print '<td align="center">'. $row['Date'] . "</td>";
                       Print '<td align="center">'. $row['Location'] . "</td>";
                       Print '<td align="center">'. $row['Description'] . "</td>";
                     Print "</tr>";
                   }
                 ?>
             </table>


			   <!-- I added this table because it looks nicer with the form to
						see what races exist and when added can update list. or remove it idc which-->

            <h2>Create Race</h2>
            <form action="add.php" method="POST" id="bform">
               Race Name: <input type="text" name="Race_Name" /> <br/>
               Race Date: <input type="text" name="Date" /> <br/>
               Location: <input type="text" name="Location" /> <br/>
               Description: <input type="text" name="Description" /> <br/>
               <!-- <label for="name">Add Boat</label>
   						 <input type="text" id="bform_boatnameadd" name="boatnameadd" placeholder="Boat Type..">
   					   <input type="button" value="Add Boat Type To List">

   						<label for="country">Available Boat Classes</label>
   						<select id="bform_boatselect" name="boatselect">
   						  <option>Rec. Kyak</option>
   						  <option value="racekyak">Race Kyak</option>
   						  <option value="sup">SUP</option>
   						  <option value="canoe">Canoe</option>
   						  <option value="pedal">Pedal Boat</option>
   						  <option value="swallow">Unladen Swallow</option>
   						</select> -->
               <input type="submit" value="Submit"/>
            </form>
            <br>
            <p>Add and delete boat classes on edit race page</p>

            <!-- <h1>Create Race</h1>

            <form action="add.php" method="POST" id="bform">
						<label for="name">Race Name</label>
						<input type="text" id="bform_name" name="Race_Name" placeholder="Race name..">

						<label for="date">Date of Race</label>
						<input type="text" id="bform_date" name="Date" placeholder="Enter Race Date..">

						<label for="location">Location of Race</label>
						<input type="text" id="bform_location" name="Location" placeholder="Enter Location of Race..">

						<label for="name">Description</label>
            <input type="text" id="bform_location" name="Description" placeholder="Enter text here..."> -->

						<!-- <textarea class="racedescription" rows="4" cols="50" name="Description" form="bform" id="bform_description" placeholder="Enter text here..."></textarea> -->


						<!-- <input type="submit" value="Submit">
					  </form> -->


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../style/jquery.min.js"></script>
    <script src="../style/bootstrap.min.js"></script>
    <script src="../style/docs.min.js"></script>

</body>


</html>
