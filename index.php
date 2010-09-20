<?php
session_start(); 
if(isset($_SESSION["key"]))
    $_SESSION['key']=0;
$cnn_file = 'cnn.php';
if(!file_exists($cnn_file))
    header( 'Location: ./install.php?msg=Error: '.$cnn_file.' not found.<br/>');

require $cnn_file;
$test_sql = 'SELECT * FROM user';
if(!mysql_query($test_sql, $link))
    header( 'Location: ./install.php?msg=Error: Database not installed<br/>');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>MCET Online Blood Donor's Directory</title>
        <link href="index_page.css" rel="stylesheet" type="text/css"> </link>
    </head>
    <body>
        <img alt="header" src="images/main_header.png"/>
        <div class="sidelink">
            <p><a href="search.php?page=1&new_page=yes">Search</a></p>
            <p><a href="issue.php">Request Blood</a></p>
            <p><a href="comments.php">Comments</a></p>
            <p><a href="tips.php">Tips of Blood Donation</a></p>
            <p><a href="fact.php">Blood Facts</a></p>
            <p><a href="about.php">About Us</a></p>
            <p><a href="source.php">Source Code </a></p>
        </div>
        <img src="images/footer.png" alt="Footer"/>
        <p id="message"><?php echo $_GET['msg'] ?></p>
            <form action="log_chk.php" method="post" name="form1" id="form1"  >
                <div class="login">
                    <p>Email</p>
                    <p>Password</p>
                </div>
                <input name="userid" type="text" size="25" maxlength="100" id="login_user"/><br/>
                <input name="pwd" type="password" size="25" maxlength="100" id="login_pwd"/>
                <input name="Submit" type="submit"value="Login" id="login_button"/>
            </form>
    </body>
</html>