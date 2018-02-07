<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Telestroke";

$idform=$_POST['paitentid'];
$nameform=$_POST['name'];
$phoneno=$_POST['phoneno'];
$Admission=$_POST['Admission'];
$genderform=$_POST['gender'];
$BDpaitent=$_POST['paitentBD'];
$hospitalid=$_POST['hospital_id'];


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$checkstring="SELECT patient_id FROM patient WHERE patient_id = '$idform'";
$checkResult=mysqli_query($conn,$checkstring)
Or die ("<p>Unable to access your information <br> Please try again later or contact the admin</p>");
if(mysqli_num_rows($checkResult) == 0){
$sql = "INSERT INTO patient VALUES ('$idform','$nameform', '$phoneno', '$Admission', '$genderform','$BDpaitent', '$hospitalid')";


if(mysqli_query($conn, $sql)) { echo "<br><br><br><div style=' display: table; margin-right: auto; margin-left: auto;
 background-color:#eaeaea; radius:20px;'><p style='text-align:center;'>".$nameform." details were added successfully</p></div>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else{ echo "patient ID exist!";}

mysqli_close($conn);
?>
