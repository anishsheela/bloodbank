<?php
require 'cnn.php';
require 'hash.php';

$hashed_password=  superHash($_POST['password']);

$sql = 'UPDATE user SET PWD=\''.$hashed_password.'\' WHERE UserId=\''.$_POST['email'].'\'';
mysql_query($sql);
header( 'Location: ./index.php?msg=Password Changed. Login with new password');
?>