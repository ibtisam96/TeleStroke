<!Doctype html>
<?php
session_start();
if ($_SESSION["role"]!="Admin") {
  header("Refresh: 0; URL=../unauthorized.php");
}
?>
<html>
<head>
<title>Add staff</title>

 <link rel="stylesheet" type="text/css" href="../Telestroke.css">
 <style type="text/css">
 	
 	td 
{
    text-align:right; 
    vertical-align:middle;

}
 </style>
  </head>

<body>

<header>
<div id="logocontainer">
<a href="admindash.php"><img id="logo" src="../images/Logo.png" width=100px height=100px></a>
<a href="../logout.php"><img id="helpbutton" src="../images/help.png" align="right"></a> 
</div>

</header> 

<div>
	<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%; height:100%">
  <h3 class="w3-bar-item">Add Staff</h3>
  <a href="helpreport.php" class="w3-bar-item w3-button">Control</a>
  <a href="hospitalstaff.php" class="w3-bar-item w3-button">Staff</a>
  <a href="sessions.php" class="w3-bar-item w3-button">Sessions</a>
</div>
<div id="mainwindow" style="width:85%;   float:right;">
	
<br><br>
<table align='center'>
<tr>
<h1>Add staff</h1>
<form action="addstaff.php" method="post">
</tr>
<tr><td>	
<label>Staff ID: </label>
</td>
<td>
<input type="text" name="staffid" style="width: 100%" >
</td>
</tr>
<tr>
	<td><label>First Name: </label></td>
	<td><input type="text" name="name1" style="width: 100%"></td>
</tr>
<tr>
	<td><label>Last Name: </label></td>
	<td><input type="text" name="name2" style="width: 100%"></td>
</tr>
<tr>
	<td><label>Role: </label></td>
	<td><select name="role" style="width: 100%">
  <option value="Nurse">Nurse</option>
  <option value="Neurologist">Neurologist</option>
  <option value="IT">IT</option>
  <option value="General Practitioner">General Practitioner</option>
	</select></td>
</tr>
<tr>
	<td><label>Gender: </label></td>
	<td><select name="gender" style="width: 100%">
	<option value="Male">Male</option>
 	<option value="Female">Female</option>
	</select></td>
</tr>
<tr>
	<td><label>Phone number: </label></td>
	<td><input type="text" name="phoneno"  style="width: 100%"></td>
</tr>
<tr>

	<td><label>Hospital: </label></td>
	<td><select name="hospital_id" style="width: 100%">
<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Telestroke";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$SQLstring="SELECT * From Hospital";
	$QueryResult=mysqli_query($conn,$SQLstring)
	Or die ("<p>Unable to access the database<br> Please try again later or contact the admin</p>");


	do {
		echo "<option value='{$Row[0]}'>{$Row[1]}</option>";
	$Row=mysqli_fetch_row($QueryResult);
	} while($Row);
?>
		</select>
		</td>
</tr>
<tr>
	<td><label>Email: </label></td>
	<td><input type="text" name="email" style="width: 100%"></td>
</tr>
<tr>
<td align='right' colspan='2' >
<input type="submit" name="Addstaff" value="Add staff" id="button">
<input type="button" onclick="window.location.href='hospitalstaff.php'" value="Cancel" id="button"></form>
</td>
</tr>
</table>
</div>


</div>



<footer ID="thefooter">
<br>
<br>
</footer>

</body>
</html>