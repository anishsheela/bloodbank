<?php 

require 'cnn.php';

// Initialize all the values. It it necessary?
$name="";
$Regdate="";
$sex="";
$bgroup = "";
$weight = 0;
$phone = "";
$email = "";
$password="";
$district="";
$class="";
$result="";
$result1="";
$a="";
$last="";
$publish1=0;

$result="select * from user ";
$result2=mysql_query($result,$link);

while($detail=mysql_fetch_array($result2,MYSQL_ASSOC)) {
    @$usr=$detail['UserID'];
    if($usr == $_POST["email"]) {
        header("Location: ./index.php?msg=Username already exists,Please login here");
        die(mysql_error($link));
    }
}		
			


if(isset($_POST["name"])){
    if( trim($_POST["name"]) != "" ) $name = trim($_POST["name"]);
    if( trim($_POST["Regdate"]) != "" ) $Regdate = trim($_POST["Regdate"]);
    if( trim($_POST["sex"]) != "" ) $sex = trim($_POST["sex"]);
    if( trim($_POST["jumpMenu"]) != "" ) $bgroup = trim($_POST["jumpMenu"]);
    if( trim($_POST["quantity"]) != "" ) $quantity = trim($_POST["quantity"]);
    if( trim($_POST["phone"]) != "" ) $phone = trim($_POST["phone"]);
    if( trim($_POST["email"]) != "" ) $email = trim($_POST["email"]);
    if( trim($_POST["password"]) != "" ) $password = trim($_POST["password"]);
    if( trim($_POST["address2"]) != "" ) $address = trim($_POST["address2"]);
    if( trim($_POST["address3"]) != "" ) $district = trim($_POST["address3"]);
    if( trim($_POST["weight"]) != "" ) $weight = trim($_POST["weight"]);
    if( trim($_POST["last"]) != "" ) $last = trim($_POST["last"]);
    if( trim($_POST["classs"]) != "" ) $class = trim($_POST["classs"]);
    if( trim($_POST["publish"]) != "" ) $publish = trim($_POST["publish"]);
    if($publish == "on")
        $publish1=1;

    $result="INSERT INTO registration (Name,DOB,Gender,Bloodgroup,Weight,Class,ContactNo,Emailid,LastDonation,Publish,District,Post) VALUES ('$name','$Regdate',$sex,'$bgroup','$weight','$class','$phone','$email','$last','$publish1','$district','$address')";
    $resulto="INSERT INTO user (UserID, PWD)VALUES ('$email' , '$password')";
    mysql_query($resulto,$link);
    $result1="UPDATE stock SET Stock = Stock + 1  WHERE BGroup  = '$bgroup'";

    if(!mysql_query($result,$link))
            die ('Error' . mysql_error());
    else {
        mysql_query($result1,$link);
        $_SESSION['key1']='$email';
        header("Location: ./index.php?msg=Please login here");
    }
 }
 ?>