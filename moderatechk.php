<?php 
session_start();
if($_SESSION['key']!='admin'){
    session_destroy();
    header( 'Location: ./index.php');
}
Header("Cache-control: private, no-cache");
Header("Expires: Mon, 26 Jun 1997 05:00:00 GMT");
Header("Pragma: no-cache");
require("./cnn.php");
$sql = "SELECT * FROM registration WHERE Moderation = 0";
$rst = mysql_query($sql);

$operator = trim($_POST["operator"]);
setcookie("operator", $operator, time()+3600);

while($row = mysql_fetch_array($rst)){
    $modsql="UPDATE registration SET Moderation = ";
    $moderate = trim($_POST["moderate".$row['Regid']]);

    if(isset($_POST["accept"])){
        if($moderate == "on"){
            $modsql = $modsql."1"." WHERE `registration`.`Regid` = ".$row["Regid"];            
            mysql_query($modsql, $link);
        }
    }
    if(isset($_POST["reject"])){
        if($moderate == "on"){
            $modsql = $modsql."2"." WHERE `registration`.`Regid` = ".$row["Regid"];            
            mysql_query($modsql, $link);
        }
    }
    $modsql="UPDATE `bloodbank`.`registration` SET `verified_by` =  '".$_POST['operator']."' WHERE `registration`.`Regid` =".$row["Regid"];
    mysql_query($modsql, $link);
}
Header("Location: ./moderate.php");
?>
