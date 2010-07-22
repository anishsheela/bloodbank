<?php 
ob_start();
session_start();
if($_SESSION['key']!='admin'){
    session_destroy();
    header( 'Location: ./index.php');
}
Header("Cache-control: private, no-cache");
Header("Expires: Mon, 26 Jun 1997 05:00:00 GMT");
Header("Pragma: no-cache");
require 'cnn.php';
$sql = "SELECT * FROM registration WHERE Moderation = 2";
$rst = mysql_query($sql);

while($row = mysql_fetch_array($rst)){
    $modsql="UPDATE registration SET Moderation = ";
    $moderate = trim($_POST["moderate".$row['Regid']]);
//    echo $moderate;

    if(isset($_POST["accept"])){
        if($moderate == "on"){
            $modsql = $modsql."1"." WHERE `registration`.`Regid` = ".$row["Regid"];
            echo $modsql."<br/>";
            mysql_query($modsql, $link);
        }
    }
    if(isset($_POST["delete"])){
        if($moderate == "on"){
            $modsql = "DELETE FROM registration WHERE Regid = ".$row['Regid'];
            $email = $row['Emailid'];
            echo $modsql."<br/>";
            mysql_query($modsql, $link);
            $modsql = "DELETE FROM user WHERE `UserID` = '".$email."'";
            mysql_query($modsql, $link);
        }
    }

}
Header("Location: ./reject.php");
?>
