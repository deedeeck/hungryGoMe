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
<title>Approve Restaurants</title>
<!--	<script type="text/javascript">
    function MM_jumpMenu(targ,selObj,restore){ //v3.0
      eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
      if (restore) selObj.selectedIndex=0;
    }
    function MM_jumpMenuGo(objId,targ,restore){ //v9.0
      var selObj = null;  with (document) { 
      if (getElementById) selObj = getElementById(objId);
      if (selObj) eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
      if (restore) selObj.selectedIndex=0; }
    }
    </script>	-->

<link href="../Member/styles/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
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
        <div style="display: inline-block; text-align: left; padding: 30px; background-color: #eeeeee; border-radius: 6px;">
            <?php
        		if(isset($_SESSION['MM_Username'])) {
					if($_SESSION['AccessRights'] == "Admin") {
			?>   
                <h1 style="color: black; margin-top: 0;">Approve Restaurant Entries</h1>
                <!-- form for approving entry by entry -->
                <form id="form2" name="form2" method="post" action="approvedentry3.php">
                
                <!-- table of restaurants and their info -->
                <?php
                    $result = mysql_query("SELECT * FROM restaurant where approve = 0 ");
                    $rownum = 1; // to count number of rows 
                    
                    echo "<table border='2' cellpadding='5'>
                        <tr>
                        <th style='color: black;'>Number</th>
                        <th style='color: black;'>Stall name</th>
                        <th style='color: black;'>Address</th>
                        <th style='color: black;'>Region</th>
                        <th style='color: black;'>Food type</th>
                        <th style='color: black;'>Restaurant type</th>
                        <th style='color: black;'>Approve</th>
                    </tr>";
                    
                    while($row = mysql_fetch_array($result)) // to collect data from database and put it into table
                    {
                       echo "<tr>";
                       echo "<td>" . $rownum . "</td>"; $rownum++;
                       echo "<td>" . $row['stall_name'] . "</td>";
                       echo "<td>" . $row['address'] . "</td>";
                       echo "<td>" . $row['region'] .  "</td>";
                       echo "<td>" . $row['ft_name'] . "</td>";
                       echo "<td>" . $row['rt_name'] . "</td>";
                       echo "<td>" . "<input type='checkbox' name='stall[]' value='" . $row['stall_name']."|".$row['address'] . "'>";
                    }
                    echo "</table>";
                ?>
                <p></p>
                <p><input class="btn" style="float: right;" type="submit" name="Submit" id="Submit" value="Approve" /></p>
                </form>
                
                <!-- form for approving all entries -->
                <form style="margin-bottom: 0px;" id="form1" name="form1" method="post" action="approvedentry3.php">
               <?php
               		$result1 = mysql_query("SELECT * FROM restaurant where approve = 0 ");     
					while($row = mysql_fetch_array($result1)) {
                    	echo "<input type='hidden' name='stall[]' value='" . $row['stall_name']."|".$row['address'] . "'>";
					 }
					mysql_close($con);
                ?>
                    
                <p style="margin-top: -10px; float: right;">		
                <input class="btn" style="margin-right: 10px;" type="submit" name="Submit" id= "Submit" value="Approve all" />
                </p>
                </form>
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