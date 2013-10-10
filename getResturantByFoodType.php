<?php
	session_start();
	
	$con = mysql_connect("sql102.byethost12.com","b12_13833487","hackers2");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("b12_13833487_123", $con);
for get r by food type
	
	$r_food_type = $_GET['foodType'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Restaurants</title>
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
            <a class="brand" class="has-sub " href="index.php">HungryGoMe</a>
            <ul>
               <li class='has-sub '><a href='#'><span>About</span></a></li>
               <li class='has-sub '><a href='#'><span>Restaurants</span></a>
                  <ul>
                     <li class='has-sub '><a href='#'><span>Food Type</span></a>
                        <ul>
                           <li><a href='getResturantByType.php?type=CHINESE'><span>Chinese</span></a></li>
                           <li><a href='getResturantByType.php?type=FAST FOOD'><span>Fast Food</span></a></li>
                           <li><a href='#'><span>French</span></a></li>
                           <li><a href='#'><span>Halal</span></a></li>
                           <li><a href='#'><span>Italian</span></a></li>
                           <li><a href='#'><span>Japanese</span></a></li>
                           <li><a href='#'><span>Korean</span></a></li>
                           <li><a href='#'><span>Thai</span></a></li>
                           <li><a href='#'><span>Vegetarian</span></a></li>
                           <li><a href='#'><span>Western</span></a></li>
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
                           <li><a href='#'><span>Bar</span></a></li>
                           <li><a href='#'><span>Bistro</span></a></li>
                           <li><a href='#'><span>Buffet</span></a></li>
                           <li><a href='#'><span>Café</span></a></li>
                           <li><a href='#'><span>Fast Food</span></a></li>
                           <li><a href='#'><span>Food Court</span></a></li>
                           <li><a href='#'><span>Restaurant</span></a></li>
                           <li><a href='#'><span>Others</span></a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li><a href='#'><span>Contact Us</span></a></li>
               <li><!-- search form -->
                    <form style="margin-top: 10px; margin-bottom: 0; margin-left: 20px; margin-right: 20px;" id="form1" name="form1" method="post" action="search_text_results.php">
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
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="adjusted">
          <img src="Images\food.jpg" alt="food" width="1000">
      </div>
      <div class="hero-unit">
        <h1>Featured Review</h1>
        <p>Can we pull information from a review and put it here?
        <br/>
            <br />Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis ...
        </p>
        <p><a class="btn btn-primary btn-large" href="#">Read more »</a></p>
      </div>
      	  <div class="row" style="text-align: center; padding: 0px;">
            <div style="display: inline-block; text-align: left; padding: 30px; background-color: #eeeeee; border-radius: 6px;">
                <h1 style="color: black; margin-top: 0;"><?php echo $r_food_type; ?> Restaurants:</h1>
				<?php
                     echo "<table border='2' cellpadding='5'>
                          <tr>
                              <th style='color: black;'>Number</th>
                                  <th style='color: black;'>Restuarant</th>
                                  <th style='color: black;'>Restaurant Type</th>
                                  <th style='color: black;'>Region</th>
                                  <th style='color: black;'>Address</th>
                                  <th style='color: black;'>Reviews</th>
                          </tr>";
                    
                    $rs = mysql_query("CALL get_resturant_by_food_type('$r_food_type');");
                    $rownum = 1;
					while($row1 = (mysql_fetch_assoc($rs)))
					{
						$stall_name = $row1['stall_name'];
						
						echo "<tr>";
						echo "<td>" . $rownum . "</td>"; $rownum++;
						echo "<td>" . $row1['stall_name'] . "</td>";
						echo "<td>" . $row1['rt_name'] . "</td>";
						echo "<td>" . $row1['region'] . "</td>";
						echo "<td>" . $row1['address'] . "</td>";
						echo "<td><a href='viewResturantReview.php?stall_name=$stall_name&address=" . $row1['address'] . "'>View Reviews</a></td>"; 
					}
					echo "</table>";

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