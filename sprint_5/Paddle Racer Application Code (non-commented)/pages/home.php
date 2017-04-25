

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

    <title>Edit Race</title>

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
        <a href="createrace.php">Create New Race</a><br/>
        <a href="logout.php">Logout</a><br/>
        <br/>


               <h1>My Races</h1>
               <table class="table table-striped">

                        <tr>
                            <th>Race_Name</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th>Edit</th>
                    				<th>Delete</th>
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
                              Print '<td align="center"><a href="editrace.php?idRace='. $row['idRace'] .'">edit</a> </td>';
                              Print '<td align="center"><a href="#" onclick="myFunction('. $row['idRace'] .')">delete</a> </td>';
                            Print "</tr>";
                          }
                        ?>
                    </table>
                    <!--
                        JavaScript to confirm functionality
                    -->
                    <script>
                			function myFunction(id)
                			{
                			     var r=confirm("Are you sure you want to delete this record?");
                			     if (r==true)
            		           {
            		  	             window.location.assign("delete.php?idRace=" + id);
            		           }
                			}
            		</script>




					<!-- I stole this from your edit.php instead of deans 2nd table since it looks nicer -->
					<!-- <form action="edit.php" method="POST">
              			Edit Race Name: <input type="text" name="Race_Name"/><br/>
              			Edit Race Date: <input type="text" name="Date"/><br/>
              			Enter Location: <input type="text" name="Location"/><br/>
              			Edit Description: <input type="text" name="Description_Full"/><br/>
              			<input type="submit" value="Update List"/>
              		</form> -->

			</div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../style/jquery.min.js"></script>
    <script src="../style/bootstrap.min.js"></script>
    <script src="../style/docs.min.js"></script>



<div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" title="" data-original-title="Copy to clipboard">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" width="100%" height="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1492036253108">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="/assets/flash/ZeroClipboard.swf?noCache=1492036253108" loop="false" menu="false" quality="best" bgcolor="#ffffff" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit" width="100%" height="100%">                </object></div><svg xmlns="http://www.w3.org/2000/svg" width="1140" height="500" viewBox="0 0 1140 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="57" style="font-weight:bold;font-size:57pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thirdslide</text></svg>
</body>


</html>
