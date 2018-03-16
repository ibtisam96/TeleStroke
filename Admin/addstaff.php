
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Telestroke";

$idform=$_POST['staffid'];
$nameform1=$_POST['name1'];
$nameform2=$_POST['name2'];
$roleform=$_POST['role'];
$genderform=$_POST['gender'];
$phoneno=$_POST['phoneno'];
$hospitalid=$_POST['hospital_id'];
$email=$_POST['email'];


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$checkstring="SELECT staff_id FROM Staff WHERE staff_id = '$idform'";
$checkResult=mysqli_query($conn,$checkstring)
Or die ("<p>Unable to access your information <br> Please try again later or contact the admin</p>");

if(mysqli_num_rows($checkResult) == 0){

$hospitaltype="SELECT type FROM Hospital WHERE hospital_id = '$hospitalid'";
$hospitaltyperesult=mysqli_query($conn,$hospitaltype)
				Or die ("<p>Unable to access the database<br> Please try again later or contact the admin</p>");

$hospitalRow=mysqli_fetch_row($hospitaltyperesult);

$sql = "INSERT INTO Staff VALUES ('$idform','$nameform1','$nameform2', '$roleform', '$genderform','$phoneno', '$hospitalid','$email','$hospitalRow[0]')";

if(mysqli_query($conn, $sql)) { echo "<br><br><br><div style=' display: table; margin-right: auto; margin-left: auto; background-color:#eaeaea; radius:20px;'><p style='text-align:center;'>".$nameform1." details were added successfully</p></div>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else{ echo "Staff ID exist!";}
header("Refresh: 3; URL=hospitalstaff.php"); 

mysqli_close($conn);
?>