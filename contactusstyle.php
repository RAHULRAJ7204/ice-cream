<!DOCTYPE html>
<html>
<head>
	<title>Contact-Us</title>
	<link rel="stylesheet" type="text/css" href="contactusstyle.css">
</head>
<body>
	<div class="header">
		<div style="position: relative;height: 160px;width: 100%; background-color: red;" class="header">
		
		<img style="width: 100%;" src="image/header.jpg">
		<h1 style="position: relative;
    margin-top: -107px;
    color: white;
    margin-left: 105px;
    font-size: 41px;
    font-family: monospace;"><a style="text-decoration: none;color: white" href="index.php">Real Icecream</a></h1>
	</div>
	</div>
	
	<div action="contactusstyle.php" method="POST" class="form">
		<h3 style="margin-left:65px;margin-bottom: 35px; font-size:22px;font-family: 'Indie Flower', cursive;color:black;"><u>Contact form</u></h3>
		<form method="POST" action="contactusstyle.php">
		<table align="centre" style="margin-left: 12px;">
			<tr>
				<td><label><b>Your Name</b></label>
		    <input style="margin-left: 10px;" type="text" placeholder="Name" name="name" required></td>
			</tr>
			
			<tr>
				<td><label><b>Email</b></label>
		    <input style="margin-left: 42px;" type="text" placeholder="Enter Email" name="email" required></td>
			</tr>
			<tr>
				<td><label><b>Phone-No</b></label>
		    <input style="margin-left: 12px;" type="number" placeholder="Phone-No" name="phone" required></td>
			</tr>
			<tr>
				<td><label><b>Message</b></label>
		     
			</tr>
			<TR>
				<td><textarea name="message" rows="4" cols="40">
		    	
		    </textarea></td>
			</TR>
		</table>
		<div class="clearfix">
        <button type="submit" name="submit" class="submit">submit</button>
       
      </div>

		
	</div>
	</form>
	<?php
error_reporting();
$localconnect = new mysqli("localhost", "root", "", "gardenmaster");
  if($localconnect->connect_error)
  {
    die("connection failed". $localconnect->connect_error);
  }
  else
  {
    
  }

?>


	<?php
if(isset($_POST["submit"]))
{

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$qry="INSERT INTO contactus(name,email,phone,message) VALUES('$name','$email','$phone','$message')";
if(mysqli_query($localconnect,$qry))  
{  
echo '<script>alert("Your messages are important for us")</script>'; 
echo "<script>window.location.href='index.php'</script>"; 
}  

}
?>

	<div class="Contacts">
		<table>
			<tr>
				<td><h3 style="font-size:20px;font-family: 'Oswald', sans-serif;color:#564d0e;">Contact </h3></td>
			</tr>
			<tr>
				<td><label>Telephone:+7300299330</label></td>
			</tr>
			<tr>
				<td><label>Email:realicream@gmail.com</label></td>
			</tr>
		</table>
		
	</div>
	
</body>
</html>