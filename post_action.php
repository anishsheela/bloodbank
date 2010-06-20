<?php
include_once("./cnn.php");
$mg="";  
$name=$_POST['name'];
$place=$_POST['place'];
$email=$_POST['email'];
$comment=$_POST['comment'];

//Captcha Validation
require_once('recaptcha/recaptchalib.php');
$privatekey = "6Lcd87oSAAAAADrp5eUYCPPjX518FWsr87RfU9L5";
$resp = recaptcha_check_answer ($privatekey,
            $_SERVER["REMOTE_ADDR"],
            $_POST["recaptcha_challenge_field"],
            $_POST["recaptcha_response_field"]);
if (!$resp->is_valid) {
    $mg = "The captcha was not entered correctly. Try it again. It is to prevent comment spam";
} else if(isset($_POST['post'])) {
    if($name !="" && $place!="" && $email!="" && $comment!="")
    {
        $insert="INSERT INTO comments (name, place, email, comment) VALUES('$name', '$place', '$email', '$comment')";
        mysql_query($insert, $link);
        $name="";
        $place="";
        $email="";
        $comment="";
        $mg="Thanks for your comment";
    } else {
        $mg='Enter All Datas';
    }
}
header("Location: ./comments.php?mg=$mg");
if(isset($_POST['reset'])){
    $name="";
    $place="";
    $email="";
    $comment="";
    $mg="";
}
?>
