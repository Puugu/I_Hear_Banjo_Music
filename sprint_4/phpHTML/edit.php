<!--
Nick Kinderman - I Hear Banjo Music - Paddle Racer project
4/17/17
edit.php - edit race information from database
The HTML code is modified from Dean Dixon's and Jonathan Bowie's work from Sprint 1-3
The PHP code is modfied from Kristian Guevera's PHP tutorial
Step-by-Step PHP Tutorials for Beginners - Creating your PHP program FROM SCRATCH:
Basic Authentication, Membership and CRUD functionalities
https://www.codeproject.com/Articles/759094/Step-by-Step-PHP-Tutorials-for-Beginners-Creating
-->

<!doctype html>


<html>

<head>
    <link href="cover.css" rel="stylesheet">
    <link href="editrace.css" rel="stylesheet">
</head>
<?php
session_start(); //starts the session
if($_SESSION['user']){ // checks if the user is logged in
}
else{
   header("location: index.php"); // redirects if user is not logged in
}
$user = $_SESSION['user']; //assigns user value
?>

<body>
    <div class="site-wrapper">

        <div class="site-wrapper-inner">

            <div class="cover-container">

                <div class="masthead clearfix">
                    <div class="inner">

                        <nav>
                            <div class="topnav">
                                <ul class="nav masthead-nav">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="createrace.html">Create Race</a></li>
                                    <li><a href="editrace.html">Edit Race</a></li>
                                    <li><a href="#">Add/Edit Registration</a></li>
                                    <li><a href="#">Time Race</a></li>
                                    <li><a href="results.html">Results</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>

                <!--<div class="inner cover">-->
                <h2>Edit Race</h2>
            		<p>Hello <?php Print "$user"?>!</p> <!--Displays user's name-->
            		<a href="logout.php">Click here to logout</a><br/>
            		<a href="home.php">Return to Director page</a>
            		<h2 align="center">Currently Selected</h2>
            		<table class="table">
            			<tr>
            				<th>Id</th>
            				<th>Race Name</th>
            				<th>Race Date</th>
            				<th>Location</th>
            				<th>Description</th>
            			</tr>
            			<?php
            				if(!empty($_GET['RaceID']))
            				{
            					$id = $_GET['RaceID'];
            					$_SESSION['RaceID'] = $id;
            					$id_exists = true;
            					$con = mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
            					mysqli_select_db($con,"paddle_db") or die("Cannot connect to database"); //connect to database
            					$query = mysqli_query($con, "Select * from race Where RaceId='$id'"); // SQL Query
            					$count = mysqli_num_rows($query);
            					if($count > 0)
            					{
            						while($row = mysqli_fetch_array($query))
            						{
            							Print "<tr>";
            								Print '<td align="center">'. $row['RaceID'] . "</td>";
            								Print '<td align="center">'. $row['Race_Name'] . "</td>";
            								Print '<td align="center">'. $row['Date'] . "</td>";
            								Print '<td align="center">'. $row['Location'] . "</td>";
            								Print '<td align="center">'. $row['Description_Full'] . "</td>";
            							Print "</tr>";
            						}
            					}
            					else
            					{
            						$id_exists = false;
            					}
            				}
            			?>
            		</table>

                <!--</div>-->

                <br>

                <div>
                  <?php
              		if($id_exists)
              		{
              		Print '
              		<form action="edit.php" method="POST">
              			Edit Race Name: <input type="text" name="Race_Name"/><br/>
              			Edit Race Date: <input type="text" name="Date"/><br/>
              			Enter Location: <input type="text" name="Location"/><br/>
              			Edit Description: <input type="text" name="Description_Full"/><br/>
              			<input type="submit" value="Update List"/>
              		</form>
              		';
              		}
              		else
              		{
              			Print '<h2 align="center">There is no data to be edited.</h2>';
              		}
              		?>



                </div>

                <div class="mastfoot">
                    <div class="inner">

                    </div>
                </div>

            </div>

        </div>

    </div>
</body>
</html>

<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$con = mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
		mysqli_select_db($con,"paddle_db") or die("Cannot connect to database"); //Connect to database
		$race_name = mysqli_real_escape_string($con, $_POST['Race_Name']);
		$race_date = mysqli_real_escape_string($con, $_POST['Date']);
		$location = mysqli_real_escape_string($con, $_POST['Location']);
		$description = mysqli_real_escape_string($con, $_POST['Description_Full']);
		$id = $_SESSION['RaceID'];
		mysqli_query($con, "UPDATE race SET Race_Name='$race_name', Date='$race_date', Location='$location', Description_Full='$description'  WHERE RaceID='$id'") ;
		header("location: home.php");
	}
?>
