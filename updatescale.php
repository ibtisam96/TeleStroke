
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Telestroke";

$idform=$_POST['mrid'];
$range=$_POST['testrange'];


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());}

$sql = "INSERT INTO Communication (MR_id,expression) VALUES ('$idform','$range')";
	if(mysqli_query($conn, $sql)) { echo "<br><br><br><div style=' display: table; margin-right: auto; margin-left: auto; background-color:#eaeaea; radius:20px;'><p style='text-align:center;'> details were added successfully</p></div>";} 
		else {echo "Error: " . $sql . "<br>" . mysqli_error($conn);}

header("Refresh: 9; URL=session.php"); 


mysqli_close($conn);
?>