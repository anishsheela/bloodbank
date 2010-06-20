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
echo $privatekey;
$mg= $privatekey;
$resp = recaptcha_check_answer ($privatekey,
            $_SERVER["REMOTE_ADDR"],
            $_POST["recaptcha_challenge_field"],
            $_POST["recaptcha_response_field"]);
if (!$resp->is_valid) {
    $insert="INSERT INTO comments VALUES('$name','$place','$email','$comment')";
    mysql_query($insert,$link);
    echo "The reCAPTCHA wasn't entered correctly. Go back and try it again." .
    "(reCAPTCHA said: " . $resp->error . ")";
}/* else if(isset($_POST['post'])) {
    if($name !="" && $place!="" && $email!="" && $comment!="")
    {
        $insert="INSERT INTO comments VALUES('$name','$place','$email','$comment')";
        mysql_query($insert,$link);
        $name="";
        $place="";
        $email="";
        $comment="";
        $mg="";
    } else {
        $mg='Enter All Datas';
    }
}*/

if(isset($_POST['reset'])){
    $name="";
    $place="";
    $email="";
    $comment="";
    $mg="";
    //header("Location: ./speak.php");
}
?>
