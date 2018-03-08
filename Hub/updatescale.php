<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Telestroke";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());}

if(isset($_POST['submit1'])){
	//communication Scales
$idform=$_POST['mrid1'];
$range=$_POST['Comprehension'];
$range1=$_POST['Expression'];


$sql = "INSERT INTO Communication (comprehension,expression,MR_id) VALUES ('$range','$range1','$idform')";
	if(mysqli_query($conn, $sql)) { echo "<br><br><br><div style=' display: table; margin-right: auto; margin-left: auto; background-color:#eaeaea; radius:20px;'><p style='text-align:center;'> details were added successfully</p></div>";} 
		else {echo "Error: " . $sql . "<br>" . mysqli_error($conn);}
		
		header("Refresh: 9; URL=scale.php");
}
//balance Scales
	if(isset($_POST['submit2'])){
		
		//balance Scales
$idform1=$_POST['mrid2'];
$range2=$_POST['testrange2'];
$range3=$_POST['testrange3'];
$range4=$_POST['testrange4'];
$range5=$_POST['testrange5'];
$range6=$_POST['testrange6'];
$range7=$_POST['testrange7'];
		
		
$sql1 = "INSERT INTO balance(standingscore,settingscore,turning,standing,footonstool,pickup,MR_id) VALUES ('$range2','$range3','$range4','$range5','$range6','$range7','$idform1')";
	if(mysqli_query($conn, $sql1)) { echo "<br><br><br><div style=' display: table; margin-right: auto; margin-left: auto; background-color:#eaeaea; radius:20px;'><p style='text-align:center;'> details were added successfully</p></div>";} 
		else {echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);}

		
	header("Refresh: 9; URL=scale.php");	
	}
	
	if(isset($_POST['submit3'])){
		// Muscle strength Scales
$idform2=$_POST['mrid3'];
$range8=$_POST['Upperbody'];
$range9=$_POST['lowerbody'];
$range10=$_POST['bladdermng'];
$range11=$_POST['bowelmng'];
		
		
$sql2 = "INSERT INTO musclestrength(upperbody,lowerbody,bladdermng,bowelmng,MR_id) VALUES ('$range8','$range9','$range10','$range11','$idform2')";
	if(mysqli_query($conn, $sql2)) { echo "<br><br><br><div style=' display: table; margin-right: auto; margin-left: auto; background-color:#eaeaea; radius:20px;'><p style='text-align:center;'> details were added successfully</p></div>";} 
		else {echo "Error: " . $sql2. "<br>" . mysqli_error($conn);}

		
	header("Refresh: 9; URL=scale.php");	
	}
	// // Self Care Scales
if(isset($_POST['submit4'])){
	


//SelfCare Scales
$idform3=$_POST['mrid4'];
$range12=$_POST['eating'];
$range13=$_POST['grooming'];
$range14=$_POST['bathing'];
$range15=$_POST['toileting'];
$range16=$_POST['dressing'];
		
		
$sql3 = "INSERT INTO selfcare(eating,grooming,bathing,toileting,dressing,MR_id) VALUES ('$range12','$range13','$range14','$range15',$range16,'$idform3')";
	if(mysqli_query($conn, $sql3)) { echo "<br><br><br><div style=' display: table; margin-right: auto; margin-left: auto; background-color:#eaeaea; radius:20px;'><p style='text-align:center;'> details were added successfully</p></div>";} 
		else {echo "Error: " . $sql3. "<br>" . mysqli_error($conn);}

		
	header("Refresh: 9; URL=scale.php");	
	}
mysqli_close($conn);
?>
