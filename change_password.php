<?php
require 'cnn.php';
$email = $_GET["email"];
$current_password_hash = $_GET["hash"];

$sql = 'SELECT PWD from user WHERE UserID = \''.$email.'\'';
$result = mysql_query($sql);
$array = mysql_fetch_array($result);
if($current_password_hash != $array['PWD'])
    header( 'Location: ./index.php?msg=Password error');
?>
<html> 
<head> 
<title>Blood Donor Registration Form</title>
<LINK href="register_style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function check() {
    if(document.formcheck.password.value=="") {
        alert("Enter Password");
        document.formcheck.password.focus();
        return false;
    }
    if(document.formcheck.repass.value=="") {
        alert("Re-enter The Same Password Given Above");
        document.formcheck.repass.focus();
        return false;
    }
    if(document.formcheck.repass.value !== document.formcheck.password.value) {
        alert("Password Mismatch Please Check It");
        document.formcheck.repass.focus();
        return false;
    }
}
</script>
</head> 
 
<body> 
    <form name="formcheck" id="formcheck" onsubmit="javascript:return check();" action="change_password_action.php" method="post">
		
		<h1>Change Password</h1>
		<div id="center-side">
                    <p>Changing password for</p>
                    <input readonly type="text" name="email" value="<?php echo $email;?>"/>
                    <p>Enter password</p>
                    <input type="password" name="password" value=""/>
                    <p>Repeat password</p>
                    <input type="password" name="repass" value=""/>
                    <input type="submit" value="Submit" name="submit" class="submit" />
                </div>
    </form>
 
</body> 
</html> 
