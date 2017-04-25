<!--
Nick Kinderman - I Hear Banjo Music - Paddle Racer project
4/17/17
home.php - main director page (query races with links to edit/delete)
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
                <p>Hello <?php Print "$user"?>!</p><!--Display's user name-->
                <h3><a href="createrace.php">Click here create a new race</a></h3>
                <a href="logout.php">Click here to logout</a><br/>
                <br/><br/>

                <h2 align="center">My Races</h2>
            		<table class="table">
            			<tr>
            				<th>Id</th>
            				<th>Race Name</th>
            				<th>Race Date</th>
            				<th>Location</th>
            				<th>Description</th>
            				<th>Edit</th>
            				<th>Delete</th>
            			</tr>
            			<?php
            				$con = mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
            				mysqli_select_db($con, "paddle_db") or die("Cannot connect to database"); //connect to database
            				$query = mysqli_query($con, "Select * from race"); // SQL Query
            				while($row = mysqli_fetch_array($query))
            				{
            					Print "<tr>";
            						Print '<td align="center">'. $row['RaceID'] . "</td>";
            						Print '<td align="center">'. $row['Race_Name'] . "</td>";
            						Print '<td align="center">'. $row['Date'] . "</td>";
            						Print '<td align="center">'. $row['Location'] . "</td>";
            						Print '<td align="center">'. $row['Description_Full'] . "</td>";
            						Print '<td align="center"><a href="edit.php?RaceID='. $row['RaceID'] .'">edit</a> </td>';
            						Print '<td align="center"><a href="#" onclick="myFunction('.$row['RaceID'].')">delete</a> </td>';
            					Print "</tr>";
            				}
            			?>
            		</table>
                <script>
            			function myFunction(id)
            			{
            			     var r=confirm("Are you sure you want to delete this record?");
            			     if (r==true)
        		           {
        		  	             window.location.assign("delete.php?RaceID=" + id);
        		           }
            			}
        		</script>

                <!--</div>-->

                <br>

                <div>


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
