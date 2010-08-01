<?php
ob_start();
session_start();
if($_SESSION['key']!='admin'){
    session_destroy();
    header( 'Location: ./index.php');
}
require 'cnn.php';
require 'calculate_class.php';
require 'hash.php';

function starts_with($str, $src){
    return substr($src, 0, strlen($str))==$str;
}

function createRandomPassword() {    
    $chars = "123456789"; // Permissible characters in the password
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i < 4) {
        $num = rand() % 9;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}
$operator = trim($_POST["operator"]);
setcookie("operator", $operator, time()+3600);

$year = trim($_POST["admission_year"]);
setcookie("admission_year", $year, time()+3600);

$batch = trim($_POST["batch"]);
setcookie("batch", $batch, time()+3600);

$admission_number = trim($_POST["admission_number"]);

$name = trim($_POST["name"]);

//DOB
$bd = $_POST["bd"];
$bm = $_POST["bm"];
$by = $_POST["by"];
$dob = dmy2mysql($bd, $bm, $by);

$sex = trim($_POST["sex"]);

if($sex == "Male")
    $sex = 1;
else
    $sex = 0;

$bloodgroup = trim($_POST["bloodgroup"]);

$weight = trim($_POST["weight"]);

$branch = $_POST["branch"];

// Last date of donation.
$ld = $_POST["ld"];
$lm = $_POST["lm"];
$ly = $_POST["ly"];

$last = dmy2mysql($ld, $lm, $ly);

$district = trim($_POST["district"]);

$phone = trim($_POST["phone"]);

$publish = trim($_POST["publish"]);
if($publish == "on")
    $publish1 = 1;
else
    $publish1 = 0;

if( trim($_POST["email"]) != "" )
    $email = trim($_POST["email"]);

$email = strtolower($email);

$address = $_POST["address"];

$password = $admission_number;


$hashed_pass = superHash($password);
$result="INSERT INTO registration (Name, DOB, Gender, Bloodgroup, Weight, ContactNo,
Emailid, Publish, District, Post, AdmissionYear, Branch, Batch, LastDonation, enterd_by)
VALUES ('$name', '$dob', '$sex', '$bloodgroup', '$weight', '$phone', '$email',
'$publish1', '$district', '$address', '$year', '$branch', '$batch', '$last', '$operator')";
$resulto="INSERT INTO user (UserID, PWD)VALUES ('$email' , '$hashed_pass')";
mysql_query($result);
mysql_query($resulto);

// Mail all persons on sucessfull completion of registration

// subject
$subject = 'NSS Blood Bank Registration';

// message
$message = 'Dear '.$name.',<br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NSS Unit of MCET has started an on-line blood donors directory. The directory contains the<br/>
 information of the students, staffs & alumni\'s in our college. You have been registered at NSS<br/>
 on-line blood donors directory. We appreciate your courage to save some life\'s.<br/><br/>



Your user name is : <b>'.$email.'<br/></b>
Your password is   : <b>'.$password.'<br/><br/></b>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You can change the password after logging with this password.<br/><br/>



&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>You can login using the above details to  <a href="http://mcet-nss.co.cc/bloodbank/">our site</a>. You can check and update profile by logging in.<br/><br/></b>



&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You can search for blood if anyone of your friends or relatives want blood.<br/><br/>



&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is an open-source project. If you want to download, modify or suggest any changes,<br/>
        you are free to do so. You can access our source code repository <a href="http://github.com/aneesh/bloodbank">here</a> .<br/><br/>


Regards,<br/>
Anish A & Arun Anson, S5CS<br/>
Site administrators';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: '.$name.' <'.$email.'>' . "\r\n";


if(mail($email, $subject, $message, $headers)) {
    $mes = 'Mail sucessfully sent to '.$email.$_GET['msg'];
    $status = 0;
}
else {
    $mes = 'Mail sending failure';
    $status = 1;
}
// Give the status message to adminreg.php
header("Location: ./adminreg.php?msg=$mes&status=$status");
?>
