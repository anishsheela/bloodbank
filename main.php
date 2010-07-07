<?php ob_start(); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
session_start(); 
if($_SESSION['key']!='admin'){
    session_destroy();
    header( 'Location: ./index.php');
} 

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Main admin page</title>

<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:800px;
	height:115px;
	z-index:1;
	left: 216px;
	top: 129px;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="121" colspan="4"><img src="images/images/main_01.png" width="1000" height="121"></td>
        </tr>
      <tr>
        <td width="200" height="201"><table height="164" border="0" cellpadding="0" cellspacing="0" class="nav-item">
          <tr>
            <td width="120"><a href="donors.php" class="nav-item">Donors</a></td>
          </tr>
          <tr>
            <td><a href="moderate.php" class="nav-item">Moderate Donors</a></td>
          </tr>
          <tr>
            <td><a href="reject.php">Rejected Donors</a> </td>
          </tr>
          <tr>
            <td><a href="adminreg.php">Admin Registration</a> </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><a href="allott.php" class="nav-item">Allotment</a></td>
          </tr>
          <tr>
            <td><a href="requestdetails.php">Request Details </a></td>
          </tr>
          <tr>
            <td><a href="allott_reject.php">Reject Request</a></td>
          </tr>
          <tr>
            <td><a href="allotted.php" class="nav-item">Allotted List</a></td>
          </tr>
          <tr>
            <td><a href="rejected.php">Rejected List</a></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="24"><a href="stockdisplay.php" class="nav-item">Stock of Blood</a></td>
          </tr>
          <tr>
            <td height="20"><a href="logout.php" class="nav-item">Logout</a></td>
          </tr>
        </table></td>
        <td width="8"><img src="images/spacer.gif" alt="" width="6" height="180"></td>
        <td colspan="2"><div id="Layer1"><img src="images/images/main_03.jpg" alt="1" width="330" height="201" hspace="0" vspace="0"><img src="images/images/main_04.png" alt="" width="462" height="201"></div>          </td>
        </tr>
      <tr>
        <td height="19" colspan="2"><img src="images/spacer.gif" alt="" width="5" height="65"></td>
        <td width="330">&nbsp;</td>
        <td width="504">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><img src="images/images/main_05.png" width="208" height="178"></td>
        <td><img src="images/images/main_06.png" width="330" height="178"></td>
        <td background="images/images/main_07.png"><p>&nbsp;</p>         </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
