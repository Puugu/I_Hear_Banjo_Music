<!--

	Author: Jonathan Bowie
	Last Update: 3/25/17

	Description: Web layout framework for website interface for I Hear Banjo Music
					Director page for site

-->

<!doctype html>


<html>
<link href = "cover.css" rel = "stylesheet">
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
				  <li><a href="createrace.php">Create Race</a></li>
				  <li><a href="editrace.php">Edit Race</a></li>
				  <li><a href="#">Add/Edit Registration</a></li>
                  <li><a href="#">Time Race</a></li>
                  <li><a href="results.html">Results</a></li>
                </ul>
				</div>
              </nav>
            </div>
          </div>

          <div class="inner cover">

						<h2>Director Login Page</h2>
		        <a href="index.php">Click here to go back</a><br/><br/><br/>
		        <form action="checklogin.php" method="POST">
		           Enter Username: <input type="text" name="username" required="required" /> <br/><br/>
		           Enter password: <input type="password" name="password" required="required" /> <br/><br/>
		           <input type="submit" value="Login"/>
		        </form>


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
