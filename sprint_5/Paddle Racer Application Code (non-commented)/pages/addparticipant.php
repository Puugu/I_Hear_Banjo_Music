


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

    <title>Add Participant</title>

    <!-- Bootstrap core CSS -->
    <link href="../style/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="../style/bootstrap-theme.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="../style/theme.css" rel="stylesheet">

</head>

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

				<!--

					NICK: Do your php within this div unless you see reason otherwise.


				-->

               <h1>Add Paricipant</h1>


			   <!-- I added this table because it looks nicer with the form to
						see participants that exist and when added can update list. or remove it idc which-->

			   <table class="table table-striped">

                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>BIB</th>
							<th>Boat Type</th>
                            <th>Team Name</th>

                        </tr>
                        <tr>
                            <td>Jane</td>
							<td>Goodall</td>
                            <td>P5842</td>
							<th>A Shrubbery</th>
                            <th>Knights Who Say Ni</th>
                        </tr>
                        <tr>
                            <td>George</td>
							<td>Harrison</td>
                            <td>P6925</td>
                            <th>Yellow Sub</th>
							<th>The Crickets</th>
                        </tr>
                        <tr>
                            <td>Ringo</td>
							<td>Starr</td>
                            <td>P6926</td>
							<th>Yellow Sub</th>
                            <th>The Crickets</th>
                        </tr>
                    </table>
              <form action="/action_page.php" id="addracerform">
						<label for="racename">Race Name</label>
						<input type="text" id="addracerform_racename" name="racename" placeholder="Enter Race name..">

						<label for="fname">First Name</label>
						<input type="text" id="addracerform_fname" name="fname" placeholder="Participant First name..">

						<label for="lname">Last Name</label>
						<input type="text" id="addracerform_lname" name="lname" placeholder="Participant Last name..">

						<label for="dob">Date of Birth</label>
						<input type="text" id="addracerform_dob" name="dob" placeholder="Enter DOB..">

						<label for="id">ID Number</label>
						<input type="text" id="addracerform_id" name="id" placeholder="EnderID Number..">

						<label for="hometown">Hometown</label>
						<input type="text" id="addracerform_hometown" name="hometown" placeholder="Enter Hometown..">

						<label for="fname">Participant BIB Bumber</label>
						<input type="text" id="addracerform_fname" name="fname" placeholder="Enter BIB #..">

						<label for="addteam">Add Team</label>
						<input type="text" id="addracerform_addteam" name="addteam" placeholder="Enter Team Name..">

						<input type="button" value="Add Team">

						<label for="team">Select Team</label>
						<select id="addracerform_team" name="team">
						  <option value="Ni">Knights Who say Ni</option>
						  <option value="Beathles">The Beatles</option>
						  <option value="Purritos">Spicy Purritos</option>
						</select>

						<label for="addboat">Add Boat</label>
						<input type="text" id="addracerform_addboat" name="addboat" placeholder="Boat Type..">
					  	<input type="button" value="Add Boat Type To List">

						<label for="boatselect">Available Boat Classes</label>
						<select id="addracerform_boatselect" name="boatselect">
						  <option value="shrub">Shrubbery</option>
						  <option value="ysubmarine">Yellow Submarine</option>
						  <option value="sup">SUP</option>
						  <option value="canoe">Canoe</option>
						  <option value="pedal">Pedal Boat</option>
						  <option value="swallow">Unladen Swallow</option>
						</select>

						<input type="submit" value="Submit">
					  </form>


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
