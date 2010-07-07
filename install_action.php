<?php
// This function handles the internals of the installer.

// Get all variables
$dbname = trim($_POST["dbname"]);
$dbuser = trim($_POST["dbuser"]);
$dbpass = trim($_POST["dbpass"]);
$dbhost = trim($_POST["dbhost"]);

$user = 'admin';
$pass1 = trim($_POST["pass1"]);
$pass2 = trim($_POST["pass2"]);

if(($pass1 != $pass2) || $pass1 == '')
    header( 'Location: ./install.php?msg=Error: Password Mismatch<br/>');

// Update connection file with the given datas
$cnn_string = '<?php
$link = mysql_connect(\''.$dbhost.'\', \''.$dbuser.'\', \''.$dbpass.'\');

if (!$link)
    die("CONNECTION ERROR!!!: " . mysql_error());

mysql_select_db (\''.$dbname.'\');
?>';

$cnn_file = 'cnn.php';
if(is_writable($cnn_file))
    header( 'Location: ./install.php?msg=Error: '.$cnn_file.' not writable<br/>');
$file_handler = fopen($cnn_file, 'w');
fwrite($file_handler, $cnn_string);
fclose($file_handler);
chmod("cnn.php", 0444);

require($cnn_file);
// Install initial database
$dbfile = 'database.sql';
/*if(is_readable($dbfile))
    header( 'Location: ./install.php?msg=Error: '.$dbfile.' not readable<br/>');*/
$file_handler = fopen($dbfile, 'r');

// Execute all the queries stored in database file
while(!feof($file_handler)) {
    $sql_statement = fgets($file_handler);
    mysql_query($sql_statement, $link);
}

require 'hash.php';
$hashed_pass = superHash($pass1);

$user_sql = "INSERT INTO `user` (`UserID`, `keyvalue`, `PWD`)
    VALUES ('admin', '5', '$hashed_pass')";
mysql_query($user_sql, $link);

header( 'Location: ./index.php?msg= Installation Sucessfull. You can now login.');

?>
