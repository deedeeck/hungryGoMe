<?php 
session_start();

$con = mysql_connect("sql102.byethost12.com","b12_13833487","hackers2");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Edit profile</title>
<link href="styles/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="styles/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="styles/menu_assets/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
 	<div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> 
	    <div class="nav-collapse collapse">
        <p class="navbar-text pull-right">
        	<div class=\"pull-right\"><div class=\"btn-group\"></div></div>
        </p>

            <div id='cssmenu'>
            <a class="brand" class="has-sub " href="index.php">HungryGoMe</a>
            <ul>
               <li class='has-sub '><a href='#'><span>About</span></a></li>
               <li class='has-sub '><a href='#'><span>Restaurants</span></a>
                  <ul>
                     <li class='has-sub '><a href='#'><span>Food Type</span></a>
                        <ul>
                           <li><a href='#'><span>Chinese</span></a></li>
                           <li><a href='#'><span>Western</span></a></li>
                           <li><a href='#'><span>Indian</span></a></li>
                           <li><a href='#'><span>Muslim</span></a></li>
                           <li><a href='#'><span>Others</span></a></li>
                        </ul>
                     </li>
                     <li class='has-sub '><a href='#'><span>Region</span></a>
                        <ul>
                           <li><a href='#'><span>North</span></a></li>
                           <li><a href='#'><span>South</span></a></li>
                           <li><a href='#'><span>East</span></a></li>
                           <li><a href='#'><span>West</span></a></li>
                           <li><a href='#'><span>Central</span></a></li>
                        </ul>
                     </li>
                     <li class='has-sub '><a href='#'><span>Restaurant Type</span></a>
                        <ul>
                           <li><a href='#'><span>Cafe</span></a></li>
                           <li><a href='#'><span>Bistro</span></a></li>
                           <li><a href='#'><span>Fastfood</span></a></li>
                           <li><a href='#'><span>Dining</span></a></li>
                           <li><a href='#'><span>Buffet</span></a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li><a href='#'><span>Contact Us</span></a></li>
               <li class="space"><a href='#'><span></span></a></li>
			   <?php
                    if(isset($_SESSION['MM_Username'])) {
                        echo "<li class='has-sub '><a href='#'><span>Welcome "; echo $_SESSION['MM_UserGroup']; echo "!</span></a>
                            <ul>
                               <li><a href='viewprofile.php'><span>My Profile</span></a></li>
                               <li><a href='#'><span>View my Reviews</span></a></li>
                            </ul>
                            <li><a href=\"logout.php\"><span>Logout</span></a></li>
                        </li>";
                    } else {
                        echo "<li><a href='memberLogin.php'>Login</a></li>
                        <li><a href='registerMember.php'>Register</a></li>";
                    }
                ?>
            </ul>
        	</div>
     	</div>
    </div>
  </div>
  <div class="container">
	<div class="row" style="text-align: center; padding-top: 50px; padding-bottom: 69px;">
    
    	<!-- container for profile info -->
		<div style="display: inline-block; text-align: left; padding: 30px; background-color:#eeeeee; border-radius: 6px;">
           <?php
                if(isset($_SESSION['MM_Username'])) {
		   ?>
           <!-- change dp -->
           <div class="row" style="width: 450px; margin: auto; color: black;">
        	   <div style="height: 140px; width: 140px; float: left; background-color: #cccccc;">
               	  picture
               </div>
               <div style="float: right; width: 250px; ">
	              <h2>Change display picture</h2>
                  <p>
                  	No file chosen<br/>
                  	<a href="#" class="btn">Choose file</a>
                  </p>
               </div>
           </div>
           <hr />
        	
           <!-- form to change username and pw --> 
		   <div class="row" style="width: 450px; margin: auto; margin-top: 30px;">
              <form method="POST" action="updated.php">
                  <div style="width: 180px; float: left;">
                    <p>Enter new username:</p><br/>
                    <p>Enter new password:</p><br/>
                    <p>Re-enter new password:</p>
                  </div>
                  <div style="width: 250px; float: left;">
                    <p><input type="text" name="newname" id="textfield" /></p>
                    <p><input type="password" name="password" id="textfield2" /></p>
                    <p><input type="password" name="password2" id="textfield3" /></p>
                    <p style="float: right;"><input class="btn" type="submit" /></p>
                  </div>
               </form>
           </div>
           <?php
				} else {
					echo "<p>Please log in.</p>";
				}
		   ?>
        </div>
	</div>

	<hr>
  	<footer>
    	<div class="row">
	    	<div class="span2">© HungryGoMe 2012</div>
    	</div>
 	</footer>
  </div>
  </div>
</body>
</html>