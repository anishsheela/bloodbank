<?php 
ob_start();
session_start(); 
require 'cnn.php';
require 'hash.php';
$uid="";
$pwd="";
$sql="";
$rst = "";	
$s="";	
$s="";	
if(isset($_POST["userid"]) )
    if( trim($_POST["userid"]) != "" )
            $uid = trim($_POST["userid"]);
    else
            header( 'Location: ./index.php?msg = "Enter username"');

if(isset($_POST["pwd"]))  
        if($_POST["pwd"] != "")
            $pwd = $_POST["pwd"];
        else
            header( 'Location: ./index.php?msg = "Enter password"');
$hashed_pass = superHash($pwd);
if($uid != "" && $pwd != ""){
    $sql  = "select * from user where UserID = '".$uid."' and PWD = '".$hashed_pass."'";
    $rst = mysql_query($sql);
    $nt=mysql_fetch_array($rst);
    if($nt) {
        if($nt[UserID] == 'admin'){
            $k=0;
            $i='1';
            $_SESSION['key']=$k;
            header( 'Location: ./main.php');
            mysql_query("UPDATE user SET keyvalue ='".$k."' where UserID='".$uid."'");
        } else {
            $i='1';
            $_SESSION['key']= $uid;
            header( 'Location: ./profile.php') ;
        }
    }
} 
if($i !== '1')
    header("Location: ./index.php?msg=Invalid Username or Password");