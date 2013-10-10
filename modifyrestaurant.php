<?php require_once('Connections/myConn.php'); ?>
<?php
session_start();

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  //$updateSQL = sprintf("UPDATE restaurant SET address=%s, region=%s, ft_name=%s, rt_name=%s, telephone_number=%s WHERE stall_name=%s",
  $updateSQL = sprintf("UPDATE restaurant SET region=%s, ft_name=%s, rt_name=%s, telephone_number=%s WHERE stall_name=%s AND address =%s",
  						//$_GET['address'],
           
                       GetSQLValueString($_POST['region'], "text"),
                       GetSQLValueString($_POST['ft_name'], "text"),
                       GetSQLValueString($_POST['rt_name'], "text"),
                       GetSQLValueString($_POST['telephone_number'], "text"),
					   GetSQLValueString($_POST['stall_name'], "text"),
					   GetSQLValueString($_POST['address'], "text"));
                       
					   //$_GET['stallname']);
					   

  mysql_select_db($database_myConn, $myConn);
  $Result1 = mysql_query($updateSQL, $myConn) or die(mysql_error());
  //$next = mysql_query("Select stall_name from restaurant order by submitDateTime LIMIT 1");
  //$updateGoTo = "updateentry.php".$next;
  $updateGoTo = "viewallrestaurant.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
$stname =$_GET['stallname'];
$stalladd = $_GET['address'];
mysql_select_db($database_myConn, $myConn);
$query_Recordset1 = "SELECT stall_name, address, region, ft_name, rt_name, telephone_number FROM restaurant WHERE stall_name = '$stname' AND address = '$stalladd' ";
$Recordset1 = mysql_query($query_Recordset1, $myConn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Restaurant</title>
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
                        <h1 style="color: black; margin-top: 0;">Edit restaurant</h1>
                        <h3><?php echo $row_Recordset1['stall_name']; ?></h3>
                        <h3><?php echo $row_Recordset1['address']; ?></h3>
                        <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
                          <table style="margin-top: 10px;">                            
                            <tr>
                              <td nowrap="nowrap" align="left">Region</td>
                              <td><input type="text" name="region" value="<?php echo htmlentities($row_Recordset1['region'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
                            </tr>
                            <tr valign="baseline">
                              <td nowrap="nowrap" align="left">Food Type</td>
                              <td><input type="text" name="ft_name" value="<?php echo htmlentities($row_Recordset1['ft_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
                            </tr>
                            <tr valign="baseline">
                              <td nowrap="nowrap" align="left">Restaurant Type</td>
                              <td><input type="text" name="rt_name" value="<?php echo htmlentities($row_Recordset1['rt_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
                            </tr>
                            <tr valign="baseline">
                              <td nowrap="nowrap" align="left">Telephone Number&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td><input type="text" name="telephone_number" value="<?php echo htmlentities($row_Recordset1['telephone_number'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
                            </tr>
                          </table>
                          <p style="float: right; margin-bottom: 0;"><input class="btn" type="submit" value="Update record" /></p>
                          <input type="hidden" name="MM_update" value="form1" />
                          <input type="hidden" name="stall_name" value="<?php echo $row_Recordset1['stall_name']; ?>" />
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
<?php
mysql_free_result($Recordset1);
?>
