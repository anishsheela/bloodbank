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

// Update connection file with the given datas
$cnn_string = '<?php
$link = mysql_connect(\''.$dbhost.'\', \''.$dbuser.'\', \''.$dbpass.'\');

if (!$link)
    die("CONNECTION ERROR!!!: " . mysql_error());

mysql_select_db (\''.$dbname.'\');
?>';

$cnn_file = 'cnntest.php';
$file_handler = fopen($cnn_file, 'w');
fwrite($file_handler, $cnn_string);
fclose($file_handler);

require($cnn_file);
// Install initial database
$dbfile = 'database.sql';
$file_handler = fopen($dbfile, 'r');

while(!feof($file_handler)) {
    $sql_statement = fgets($file_handler);
    echo $sql_statement.' ';
    if(!mysql_query($sql_statement, $link))
            echo 'Sucess'.'<br/>';
    else {
        echo 'Failure'.'<br/>';
    }
}

?>
