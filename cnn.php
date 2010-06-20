<?php



$link = mysql_connect('sql111.freei.me', 'freei_5003606', 'cheesecake');
if (!$link) {
    die('CONNECTION ERROR!!!: ' . mysql_error());
}


mysql_select_db ("freei_5003606_bloodbank");

?>
