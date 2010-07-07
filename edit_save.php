<?php
session_start();
$user=$_SESSION['key'];
?>
<?php 

require 'cnn.php';
require 'hash.php';

if(isset($_POST["name"])) {
    if( trim($_POST["name"]) != "" ) $name = trim($_POST["name"]);
    // Date of birth
    $dd = $_POST["dd"];
    $dm = $_POST["dm"];
    $dy = $_POST["dy"];
    if( trim($_POST["sex"]) != "" ) $sex = trim($_POST["sex"]);
    $bgroup = $_POST["jumpMenu"];
    if( trim($_POST["quantity"]) != "" ) $quantity = trim($_POST["quantity"]);
    if( trim($_POST["phone"]) != "" ) $phone = trim($_POST["phone"]);
    if( trim($_POST["email"]) != "" ) $email = trim($_POST["email"]);
    if( trim($_POST["password"]) != "" ) $password = trim($_POST["password"]);
    if( trim($_POST["address2"]) != "" ) $post = trim($_POST["address2"]);
    if( trim($_POST["address3"]) != "" ) $district = trim($_POST["address3"]);
    if( trim($_POST["weight"]) != "" ) $weight = trim($_POST["weight"]);
    // Last Date of Donation
    $ld = $_POST["ld"];
    $lm = $_POST["lm"];
    $ly = $_POST["ly"];
    if( trim($_POST["admnyear"]) != "" ) $admnyear = trim($_POST["admnyear"]);
    if( trim($_POST["branch"]) != "" ) $branch = trim($_POST["branch"]);
    if( trim($_POST["batch"]) != "" ) $batch = trim($_POST["batch"]);

    // Convert Last date of Donation to correct format
    $last2 = $ld.'-'.$lm.'-'.$ly;
    $last = date('Y-m-d H:i:s', strtotime($last2));

    $hashed_pass = superHash($password);

    // Convert date of birth to correct format
    $dob = $dd.'-'.$dm.'-'.$dy;
    $date_of_birth = date('Y-m-d H:i:s', strtotime($dob));
    $result="UPDATE registration SET Name='$name',DOB='$date_of_birth',Gender='$sex',Bloodgroup='$bgroup',Weight='$weight',AdmissionYear='$admnyear',Branch='$branch',Batch='$batch',ContactNo='$phone',Emailid='$user',LastDonation='$last',District='$district',Post='$post' WHERE Emailid='$user'";
    $resulto="UPDATE  user SET PWD='$hashed_pass' WHERE UserID= '$user'";

    mysql_query($resulto,$link);

    if(!mysql_query($result,$link))
            die ('Error' . mysql_error());
    else
        header( 'Location: ./profile.php');
}
?>