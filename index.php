<?php
session_start();
?>
<!doctype html>
<html>
	<head>
    <meta charset="utf-8">
		<title >Real Icecream</title>
   
		<link rel="stylesheet" type="text/css" href="GMstyle.css">
      <link rel="stylesheet" type="text/css" href="login.css">
      <style >
        
        *
        {
          padding: 0px;
          margin: 0px;
        }

      </style>
	</head>      
      <body>
          
         <?php

          if(isset($_SESSION["email"]))
           {   
              echo "<h1 style='float:right; font-size:40%;'><a style='text-decoration:none; color:black; 2px;font-family:monospace'> Hi,".$_SESSION["email"]."</a></h1>";
              echo "<a  style='margin-left:30%;
              margin-top: 13%;
              position: absolute;
              font-size: 50%;
              text-decoration: none;' href='logout.php'><button class='btnlog' style='width:100px;position:relative;right:50px;height:30px;background-color: #f4511e;border:none;top:-6px;cursor: pointer;color:white;'>Logout</button></a>";
            }
     ?>
        <div id="slider-container">
          <img class="slides" src="image/slide2.jpg">          
            <img class="slides" src="image/slide3.jpg">
            <img class="slides" src="image/slide4.jpg">
              <img class="slides" src="image/real.jpg">
              <img class="slides" src="image/abc.jpg">
                  <button class="btn" onclick="plusIndex(-1)" id="btn1">&#10094;</button>
                  <button class="btn" onclick="plusIndex(1)" id="btn2">&#10095;</button>

      </div>	     
       <div class="header">
            <img id="plant" " src="image/ice-cream.png">
              
                <h3 style="margin-top: 10px;font-family:fantasy; margin-top:-204px;font-family: fantasy;padding: 15px;margin-left: 69px;color:white;line-height:293px;margin: -227;font-size: 40px;">Real Icecream</h3>
                <div >

<!-- login page code -->
                <?php
                  if(!isset($_SESSION["username"])){
                ?>
                <div class="login-container">
                
                  <table>
                    <tbody>
                      <tr>
                        <td style="font-size:13px;font-family: monospace;color: white">Email Id</td><td style="font-size: 13px;font-family: monospace;color: white">Password</td>
                      </tr>
                      <tr>                                              
                        <form  action="login.php" onsubmit="return logsubmit()" method="POST" name="login_form">
                        <td><input type="email" name="loguname" id="loguname" style="height:20px;margin-right:5px;" ></td>
                        <td><input type="Password" name="logupass" id="logupass" style="height:20px;" ></td>
                        <td  ><input id="btn123" type="submit" name="lsubmit" value="Login" ></td>
                        </form>
                      </tr>
                      <tr>
                        <td><a style="text-decoration: none;color:black;" href="signup.php"><h4 style="font-family: 'monospace'; font-size:14px;color: white">Register</h4> </a></td>
                        <td><h4 style="font-family:'monospace';font-size:14px;color: white">Forgetten Password?</h4></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <?php
                }
                else
                {
             echo "<h1 style='margin:-200px 0px;float:right; font-size:20px; margin-right:4px;'><a href = 'profile.php' style='text-decoration:none; color:black;border:1px black solid; border-radius: 2px;'> Hi ".$_SESSION["username"]."</a></h1>";
                }
                ?>
      </div>              
             </div>              
             <div class="nav">
             <div class="nav-style">
             <ul>
                  
                  <li><a href="index.php">Home</a></li>
                  <li><a href="service.php">Services</a></li>                  
                  <li><a href="StoreIndex.php">Product</a></li>
                  <li><a href="gallery-index.php">Gallery</a></li>
                  <li><a href="about.php">About Us</a></li>
                  <li><a href="contactusstyle.php">Contact Us</a></li>
                  
               </ul>
              </div>
            </div>
      </div>
  

  

	</body>

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









    var Index = 1;
    function plusIndex(n)
    {
    Index = Index + n ;
    showimage(Index);
    }
    showimage(1);
    function showimage(n)
    {
      var i;
      var x = document.getElementsByClassName("slides");
      if(n > x.length) {Index = 1};
      if(n < 1) {Index = x.length};
       for(i=0;i<x.length;i++)
          {
            x[i].style.display="none";
          }
           x[Index - 1].style.display="block";
       }

        autoslide();

        function autoslide()
        {
          var i;
          var x = document.getElementsByClassName("slides");
          for(i=0;i<x.length;i++)
          {
            x[i].style.display="none";
          }
          if(Index > x.length){Index=1}
           x[Index - 1].style.display="block";
          Index++;
          setTimeout(autoslide,2500);
         }
  </script>
  </div >
  <hr class="style1">
 
  <div id="block2">
 <div class ="most-top">

    <div id="block3">
  <span> <img  class="image" src=" images/services.png" onmouseover="src='images/services1.png'" onmouseout="src='images/services.png'"</span> 
  <dl>

    <a name="top"></a>
      <dt  style="font:25px;font-family: fantasy;color:black;">Excellent Services:</dt>
      <dd>We provide excellent services such as online garden stuff  selling,fast delivery, book your appointment for gardening.</dd>
  </dl>
  
    </div>
    <div id="block3">
      <span><img class="image" src=" images/cuter.png" onmouseover="src='images/cuter1.png'" onmouseout="src='images/cuter.png'"</span>        
      <dl>
      <dt  style="font:25px;font-family: fantasy;color:black;">Insured Operators:</dt>
  <dd>All of our staffs are fully insured, and undergo regular training and refresher courses.Operators have proper ID proof.</dd>
  </dl>
    </div>
   </div>
   <div id="block2">
    <div class ="most-top">
    <div id="block3">
      <span> <img  class="image" src=" images/excellent.png" onmouseover="src='images/excellent1.png'" onmouseout="src='images/excellent.png'"</span> 
  <dl id="dl">
      <dt style="font:25px;font-family: fantasy;color:black;">Satisfied Customers:</dt>
  <dd>Customer satisfaction is at the core of human experience, reflecting our liking of a company’s business activities.</dd>
  </dl>
  
    </div>
    <div id="block3">
      <span> <img  class="image" src=" images/work.png" onmouseover="src='images/work1.png'" onmouseout="src='images/work.png'"</span> <img src="images/why.jpg" style="width:400px;height:200px;margin-top:-291px;margin-left:-985px";>
      <dl>
      <dt  style="font:25px;font-family: fantasy;color:black;">Guaranteed Work:</dt>
  <dd>We guarantee that the work done by our workers is  standard level and our product quality is also very fine</dd>
  </dl>

    </div>
  </div>
   </div>
 </div>
