<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<title >Real Icecream Store</title>
  	<link rel="stylesheet" href="backpage.css">
  	<style type="text/css">
		ul li a:hover
{
	transition:all 1s;
	background-color: white;
	color: red;
	box-shadow: 10px;
	border-radius: 10px;
	
}
ul
{
	height:45px;
	margin-left:40px;
    
}
ul li
{
	
	width:95px;
	display: inline-block;
	height: 46px;
	line-height:47px;
	text-align: center;	
	margin-left:10px;
	background:#f2f2f2;
	font-size:17px;

}
ul li a
{
	color:white;
	display: block;
	text-decoration: none;
	font-size: 17px;
	font-family: monospaceslider; /*'Varela Round', sans-serif;*/
	background-color:#ff66cc;

}

	</style>
</head>
<body>
<div id="admin">
<p >Real Icecream Cart</p> 
</div>
<div id="section1">
	<?php 

	 ?>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="StoreIndex.php">My store</a></li>
		</ul>
	</nav>
<?php 
$conn = new mysqli("localhost","root","","gardenmaster");
if($conn->connect_error)
{
	die("Connection Fai	led".$conn->connect_error);	
}
if (isset($_SESSION["username"])) 
{
	$user = $_SESSION["username"];
	$qry_slt_reg = "SELECT * FROM registration WHERE EMAIL = '$user' ";
	$row1 = mysqli_fetch_array($conn->query($qry_slt_reg));
	$cid = $row1["CID"];
	$cart = "cart";
	$cartname = $cart.$cid;
	// $qry_selt_cart = "SELECT * FROM $cartname";
	$res = mysqli_query($conn,"SELECT * FROM $cartname");
	
		echo "<br><br><p id='cart'>My Cart</p>";
		$sum = 0;
		if (mysqli_num_rows($res)==0)
	    {
	   		echo "<br><h4 style='text-align:center;'>No Item in cart</h4><br>";
	    }
	    else
	    {
		echo "<table width='97%' id='carttbl'>";
		
		echo "<tr>";
		echo "<td> Name</td>";		
		echo "<td>Quentity</td>";
		echo "<td> Price</td>";
		echo "<td >Action</td>";		
		echo "<td >Action</td>";
		echo "</tr>";
		
		
			while ($row = mysqli_fetch_array($res))
			{
				echo "<tr>";
				
				$crtid = $row["CRTID"];
				//echo "<form method='post' action='cart.php>";
				echo "<td>'".$row["INAME"]."'></td>";
				// echo "<td><input type='text' size='1px' value='".$row["QTY"]."'></td>";
				// echo "<td><input type='text' name='qty' style='width:30px;' value='".$row['QTY']."'required='true' maxlength='2'></td>";
				echo "<td>".$row["QTY"]."</td>";
				echo "<td>".$row["IPRICE"]."</td>";
				//echo "<input type='hidden' name='crtidd' value='".$row['CRTID']."'>";
				echo "<input type='hidden' value='".$row['IID']."' name='iid'>";
				echo "<input type='hidden' value='".$row['INAME']."' name='iname'>";
				echo "<input type='hidden' value='".$row['IPRICE']."' name = 'iprice'>";
				echo "<td ><a href='cart.php?crtid=$crtid'  id='link3' id='link2' style='padding:30px;'>Remove</a></td>";
				echo "<td ><a href='cart.php?recalculate=$crtid'  id='link3' style='padding:30px;'>Increase quentity</a></td>";
				echo "</tr>";			
			}	
			echo "</table>";									
			}
			if (isset($_GET["crtid"])) 
			{
				$crtid = $_GET["crtid"];
				$qry_sel_cart2 = "DELETE FROM $cartname WHERE CRTID = '$crtid'";
				if ($conn->query($qry_sel_cart2)) 
				{
					echo "<script>window.location.href='cart.php'</script>";
				}
			}													
			mysqli_free_result($res);
			$res = mysqli_query($conn,"SELECT * FROM $cartname");
			while($row = mysqli_fetch_array($res))
			{				
				$s = $row["IPRICE"];
				$sum=$sum+$s;
			}
			
			
			
			if (isset($_GET['recalculate'])) 
			{				
				$crtid = intval($_GET['recalculate']);				

				$user = $_SESSION["username"];				
	            $qry_slt_reg = "SELECT * FROM registration WHERE EMAIL = '$user' ";
	            $row1 = mysqli_fetch_array($conn->query($qry_slt_reg));
	            $cid = $row1["CID"];				
				
				$cart = "cart";
	            $cartname = $cart.$cid;	            	            
				$qry_slt_cart2 = "SELECT * FROM $cartname WHERE CRTID='".$crtid."'";
				$row3 = mysqli_fetch_array($conn->query($qry_slt_cart2));
				echo "<form action='update.php' method='post'>";
				echo "<table style='margin-left:40px;'>";
				echo "<tr>";
				
				echo "<td><input type='text' value='".$row3['QTY']."' name='qty2'></td>";
				// echo  "<input type='hidden' value='".$row['IID']."' name='iid'>";
				// echo  "<input type='hidden' value='".$row['INAME']."' name='iname'>";
				echo "<input type='hidden' value='$crtid' name='crtid'>";
				echo  "<input type='hidden' value='".$row3['IPRICE']."' name='iprice'>";
				echo  "<td><input type='submit' name='update' value='update'></td>";
				echo  "</tr>";
				echo  "</table>";
				echo  "</form>";
				
				// if (isset($_POST['update'])) {
				// 	echo "<script>alert('Hello world')</script>";					
				// }











						// if(isset($_POST['update']))
						// {
						// $conn->query("UPDATE $cartname SET QTY='3' WHERE CRTID='$crtid' ");		
					  	// $qty2 = $_POST['qty2'];
					  	// // $iid = $_POST['iid'];
					  	// // $iname = $_POST['iname'];
					  	// $iprice = $_POST['iprice']*$qty2;

					  	// $user = $_SESSION["username"];				
			     //        $qry_slt_reg = "SELECT * FROM registration WHERE EMAIL = '$user' ";
			     //        $row1 = mysqli_fetch_array($conn->query($qry_slt_reg));
			     //        $cid = $row1["CID"];
					  	// $cart = "cart";
	       //      		$cartname = $cart.$cid;  	
					  	// $qry_update_cart = " UPDATE $cartname SET QTY = '$qty2', IPRICE = '$iprice' WHERE CRTID='$crtid' ";
					  	// echo "<script>alert('submit button executed');</script>";
					  	// if($conn->query($qry_update_cart))
					  	// {
					  	// 	// echo "<script>window.location.href='cart.php'</script>";
					  	// 	echo "<script>alert('submit button executed');</script>";
					  	// 	die();
					  	// }					  	
					  	// else
					  	// {
					  	// 	die($conn->error);
					  	// 	echo mysql_error();
					  	// }
					  	// echo "<script>alert('submit button executed');</script>";								
						//}



	        }	        
		
}
echo "<p style='margin-left:40px;font-size:20px;'><br>Total Amount is : ".$sum."</p>";
 ?>
 <br>
 <br>
 <?php 
	if (mysqli_num_rows($res)==0)
	{
		// $cnt = mysqli_num_rows($res);
		// echo $cnt;
  ?>
 		<a href="orderpage.php" ><button disabled style="margin-left: 40px; padding: 10px;width: 200px;
  height: 50px;
  color: white;
  font-family: monospace;
  font-size: 20px;">Proceed to Order </button>	</a>
 		<?php 

 	}
 	else
 	{
 	// 		$cnt = mysqli_num_rows($res);
		// echo $cnt;
 	 		?>
 	 	<a href="orderpage.php"><button style="margin-left: 40px; padding: 10px; background-color:#ff66cc;width: 200px;
  height: 50px;
  color: white;
  font-family: monospace;
  font-size: 20px;border-radius: 10px;">Proceed to Order </button>	</a>
 	 	<?php 
 	 		} 	 		
 	 	 ?>
 	

 <br>
 <br>
 <div id="sec_service">	
