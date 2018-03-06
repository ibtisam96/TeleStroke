<?php
session_start();
?>
<!Doctype html>
<html>
<head>
<title> Request Session </title>
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
		<img id="logo" src="../images/Logo.png" width=100px height=100px>
		<img id="helpbutton" src="../images/help.png" align="right">
		
	</div>
	 <ul class="navigate" id="navigation">
	       <ul class="navigate" id="navigation">
	        <li><a href="SpokeHome.html">Home</a></li>
			<li><a href="requestsession.php">Request Session </a></li>
	        <li><a href="pmr.php ">Patient Medical Record</a></li>
	        <li><a href="Patients.php">Patients</a></li>
			<li><a href="help.php">Help</a></li>			
	  </ul>
			
	  </ul>
</head>

<body>

<div style="height: 50%">
<div id="logincontainer" align="center">
<center><h3> Request Session </h3></center>
<input type="hidden" name="date" value="<?php echo date("Y-m-d h:i:sa"); ?>">
<table border ="0" align="center">
	<tr><td><form action="requestsession.php" method="post">
		<label>Enter Patient ID:</label></td>
		<td><input type="text" name="patientid" style="width: 100%"></td>
	</tr>
	<tr><td><label>Select Doctor: </label></td>
		<td>
<select name="Doctor" style="width: 100%">
  <?php
$host="localhost";
$user="root";
$pass="";
$db="telestroke";

$con=mysqli_connect($host,$user,$pass,$db) or die("unable to connect");

  
	   $query = "SELECT staff_id, first_name, last_name FROM staff WHERE type LIKE'hub' AND role NOT LIKE'IT'";
	  
	   $result = mysqli_query($con, $query);
	 
	   
		  while ($row = mysqli_fetch_array($result)) 
		  {
  echo "<option value ='{$row[0]}'> {$row[1]} {$row[2]}</option> ";
 
		  }
		  
		  
		 
?>

</select>  
		</td></tr>
		
	<tr><td colspan="2" align="center">
	<br><input type="submit" value="Request Session" id="resetbutton">
	<input type="button" onclick="window.location.href='help.html'" value="Cancel" id="resetbutton">
	</td></tr>
	
	
	</form>
</table>
<br>


 
</body>
</html>