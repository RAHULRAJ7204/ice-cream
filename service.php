<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
  	<link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" href="GMstyle.css">
  
  <script>
    
function logsubmit()
{
  var logun = document.getElementById("loguname");
  var logup = document.getElementById("logupass");
  if(logun.value == "")
  {
    alert("Please enter your username");
    return false;
  }
  else if(logup.value == "")
  {
    alert("Please enter your password");
    return false;
  }
  else
  {
    return true;
  }
}
</script>
</head>
<body>
  <div style="color: #ff66cc" class="header1">
              <img id="plant1" src="image/ice-cream.png">
             
              <h3 id="top-title1">
              <a  style="text-decoration: none; color:white;" href="index.php">                  
            Real Icecream
              </a>
              </h3>
              <?php
                if(!isset($_SESSION["username"]))
                {
                ?>

              <div class="login-container1">
                  <table>
                    <tbody style="margin-top: 10px;">
                      <tr>
                        <td style="font-size: 15px;font-family: fantasy;color:white;">Email Id</td><td style="font-size: 15px;font-family: fantasy;color:white;">Password</td>
                      </tr>
                      <tr>
                        <form  action="login.php" onsubmit="return logsubmit()" method="POST" name="login_form">
                        <td><input type="text" name="loguname" id="loguname" style="height:20px;margin-right:5px;"></td>
                        <td><input type="Password" name="logupass" id="logupass" style="height:20px;" placholder="Password"></td>
                        <td  ><input id="btn123" type="submit" name="lsubmit" value="Login"></td>
                        </form>
                      </tr>
      
                    </tbody>
                  </table>
                
              </div>

              <?php                                            
              }
              else
              {
                echo "<h1 style='margin:-200px px;float:right; font-size:20px; margin-right:4px;'><a href = 'profile.php' style='text-decoration:none; color:black;border:1px black solid; border-radius: 2px;'> Hi ".$_SESSION["username"]."</a></h1>";
              }
              ?>
      </div> 
      <div class="nav">
             <div class="nav-style" style="position: absolute;">
             <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="service.php">services</a></li>                  
                  <li><a href="StoreIndex.php">Product</a></li>
                  <li><a href="gallery-index.php">Gallary</a></li>
                  <li><a href="about.php">About Us</a></li>
                  <li><a href="contactus">Contact Us</a></li>
                  <?php
                    if(isset($_SESSION["username"]))
                    {
                      echo "<li><a href='cart.php'>cart</a></li>";
                      echo "<li><a href='logout.php'>Logout</a></li>";

                    }
                  ?>
               </ul>
              </div>
            </div>     
          <div id="main">
            <!-- <p style="text-align: center;">SERVICE LIST</p> -->
            <table width="95%" id="servicetable">
              <tr>
                <td style="background-color:#ffb3ff;" width="70%" >
                  <p style="font-family: monospace;color:slategray " id="servicetop">Franchise Oppartunities</p> 
                <p style="padding: 50px 50px ;color:slategray;text-align: justify;"> “Real Icecream is the world’s largest chain of ice cream specialty shops, and we believe there are significant growth opportunities for the brand. Our franchisees are the gateway to our success, and it is our top priority to support them and drive profitable growth in new and existing markets.”</p>
                </td>
                <td><img src="image/HeftyGreenAidi-max-1mb.gif" style="background-color:none" id="imgservice"></td>
              </tr>
              <tr>
                <td  width="70%">
                                          
                   <p style="font-family: monospace;color:slategray " id="servicetop">Super Market</p> 
                <p style="padding: 50px 50px ;color:slategray;text-align: justify;"> “Real Icecream is the world’s largest chain of ice cream specialty shops, and we believe there are significant growth opportunities for the brand. Our franchisees are the gateway to our success, and it is our top priority to support them and drive profitable growth in new and existing markets.”</p>
                  </td>
                <td><img src="image/6622ab37c6db6ac166dfec760a2f2939.gif" alt="" id="imgservice"></td>
              </tr>
              <tr>
                <td style="background-color:#ffb3ff;" width="70%">
                  <p style="font-family: monospace;color:slategray " id="servicetop">IceCream service</p> 
                <p style="padding: 50px 50px ;color:slategray;text-align: justify;"> “Real Icecream is the world’s largest chain of ice cream specialty shops, and we believe there are significant growth opportunities for the brand. Our franchisees are the gateway to our success, and it is our top priority to support them and drive profitable growth in new and existing markets.”</p>
                 
                                                    
                </td>
                <td><img style="background-color:white" src="image/b42b287ab055e1bfa894dda6b91f9319.gif" alt="" id="imgservice"></td>
              </tr>
              <tr>
                <td width="70%">
                  <p id="servicetop"></p> 
                  <p style="font-family: monospace;color:slategray " id="servicetop">General Retail</p> 
                <p style="padding: 50px 50px ;color:slategray;text-align: justify;"> “Real Icecream is the world’s largest chain of ice cream specialty shops, and we believe there are significant growth opportunities for the brand. Our franchisees are the gateway to our success, and it is our top priority to support them and drive profitable growth in new and existing markets.”</p>
                 
                  </td>
                    <td><img style="background-color: none" src="image/dribbble_4.gif" alt="" id="imgservice"></td>

                  </tr>
               
            </table>
            <a href="servicedatabase.php" style="text-align: right"><button id="requestbtn">Request</button></a>
          </div>