<p style="font-size: 20px; font-size: 30px;">Your Service</p>
<?php 
				$user = $_SESSION["username"];				
	            $qry_slt_reg = "SELECT * FROM registration WHERE EMAIL = '$user' ";
	            $row1 = mysqli_fetch_array($conn->query($qry_slt_reg));
	            $cid = $row1["CID"];													            
	            $qry_slt_service = "SELECT * FROM SERVICE WHERE CID = '$cid'";

	            $rslt = mysqli_query($conn,$qry_slt_service);
	            if (mysqli_num_rows($rslt)==0)
	            {
	            	echo "<br><br><h4 style='text-align:center;'>No Service in service table</h4>";
	            }
	            else
	            {	            
	            echo "<table id='serv'>";
	            echo "<tr>";
	            echo "<td>Name</td>";
	            echo "<td>Phone</td>";
	            echo "<td>Address</td>";
	            echo "<td>Sevice</td>";
	            echo "<td>Service Date</td>";
	            echo "<td>Remove</td>";
	            echo "<td>Status</td>";
	            echo "</tr>";	            
	            while( $row4 = mysqli_fetch_array($rslt))
	            {
	            	echo "<tr>";
	            	$tid = $row4['TID'];
	            	echo "<td>".$row4['NAME']."</td>";
	            	echo "<td>".$row4['PHONE']."</td>";
	            	echo "<td>".$row4['ADDRESS']."</td>";
	            	echo "<td>".$row4['SERVICE']."</td>";
	            	echo "<td>".$row4['SDATE']."</td>";
	            	echo "<td><a style='text-decoration:none;' href='cart.php?tid=$tid' id='link3'>Remove</a></td>";	
	            	echo "<td>".$row4['STATUS']."</td>";
	            	echo "</tr>";

	            }
	            echo "</table>";
	            if(isset($_GET['tid']))
	            {
	            	$tid = $_GET["tid"];
					$qry_del_serv = "deaggregate(object)LETE FROM SERVICE WHERE TID = '$tid'";
					if ($conn->query($qry_del_serv)) 
					{
						echo "<script>window.location.href='cart.php'</script>";
					}
	            }
	            }
	            echo "<br><br><br>";

 ?>
 </div>
