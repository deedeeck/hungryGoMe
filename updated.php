<?php 
session_start();

$con = mysql_connect("sql102.byethost12.com","b12_13833487","hackers2");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("b12_13833487_123", $con);
$nname = $_SESSION['MM_UserGroup'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if($password == $password2){	
	mysql_query("UPDATE member SET password = $password where name ='$nname'");
	mysql_query("UPDATE member SET name = '$_POST[newname]' where name ='$nname'");
}
$_SESSION['MM_UserGroup'] = $_POST['newname'];

mysql_close($con);
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Profile updated</title>
<link href="styles/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="styles/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="styles/menu_assets/styles.css" rel="stylesheet" type="text/css" />

    <!-- redirect in 5s -->
    <meta http-equiv="refresh" content="5; URL=viewprofile.php">	
</head>

<body>
    <!-- Header bar-->
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
 	<div class="row" style="text-align: center; padding-top: 50px; padding-bottom: 293px;">
    
    	<!-- container for profile info -->
		<div style="display: inline-block; width: 500px; background-color:#eeeeee; border-radius: 6px;">
            <?php
            	if($password == $password2){   
			?>
                   <h1 style="margin-top: 20px;">Success!</h1>
                   <h3>You have updated your profile.</h3>
             <?php
				} else {
					echo "<h2>Your passwords do not match!</h2>";
				}
			?>
            <p>You will be redirected to your profile in 5 seconds.</p><br/>
            <p style="float: right; font-size: 12px; margin-right: 30px; margin-bottom: 20px;">
               Not getting redirected? Click <a href="viewprofile.php">here</a> to return to your profile.
            </p>
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