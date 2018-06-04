<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ice Cream Order</title>
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
<p>order page </p> 
</div>
<div id="section1">
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="StoreIndex.php">My store</a></li>
		</ul>
	</nav>
	<?php 
	if(isset($_SESSION["username"]))
	{
	
		echo "<table align=center id='orderform'>";
		echo "<form action='orderpage.php' method='POST' >";
		echo "<tr>";	
		echo "<td>NAME</td>";
		echo "<td><input type='text' name='name' required  size='40%' placeholder='Enter your name'></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>PHONE</td>";	
		echo "<td><input type='text' name='phone' required maxlength='10' minlength='10' placeholder='Enter your phone number'></td>";
		echo "</tr>";	
		echo "<tr>";
		echo "<td>EMAIL</td>";
		echo "<td><input type='text' name='email' required size='40%' placeholder='Enter your Email'></td>	";
		echo "</tr>";
		echo "<tr>";
		echo "<td>ADDRESS</td>";
		echo "<td><input type='text' name='address' required  style='height: 50px;' size='40%'  placeholder='Enter your Shipping Address'></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Payment Mode</td>";
		echo "<td>
		<select id='boxstyle' id='' name='Payment' required='required'>
		<option value='-1'>-----Select-----</option>

		<option value='COD'>COD</option>
		<option value='not'>Online Payment not aviable</option></td>";
		echo "</tr>";

		echo "<tr>";
		echo "<td colspan='2'><input class='button' type='submit' value='Order Now' name='submit'></td>";
		echo "</tr>";
		echo "</form>";
		echo "</table>";				
			$conn = new mysqli("localhost","root","","gardenmaster");
			if($conn->connect_error)
			{
				die("connection failed".$conn->connect_error);
			}
			if (isset($_POST["submit"]))
			{			
				$user = $_SESSION["username"];
				$qry_slt_reg = "SELECT * FROM registration WHERE EMAIL = '$user' ";
				$row1 = mysqli_fetch_array($conn->query($qry_slt_reg));
				$cid = $row1["CID"];
				$cart = "cart";
				$cartname = $cart.$cid;
				$qry_slt_cart = "SELECT * FROM $cartname";
				$res = mysqli_query($conn,$qry_slt_cart);
				$itmnm;
				
				$name = $_POST["name"];
				$phone = $_POST["phone"];
				$email = $_POST["email"];
				$address = $_POST["address"];
				$Payment = $_POST["Payment"];
				$qry_insrt_order = "INSERT INTO ordertable (CID,NAME,PHONE,EMAIL,ADDRESS,Payment) VALUES ('$cid','$name','$phone','$email','$address','$Payment')";
				$last_count = 0;
				if($conn->query($qry_insrt_order))
				{										
					while ($row=mysqli_fetch_array($res))
					{
						$crtid = $row["IID"];
						$iqty = $row['QTY'];
						$qry_slt_stor = "SELECT * FROM STORE WHERE IID = '$crtid'";
						$row2 = mysqli_fetch_array($conn->query($qry_slt_stor));
						$qntity = $row2['IQTY']-$iqty;
						$qry_update_store = "UPDATE STORE SET IQTY = '$qntity'  WHERE IID = '$crtid'";	
						if(!$conn->query($qry_update_store))
						{
							mysql_error();
							die($conn->error);
						}

					}
					echo "<script>alert('your oder is placed');</script>";
					echo "<script>window.location.href='index.php'</script>";
				}
			}
	}
	else
	{
		echo "<script>window.location.href='servicedatabase.php'</script>";
	}
	mysqli_close($conn)	;
?>
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
	font-size: 20px;
	text-align: center;
}
td{
	border: 0px solid black;
	height: 40px;
}
#orderform{
	margin: 50px 50px;
	 margin-left: 31%;

}
#menu{
	display: inline;

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
 input[type=text], input[type=password] {
  width: 100%;
  padding: 10px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
#boxstyle
{
 width: 100%;
  padding: 10px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;	
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
.button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width:50%;
  opacity: 0.9;
}

.button:hover {
  opacity:1;
}
</style>