</div>	

</body>
</html>
<style>
	
	body
	{
		margin:auto;		
		padding:auto;
		background-image: url("image/backg.jpg");
	}
	#sec_service
	{
		margin-left: 40px;
	}
	table{
		border-collapse: collapse;

		border: 1px solid white;		
	}
	#serv td
	{
	/*	border: 1px solid black;*/
		padding: 10px 30px;
		margin-left: 40px;
	}
	#admin
	{	
		margin:auto;
		padding:auto; 
		font-size: 40px;
		text-align: left;
		min-width: auto;
		max-width: auto;
		margin-left: 25px;
		width: 1310px;
		height:110px;
		background-color:#ff66cc;	
		background-image: url("image/header.jpg");
		color:white;
		box-shadow: 0px 0px 15px #888888;
	}
	#section1
	{
		margin:auto;
		padding:auto;
		min-height:570px;
		background-color: white;
		width: 1310px;
		height:100%;
		margin-left: 25px;
		background-image: url("image/sec2img.jpg");
		box-shadow: 0px 0px 15px #888888;	
	}
	p{
	display: inline-block;
	margin-top:30px;
}
#cart{
	margin-top: 20px;
	font-size: 30px;
	margin-left: 40px;
	text-align: center;
}
td{
	border: 0px solid black;
	height: 60px;
	font-size: 20px;
	font-family: monospace;

}
#menu{
	display: inline;
	font-family: monospace;

}
#mnubtn{
	padding: 10px 25px;	
	display: inline;
	text-decoration: none;	
	border: none;
	margin-right: 10px;
	background-color:  #0066ff;
	box-shadow: 0px 10px 15px #888888;	
}
#mnubtn:hover{
	cursor: pointer;
	color:white;
	background-color: #0040ff;
	box-shadow: 5px 15px 15px #888888;	
	border:none;
}
a{
	text-decoration: none;
}
#carttbl{
	margin-left: 40px;
}
#link3
{
	font-size: 20px;
	text-decoration: none;
	color: black;
}
#link3:hover
{
	font-size:20px;
	text-decoration: none;
	color:red;
}
</style>