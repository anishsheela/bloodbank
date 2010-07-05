<?php
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
    
$year = trim($_POST["admission_year"]);
setcookie("admission_year", $year, time()+3600);

$batch = trim($_POST["batch"]);
setcookie("batch", $batch, time()+3600);

$class = trim($_POST["branch"]);
setcookie("branch", $branch, time()+3600);

$gender = trim($_POST["gender"]);

if( trim($_POST["email"]) != "" )
    $email = trim($_POST["email"]);

$phone = trim($_POST["phone"]);

$name = trim($_POST["name"]);

$email = strtolower($email);
$bloodgroup = trim($_POST["bloodgroup"]);

$publish = trim($_POST["publish"]);
if($publish == "on")
    $publish1 = 1;
else
    $publish1 = 0;

$post = " ";
$district = trim($_POST["district"]);
$dob = admnyeartodob($year);

if($gender == "Male")
    $sex = 1;
else
    $sex = 0;

$weight = 50;
// Donation date = current date - 6 months
$donation_ts = mktime(0, 0, 0, date("m")-6, date("d"), date("Y"));
$donation_date = date('Y-m-d H:i:s', $donation_ts);
$address = " ";
//$password = createRandomPassword();
$password = 'nssmcet';
$hashed_pass = superHash($password);
$result="INSERT INTO registration (Name, DOB, Gender, Bloodgroup, Weight, ContactNo, Emailid, LastDonation, Publish, District, Post, AdmissionYear, Branch, Batch) VALUES ('$name', '$dob', $sex, '$bloodgroup', '$weight', '$phone', '$email', '$donation_date', '$publish1', '$district', '$address', '$year', '$branch', '$batch')";
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


if(mail($email, $subject, $message, $headers))
    $mes = 'Mail sucessfully sent to '.$email.$_GET['msg'];
else
    $mes = "Mail sending failure";

// Give the status message to adminreg.php
header("Location: ./adminreg.php?msg=$mes Regid : ");
?>
