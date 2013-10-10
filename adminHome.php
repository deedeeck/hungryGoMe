<?php

session_start();
$con = mysql_connect("sql102.byethost12.com","b12_13833487","hackers2");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("b12_13833487_123", $con);



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Home</title>
<link href="styles/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="styles/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
<link href="styles/menu_assets/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<!-- Header bar-->
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
							   echo "<li><a href='#'><span>View my Reviews</span></a></li>";
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
        <div style="display: inline-block; text-align: left; padding: 30px; background-color: #eeeeee; border-radius: 6px;">
            <?php
        		if(isset($_SESSION['MM_Username'])) {
					if($_SESSION['AccessRights'] == "Admin") {
						$memTotalRows = mysql_query("SELECT * FROM member");
						$memTotal = mysql_num_rows($memTotalRows);
						$memNoRevRows = mysql_query("SELECT email FROM member WHERE email NOT IN (SELECT DISTINCT m_email FROM review)");
						$memNoRev = mysql_num_rows($memNoRevRows);
						$mem1revRows = mysql_query("Select DISTINCT (r.m_email) from review r");
						$mem1rev = mysql_num_rows($mem1revRows);
						$memAllRevRows = mysql_query("SELECT m.email from member m WHERE NOT EXISTS (select * from restaurant r WHERE r.approve = true AND NOT EXISTS (select * from review w WHERE m.email = w.m_email AND r.stall_name = w.r_stall_name AND r.address = w.r_address))");
						$memAllRev = mysql_num_rows($memAllRevRows);
						
						$resTotalRows = mysql_query("SELECT * FROM restaurant");
						$resTotal = mysql_num_rows($resTotalRows);
						$resApprovedRows = mysql_query("SELECT * FROM restaurant WHERE approve = 1");
						$resApproved = mysql_num_rows($resApprovedRows);
						$resUnapprovedRows = mysql_query("SELECT * FROM restaurant WHERE approve = 0");
						$resUnapproved = mysql_num_rows($resUnapprovedRows);
						
						$numRevRows = mysql_query("SELECT * FROM review");
						$numRev = mysql_num_rows($numRevRows);
			?>
                        <!-- admin dashboard -->
                        <h1 style="color: black; margin-top: 0px;">ADMIN DASHBOARD</h1>
                        <hr />
                        <h3 style="color: black;">Website Statistics</h3>
                        <div class="row" style="margin-left: 0;">
                            <div style="float: left;">
                                <p>Number of members</p>
                                <div style="margin-left: 30px;">
                                    <p>Who have not reviewed anything</p>
                                    <p>Who have reviewed at least 1 restaurant</p>
                                    <p>Who have reviewed all restaurants</p>
                                </div>
                                <p>Number of restaurants</p>
                                <div style="margin-left: 30px;">
                                    <p>Approved</p>
                                    <p>Unapproved</p>
                                </div>
                                <p>Number of reviews</p>
                            </div>
                            
                            <div style="margin-left: 50px; float: left; ">
                                <p><?php echo $memTotal; ?></p>
                                <div>
                                    <p><?php echo $memNoRev; ?></p>
                                    <p><?php echo $mem1rev; ?></p>
                                    <p><?php echo $memAllRev; ?></p>
                                </div>
                                <p><?php echo $resTotal; ?></p>
                                <div>
                                    <p><?php echo $resApproved; ?></p>
                                    <p><?php echo $resUnapproved; ?></p>
                                </div>
                                <p><?php echo $numRev; ?></p>
                            </div>
                        </div>
                        <hr />
                        <div class="row" style="margin-left: 0;">
                            <h3 style="color: black;">Unapproved Restaurant Entries</h3>
                            <div style="margin-bottom: 15px;">
                                <div style="float: left; width: 210px;">
                                   <h3>Restaurant 1</h3>
                                      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut ...</p>
                                </div>
                                <div style="float: left; width: 210px; margin-left: 30px;">
                                  <h3>Restaurant 2</h3>
                                  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut ...</p>
                                </div>
                            </div>
                            <p style="float: right; margin-bottom: 0px;"><a class="btn" href="reviewentry3.php">Approve restaurant entries »</a></p>
                        </div>
                        <hr />
                        <div class="row" style="margin-left: 0;">
                            <h3 style="color: black;">Approved Restaurant Entries</h3>
                            <div style="margin-bottom: 15px;">
                                <div style="float: left; width: 210px;">
                                   <h3>Restaurant 1</h3>
                                      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut ...</p>
                                </div>
                                <div style="float: left; width: 210px; margin-left: 30px;">
                                  <h3>Restaurant 2</h3>
                                  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut ...</p>
                                </div>
                            </div>
                            <p style="float: right; margin-bottom: 0px;"><a class="btn" href="viewallrestaurant.php">Modify/delete restaurant entries »</a></p>
                        </div>
                        <hr />
                        <h3 style="color: black;">Restaurant Reviews</h3>
                        <div style="margin-bottom: 15px;">
                            <div style="float: left; width: 210px;">
                               <h3>Review 1</h3>
                                  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut ...</p>
                            </div>
                            <div style="float: left; width: 210px; margin-left: 30px;">
                              <h3>Review 2</h3>
                              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut ...</p>
                            </div>
                        </div>
                        <p style="float: right; margin-bottom: 0px;"><a class="btn" href="deletereview.php">See All Reviews »</a></p>
            <?php
					} else if($_SESSION['AccessRights'] == "Member")
						echo "Access denied.";
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