<footer style="background-color:red;">
                    <div style="background-color:red;height: 190px;margin-top: -15px;"  class="first-section">
                    <div style="margin-left:45px;">
                    <table>
                    <tr> 
                    <td><img src="images/location1.png" style="margin-left: 43px;margin-top:15px;" onmouseover="src='images/location.png'" onmouseout="src='images/location1.png'"> </td>
                    <td><p style="color:white;margin-top: 15px;margin-left: 15px;
                    font-size:16px; color: white;font-family: 'PT Sans Narrow', sans-serif;">E-city Bangalore India</p></td>
                    </tr>
                    <tr>
                    <td><img src="images/phone.png" style="margin-left: 43px;margin-top:14px;" onmouseover="src='images/phone1.png'" onmouseout="src='images/phone.png'"> </td> 
                    <td><p style="color:white;margin-top: 15px;margin-left: 15px;font-size:16px; color: white;font-family: 'PT Sans Narrow', sans-serif;">+917204266841</p></td>                   
                    </tr>
                    <td><img src="images/email.png" style="margin-left: 43px;margin-top:14px;" onmouseover="src='images/email1.png'" onmouseout="src='images/email.png'"> </td> 
                    <td><p style="color:white;margin-top: 15px;margin-left: 15px;font-size:16px; color: white;font-family: 'PT Sans Narrow', sans-serif;"><a href="realicecream@gmail.com" style="text-decoration: none; color: white;">realicecream@gmail.com</a></p></td>                   
                    </tr>
                    </table>
                    </div>
                    <div class="about-us">
                    <h1 style="font-size: 30px; font-family: 'Oswald', sans-serif;color:white;">About My Company</h1>
                    <p style="margin-top: 10px; font-size:12px; color: white;font-family: 'PT Sans Narrow', sans-serif;">The company started offering local search services in 1996 under the Justdial brand and is now the leading local search engine in India. The official website www.justdial.com was launched in 2007. </p>
                    <tr>
                    <td><img src="images/facebook1.png" style="margin-left:0px;margin-top:31px;" onmouseover="src='images/facebook.png'" onmouseout="src='images/facebook1.png'"> </td> 
                    <td><img src="images/instagram1.png" style="margin-left: 43px;margin-top:31px;" onmouseover="src='images/instagram.png'" onmouseout="src='images/instagram1.png'"> </td> 
                    <td><img src="images/twitter1.png" style="margin-left: 43px;margin-top:31px;" onmouseover="src='images/twitter.png'" onmouseout="src='images/twitter1.png'"> </td> 
                    <td><img src="images/share.png" style="margin-left: 43px;margin-top:31px;" onmouseover="src='images/share1.png'" onmouseout="src='images/share.png'"> </td> 

                    </tr>


                    </div>



                    </div>
                    <div class="second-section">


                    </div>


               </footer>
</body>
</html>
<style>
body
  {
    margin:auto;    
    background-image: url("image/backg.jpg");
  }
#main{
  font-size: 20PX;
}
#servicetable{
  border: 0px solid black;
  margin-left: 30px;
  margin-top: 20px;
}
#requestbtn{
  border:none;
  padding: 10px 15px;
  background-color: blue;
  margin-left: 32px;
  color:white;
  cursor: pointer;  
}
#requestbtn:hover{
  background-color: red;
  width:120px;
}
#servicetable tr:nth-child(odd) {
    background-color: #83bb22;
}
#servicetable tr:nth-child(even) {
    background-color: white;
}
#imgservice{
  margin-left: 10px;
  width:380px;
  height:300px;
}
#servicep{
  /*color:#83bb22;*/
}
#servicetop{
  font-size: 30px; text-align: center;  
}
#servicetable td:hover{
  /*background-color: blue;*/
  box-shadow: 0px 0px 30px black;
  /*color:white;*/  
}

</style>
<!-- style="background-color: #83bb22;" -->