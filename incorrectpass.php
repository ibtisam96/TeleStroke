<!Doctype html>
<?php
session_start();
if (isset($_SESSION["role"]))
{
	switch ($_SESSION["role"]) {
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

<html style="  height: 100%;">
<head>
<title>Login</title>

 <link rel="stylesheet" type="text/css" href="Telestroke.css">
  </head>

<body id="loginpage">

<header>
	<div id="logocontainer">
	<img id="logo" src="images/Logo.png" width=100px height=100px>
	</div>
</header> 

<br><br><br>
<div style="height: 50%">
<div id="logincontainer" align="center">
	<img src="images/logo.png" width="200" height="200">
	<div style="margin:0 auto; padding: 20px; max-width: 80%; color: white; background-color: #d09090; word-wrap: break-word; 	font-family: Arial, Helvetica, sans-serif;">
		The user name or password you entered are wrong please try again
	</div><br>
	<table border ="0" align="center">
		<tr><td><form action="Login_.php" method="post"><label>User name</label></td>
			<td><input type="text" name="username"></td></tr>
		<tr><td><label>Password</label></td>
			<td><input type="password" name="password" required placeholder="Enter Password"
    oninvalid="this.setCustomValidity('You Should Enter a Password')"
    oninput="setCustomValidity('')"></td></tr>
		<tr><td colspan="2" align="center"><br><input type="submit" value="Login" id="button">
			<input type="button" onclick="window.location.href='help.html'" value="Cancel" id="button"></td></tr>
		<tr><td colspan="2" align="center"><a href="forgotpass.html" id="loginlink"><br>Forgot password </a></td></tr></form>
	</table>
<br><br>
</div>
</div>



</body>
</html>