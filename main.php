<?php
session_start();
if($_SESSION['key']!='admin'){
    session_destroy();
    header( 'Location: ./index.php?msg=Acess Denied. Login here');
}
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
            <a href="donors.php">Donors</a><br/>
            <a href="moderate.php">Moderate Donors</a><br/>
            <a href="reject.php">Rejected Donors</a><br/><br/>

            <a href="adminreg.php">Admin Registration</a><br/><br/>

            <a href="allott.php">Allotment</a><br/>
            <a href="requestdetails.php">Request Details </a><br/>
            <a href="allott_reject.php">Reject Request</a><br/>
            <a href="allotted.php">Allotted List</a><br/>
            <a href="rejected.php">Rejected List</a><br/><br/>

            <a href="stockdisplay.php">Stock of Blood</a><br/>
            <a href="logout.php">Logout</a><br/>
        </div>
        <img src="images/footer.png" alt="Footer"/>
        <p id="message"><?php echo $_GET['msg'] ?></p>
    </body>
</html>