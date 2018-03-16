<!Doctype html>
<?php
session_start();
if (isset($_SESSION["role"]))
{
	switch ($_SESSION["role")] {
    case "Admin":
        header("Refresh: 0; URL=Admin/admindash.php");
        break;
    case "Hub":
        header("Refresh: 0; URL=Hub/home.php");
        break;
    case "Spoke":
        header("Refresh: 0; URL=Spoke/home.php");
        break;
    default:
        header("Refresh: 0; URL=logout.php");
}
}
?>

<html>
<head>
<title>Login</title>

 <link rel="stylesheet" type="text/css" href="Telestroke.css">
  </head>

<body id="loginpage">

<header>
<div id="logocontainer">
<img id="logo" src="images/Logo.png" width=100px height=100px>
<img id="helpbutton" src="images/help.png" align="right">
</div>
</header> 
<div style="height: 50%">
<div id="logincontainer" align="center">
	<img src="images/logo.png" width="200" height="200">
	<div style="margin:0 auto; padding: 20px; max-width: 80%; color: #31636e; background-color: #ddf2f8; word-wrap: break-word; 	font-family: Arial, Helvetica, sans-serif;">
		Enter your staff ID and email to recive a link allowing you to reset your password.
	</div><br>
<table border ="0" align="center">
	<tr><td><form action="UserLogin.php" method="post"><label>Staff ID </label></td>
		<td><input type="text" name="username" style="width: 100%"></td>
	</tr>
	<tr><td><label>E-mail </label></td>
		<td><input type="email" name="email" style="width: 100%"></td></tr>
	<tr><td colspan="2" align="center"><br><input type="submit" value="Request reset" id="resetbutton"></td></tr></form>
</table>
<br>
<a href="login.html" id="loginlink" "> Go back to login </a>
</div>
</div>

</body>
</html>