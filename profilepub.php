<?php ob_start(); ?>

<?php
// No need for session 
/*session_start();
if($_SESSION['key'] ==""){
    session_destroy();
    header( 'Location: ./index.php');
}*/

// Class calculation
require("./calculate_class.php");
				 
				 
$user=$_SESSION['key'];

require("./cnn.php");
$sql = "select * from registration WHERE Regid=$regid ";
$rst = mysql_query($sql);
$row = mysql_fetch_array($rst);

 ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile</title>
<style type="text/css">
<!--
.style1 {font-size: x-large}
-->
</style>
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="900" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="900" colspan="3"><img src="images/title.jpg" width="1000" height="121" /></td>
      </tr>
      <tr bgcolor="#CC9933">
        <td height="292" colspan="3"><form name="formcheck" id="formcheck" onsubmit="" form="form" action="" method="post">
          <table width="888" border="0" align="center" cellpadding="5" cellspacing="0" >
            <tr>
              <td height="56" colspan="11"><div align="center"><span class="style3 style1"><strong>YOUR PROFILE</strong></span></div></td>
            </tr>
            <tr>
              <td width="104">Name</td>
              <td width="1">&nbsp;</td>
              <td colspan="0"><label><?php echo $row['Name']; ?></label></td>
              <td width="1">&nbsp;</td>
              <td width="133">Contact No</td>
              <td width="136"><label><?php
                if($row['Publish'] == 1){
                      echo $row['ContactNo'];
                  } else {
                      echo "Requested Privacy";
                  }
              ?></label></td>
            </tr>
            <tr>
              <td height="29">Age</td>
              <td>&nbsp;</td>
              <td colspan="0"><label><?php echo $row['DOB']; ?></label></td>
              <td>&nbsp;</td>
              <td>Email ID</td>
              <td colspan="3"><label><?php echo $row['Emailid']; ?></label></td>
            </tr>
            
            <tr>
              <td height="37">Blood Group</td>
              <td rowspan="2">&nbsp;</td>
              <?php
              if($row['Gender'] == 1)
                  $gender = "Male";
              else
                  $gender = "Female";
              ?>
              <td width="92"><?php echo $row['Bloodgroup']; ?></td>
              <td width="105" height="30">
                  <?php
                  // If designation != Student, then print Designation else class
                  if ($row['Designation'] != 'Student')
                      echo 'Designation';
                  else {
                      echo 'Class';
                  }
                  ?>
              </td>
              <td width="65"><?php echo calculate_class($row['Regid']); ?></td>
              <td rowspan="2"></td>
              <td>District</td>
              <td colspan="0"><label><?php echo $row['District']; ?></label></td>
            </tr>
            <tr>
              <td height="29">Gender</td>
              <td width="92"><?php echo $gender; ?></td>
              <td height="29">Weight</td>
              <td width="65"><?php echo $row['Weight']; ?> Kg</td>
              <td>Address</td>
              <td colspan="1"><?php echo $row['Post']; ?></td>
            </tr>
            <tr>
                <td height="32">Last Donation</td>
              <td></td>
              <td><?php echo change_date_format($row['LastDonation']); ?></td>
            </tr>
          </table>
        </form></td>
      </tr>
      <tr bgcolor="#990000">
        <td height="15" colspan="3"><div align="right"><span class="style4"><a href="main.php">HOME</a> &nbsp;&nbsp;</span> </div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
