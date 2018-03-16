<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Telestroke";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST["problem_id"])){
	$problem=$_POST["problem_id"];
	$solved="Solved";
$updateq="UPDATE problem_report SET status='$solved' WHERE problem_id='$problem' ";
if(mysqli_query($conn,$updateq)){echo"".$problem."";}
}
header("Refresh:0;URL=displayproblemreport.php");

	?>