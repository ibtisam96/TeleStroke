
<?php
session_start();
unset($_SESSION['role']);
session_destroy();
header("Refresh: 0; URL=login.html"); 
?>

