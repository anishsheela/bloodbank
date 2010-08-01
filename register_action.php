<?php 

require 'cnn.php';
require 'calculate_class.php';
require 'hash.php';

// Initialize all the values
$name="";
$sex="";
$bgroup = "";
$weight = 50;
$phone = "";
$email = "";
$password="";
$district="";
$address="";
$last="";
$publish1=0;
$designation = 'Student';

$sql="select * from user ";
$result=mysql_query($sql,$link);

while($detail=mysql_fetch_array($result,MYSQL_ASSOC)) {
    @$usr=$detail['UserID'];
    if($usr == $_POST["email"]) {
        header("Location: ./index.php?msg=Username already exists,Please login here");
        die(mysql_error($link));
    }
}		
			


if(isset($_POST["email"])){
    if( trim($_POST["name"]) != "" ) $name = trim($_POST["name"]);
    $sex = $_POST["sex"];
    $bgroup = $_POST["bloodgroup"];
    $admnyear = $_POST["admnyear"];
    $branch = $_POST["branch"];
    $batch = $_POST["batch"];
    if( trim($_POST["phone"]) != "" ) $phone = trim($_POST["phone"]);
    if( trim($_POST["email"]) != "" ) $email = trim($_POST["email"]);
    $email = strtolower($email);
    $password = $_POST["password"];
    if( trim($_POST["address2"]) != "" ) $address = trim($_POST["address2"]);
    if( trim($_POST["address3"]) != "" ) $district = trim($_POST["address3"]);
    if( trim($_POST["weight"]) != "" ) $weight = trim($_POST["weight"]);
    if( trim($_POST["publish"]) != "" ) $publish1 = trim($_POST["publish"]);
    //DOB
    $dd = $_POST["dd"];
    $dm = $_POST["dm"];
    $dy = $_POST["dy"];
    // Last date of donation.
    $ld = $_POST["ld"];
    $lm = $_POST["lm"];
    $ly = $_POST["ly"];

    $dob = dmy2mysql($dd, $dm, $dy);
    $last = dmy2mysql($ld, $lm, $ly);

    $hashed_password = superHash($password);

    if($publish1 == "on")
        $publish=1;

    $sql="INSERT INTO registration (Name,DOB,Gender,Bloodgroup,Weight,AdmissionYear, Branch, Batch, Designation, ContactNo,Emailid,LastDonation,Publish,District,Post)
    VALUES ('$name', '$dob',$sex,'$bgroup','$weight','$admnyear','$branch','$batch','$designation','$phone','$email','$last', '$publish','$district','$address')";
    $sql2="INSERT INTO user (UserID, PWD)VALUES ('$email' , '$hashed_password')";
    mysql_query($sql2,$link);
    $sql3="UPDATE stock SET Stock = Stock + 1  WHERE BGroup  = '$bgroup'";
    mysql_query($sql3,$link);

    if(!mysql_query($sql,$link))
            die ('Error' . mysql_error());
    else {
        mysql_query($result1,$link);
        $_SESSION['key1']='$email';
        header("Location: ./index.php?msg=Please login here");
    }
 }
 ?>