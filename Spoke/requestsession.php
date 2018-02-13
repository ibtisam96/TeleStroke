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
	        <li><a href="SpokeHome.html">Dashboard</a></li>
	        <li><a href="Request_session.php ">Request Sessions</a></li>
	        <li><a href="hospitalstaff.php">Patient Record </a></li>
			<li><a href="video.html">Video</a></li>
	  </ul>
</head>

<body>

<div style="height: 50%">
<div id="logincontainer" align="center">
<center><h3> Request Session </h3></center>
<table border ="0" align="center">
	<tr><td><form action="initiatesession.php" method="post">
		<label>Enter Patient ID:</label></td>
		<td><input type="text" name="patientid" style="width: 100%"></td>
	</tr>
	<tr><td><label>Select Hospital: </label></td>
		<td>
<select name="hospitalid" style="width: 100%">
  <?php
$host="localhost";
$user="root";
$pass="";
$db="Telestroke";
$con=mysqli_connect($host,$user,$pass,$db) or die("unable to connect");
 
  
	   $query = "SELECT hospital_id, name FROM hospital WHERE type LIKE'hub'";
	  
	   $result = mysqli_query($con, $query);
	 
	   
		  while ($row = mysqli_fetch_array($result)) 
		  {

  echo "<option value ='{$row[0]}'> {$row[1]} </option> ";
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
