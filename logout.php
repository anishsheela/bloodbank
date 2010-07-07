<?php
session_start();
$user=$_SESSION['key']="";
session_destroy(); 
//mysql_close('bloodbank');
header( 'Location: ./index.php');
?>