<?php
$link = mysql_connect('localhost', 'root', 's');

if (!$link)
    die('CONNECTION ERROR!!!: ' . mysql_error());

mysql_select_db ("bloodbank");
?>
