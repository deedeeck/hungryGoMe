﻿<?php 
	session_start();

	$con = mysql_connect("sql102.byethost12.com","b12_13833487","hackers2");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("b12_13833487_123", $con);
	
	$stallname = $_GET['stallname2'];
	echo "</br>";
	$address = $_GET['address2'];
	$temail = $_GET['email2'];
	mysql_query("DELETE FROM review WHERE r_stall_name= '$stallname' AND r_address = '$address' AND m_email = '$temail'");
	
	mysql_close($con);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Review deleted</title>
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
      			
      <?php
			  
		
		if(isset($_SESSION['MM_Username']))
		{
			$name = $_SESSION['MM_UserGroup'];
		}
		
		echo "<div class=\"pull-right\">";
		echo "<div class=\"btn-group\">";
		echo "</div>";
		echo "</div>";
		?>
              
      </p>	

            <div id='cssmenu'>
        <a class="brand" class="has-sub " href="index.php" style="margin-right:-10px;">HungryGoMe</a>
        <ul>
           <li class='has-sub '><a href='#'><span>About</span></a></li>
           <li class='has-sub '><a href='#'><span>Restaurants</span></a>
              <ul>
                 <li class='has-sub '><a href='#'><span>Food Type</span></a>
                    <ul>
                       <li><a href='getResturantByFoodType.php?foodType=Chinese'><span>Chinese</span></a></li>
                       <li><a href='getResturantByFoodType.php?foodType=Fast Food'><span>Fast Food</span></a></li>
                       <li><a href='getResturantByFoodType.php?foodType=French'><span>French</span></a></li>
                       <li><a href='getResturantByFoodType.php?foodType=Halal'><span>Halal</span></a></li>
                       <li><a href='getResturantByFoodType.php?foodType=Italian'><span>Italian</span></a></li>
                       <li><a href='getResturantByFoodType.php?foodType=Japanese'><span>Japanese</span></a></li>
                       <li><a href='getResturantByFoodType.php?foodType=Korean'><span>Korean</span></a></li>
                       <li><a href='getResturantByFoodType.php?foodType=Thai'><span>Thai</span></a></li>
                       <li><a href='getResturantByFoodType.php?foodType=Vegetarian'><span>Vegetarian</span></a></li>
                       <li><a href='getResturantByFoodType.php?foodType=Western'><span>Western</span></a></li>
                       <li><a href='getResturantByFoodType.php?foodType=Others'><span>Others</span></a></li>
                    </ul>
                 </li>
                 <li class='has-sub '><a href='#'><span>Region</span></a>
                    <ul>
                       <li><a href='getResturantByRegion.php?region=North'><span>North</span></a></li>
                       <li><a href='getResturantByRegion.php?region=South'><span>South</span></a></li>
                       <li><a href='getResturantByRegion.php?region=East'><span>East</span></a></li>
                       <li><a href='getResturantByRegion.php?region=West'><span>West</span></a></li>
                       <li><a href='getResturantByRegion.php?region=Central'><span>Central</span></a></li>
                    </ul>
                 </li>
                 <li class='has-sub '><a href='#'><span>Restaurant Type</span></a>
                    <ul>
                       <li><a href='getResturantByType.php?type=Bar'><span>Bar</span></a></li>
                       <li><a href='getResturantByType.php?type=Bistro'><span>Bistro</span></a></li>
                       <li><a href='getResturantByType.php?type=Buffet'><span>Buffet</span></a></li>
                       <li><a href='getResturantByType.php?type=Cafe'><span>Café</span></a></li>
                       <li><a href='getResturantByType.php?type=Fast Food'><span>Fast Food</span></a></li>
                       <li><a href='getResturantByType.php?type=Food Court'><span>Food Court</span></a></li>
                       <li><a href='getResturantByType.php?type=Restaurant'><span>Restaurant</span></a></li>
                       <li><a href='getResturantByType.php?type=Others'><span>Others</span></a></li>
                    </ul>
                 </li>
              </ul>
           </li>
           <li><a href='#'><span>Contact Us</span></a></li>
           <li><!-- search form -->
           		<form style="margin-top: 10px; margin-bottom: 0; margin-left: 20px; margin-right: 10px;" id="form1" name="form1" method="post" action="search_text_results.php">
                	<input name="search" type="text" id="search_text" />
                    <input style="margin-top: -8px;" class="btn" type="submit" value="Search" />
                </form>
           </li>
           <?php
                if(isset($_SESSION['MM_Username'])) {
					$name = $_SESSION['MM_UserGroup'];
                    echo "<li class='has-sub '><a href='#'><span>Welcome $name!</span></a>
						<ul>
						   <li><a href='viewprofile.php'><span>My Profile</span></a></li>";
					   	   if($_SESSION['AccessRights'] == "Admin"){
							   echo "<li><a href='adminHome.php'><span>Admin Dashboard</span></a></li>";
						   } else if($_SESSION['AccessRights'] == "Member") {
							   echo "<li><a href='deletereview.php'><span>View my Reviews</span></a></li>";
						   }
					echo"</ul>
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
       
    <div class="row" style="text-align: center; padding: 50px;">    	
        <div style="display: inline-block; margin-bottom: 300px; text-align: left; padding: 30px; background-color: #eeeeee; border-radius: 6px;">
			<?php
                if(isset($_SESSION['MM_Username'])) {
                
                	echo "<h1 style='margin-top: 0;'>Success!</h1>";
                    echo "<div>Review for " . $stallname . ", " . $address . " deleted.";
            	} else {
					echo "Please log in.";
				}
			?>
        </div>
	</div>
    <hr>
  	<footer>
  	<div class="row">
	    <div class="span2">© HungryGoMe 2012</div>
        <?php if(!isset($_SESSION['MM_Username'])) {
        	echo" <div class='span2' style='text-align: right; float: right;'><a href='adminLogin.php'>Admin Login</a></div>";
		}
		?>
    </div>
  </footer>
</div>
</div>

</body>
</html>