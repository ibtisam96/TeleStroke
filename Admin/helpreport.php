

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Telestroke";


$staffid=$_POST['ID'];
$subject=$_POST['Subject'];
$description=$_POST['Description'];
$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO problem_report VALUES ('$staffid','$subject','$description','$file')";
if(mysqli_query($conn, $sql)){
		echo "<h2>Thank you, your problem was reported</h2>";}
		else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>

