<!Doctype html>
<html>
<head>
<title>Sakura Restuant</title>

 <link rel="stylesheet" type="text/css" href="Sakura.css">
  </head>

<body>

<header>
<div id="logocontainer">
<img src="Logo.png" width=500px height=200px>
</div>
 <ul class="navigate" id="navigation">
    <li><a href="Home.html">Home</a></li>
        <li><a href="Branches/Branches.html">Branches</a></li>
         <li><a href="displaymenu.php">Menu</a></li>
       <li><a href="UserSignup.html">Sign Up</a> / <a href="login.html">Log in</a></li>
  </ul>
</header> 
<?php
session_start();
if(session_destroy()) 
{

	 	echo "<br><br><br><div style=' display: table; margin-right: auto; margin-left: auto; background-color:#eaeaea; radius:20px;'><p style='text-align:center;'> You have been logged out<br>You will be redirected soon to the home page or <a link href='Home.html'>click here<a></p></div>";

header("Refresh: 5; URL=Home.html"); 

}
?>
</html>