</div>
<div>
<div style="background-color: #564c29" id="excellent-service">      
       <img style="width: 50%;height: 80% ;margin-top: 50px;margin-left: 20px;" src="image/2.jpg" alt="excellent-service"> 
       
      <div style="margin-left: 700px;margin-top: -430px;font-size: 14px;color: white;font-family: monospace;text-align: justify;width: 640px;">
  <p>The company started offering local search services in 1996 under the Justdial brand and is now the leading local search engine in India. The official website www.justdial.com was launched in 2007. Justdial's search service is available to users across multiple platforms, such as the internet, mobile Internet, over the telephone (voice) and text (SMS). Justdial's search service bridges the gap between the users and businesses by helping users find relevant providers of products and services quickly, while helping businesses listed in Justdial's database to market their offerings.Justdial has also initiated its ‘Search Plus’ Services for the users. These services are aimed at making several day-to-day tasks conveniently actionable and accessible to the users. With this step, Justdial is transitioning from being purely a provider of local search and related information to being an enabler of such transactions
  The company started offering local search services in 1996 under the Justdial brand and is now the leading local search engine in India. The official website www.justdial.com was launched in 2007. Justdial's search service is available to users across multiple platforms, such as the internet, mobile Internet, over the telephone (voice) and text (SMS). Justdial's search service bridges the gap between the users and businesses by helping users find relevant providers of products and services quickly, while helping businesses listed in Justdial's database to market their offerings.Justdial has also initiated its ‘Search Plus’ Services for the users. These services are aimed at making several day-to-day tasks conveniently actionable and accessible to the users. With this step, Justdial is transitioning from being purely a provider of local search and related information to being an enabler of such transactions. Justdial intends to provide an online platform to thousands of SME’s to get them discovered and transacted..</p>
</div>
</div>

</div>
<div style="background-color:#00e5e6;" id="All-Quotes-Free">
  <img src="image/5599844f30dde8f07c226c329761cea8.gif" style="width:50%;height:90%;margin-top: 20px;" >
<div style="margin-left:10px;margin-top:100px;font-size: 17px;color: white;font-family: monospace;text-align: justify;width: 640px;">
  <p>The company started offering local search services in 1996 under the Justdial brand and is now the leading local search engine in India. The official website www.justdial.com was launched in 2007. Justdial's search service is available to users across multiple platforms, such as the internet, mobile Internet, over the telephone (voice) and text (SMS). Justdial's search service bridges the gap between the users and businesses by helping users find relevant providers of products and services quickly, while helping businesses listed in Justdial's database to market their offerings.Justdial has also initiated its ‘Search Plus’ Services for the users. These services are aimed at making several day-to-day tasks conveniently actionable and accessible to the users. With this step, Justdial is transitioning from being purely a provider of local search and related information to being an enabler of such transactions.</p>
</div> 

</div>
 
<!-- <a href="#top"> Go to To</a> -->
 <footer style="background-color:red;">
                    <div style="background-color:red;height: 190px;margin-top: -24px;"  class="first-section">
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
                    <p style="margin-top: 10px; font-size:12px; color: white;font-family: 'PT Sans Narrow', sans-serif;">The company started offering local search services in 1996 under the Justdial brand and is now the leading local search engine in India. The official website www.justdial.com was launched in 2007.</p>
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

</html>