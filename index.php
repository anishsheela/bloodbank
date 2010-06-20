<?php
session_start(); 
if(isset($_SESSION["key"]))

$_SESSION['key']=0;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blood Bank management System</title>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-size: large;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="3"><img src="images/images/main_01.png" width="1000" height="121" /></td>
        </tr>
      <tr>
        <td width="208"><table width="199" height="83" border="0" cellpadding="0" cellspacing="0" class="nav-item">
          <tr>
            <td width="199"><a href="search.php">Search</a></td>
          </tr>
          <tr>
            <td><a href="reg.php">Register</a></td>
          </tr>
          <tr>
            <td><a href="issue.php">Request Blood</a></td>
          </tr>
          <tr>
            <td><a href="comments.php" class="nav-item1">Comments</a></td>
          </tr>
          <tr>
            <td><a href="tips.php" class="nav-item1">Tips of Blood Donation</a></td>
          </tr>
          <tr>
            <td><a href="fact.php" class="nav-item1">Blood Facts</a></td>
          </tr>
          <tr>
            <td><a href="about.php" class="nav-item1">About Us</a></td>
          </tr>
          <tr>
            <td><a href="source.php">Source Code </a></td>
          </tr>          
        </table></td>
        <td width="330"><img src="images/images/main_03.jpg" width="330" height="201" /></td>
        <td width="362"><img src="images/images/main_04.png" width="462" height="201" /></td>
      </tr>
      <tr>
        <td><img src="images/images/main_05.png" width="208" height="178" /></td>
        <td><img src="images/images/main_06.png" width="330" height="178" /></td>
        <td background="images/images/main_07.png"><p class="style1"><?php echo $_GET['msg'] ?></p>
          <table width="346" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr valign="middle">
            <td width="346" height="104" valign="top"><form action="./log_chk.php" method="post" name="form1" id="form1"  >
                <table width="97%"  cellspacing="0" cellpadding="5">
                  <tr>
                    <td width="26%" height="40" class="BodyFont">Email</td>
                    <td width="74%"><input name="userid" type="text"  id="userid" size="35" maxlength="100"/></td>
                  </tr>
                  <tr>
                    <td class="BodyFont">Password</td>
                    <td><input name="pwd" type="password"  id="pwd" size="36" maxlength="100"/></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center">                      
                      <div align="center">
                        <input name="Submit" type="submit" class="btn" value="Login"  />
                        </div></td>
                  </tr>
                </table>
            </form></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
