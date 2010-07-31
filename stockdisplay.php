<?php ob_start(); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
session_start(); 
if($_SESSION['key']!='admin'){
    session_destroy();
    header( 'Location: ./index.php');
} 

require('cnn.php');
require('calculate_class.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//E N" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stock List</title>
</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="900" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="900" colspan="3"><a href="main.php"><img src="images/title.jpg" width="1000" height="121" /></a></td>
        </tr>
      <tr bgcolor="#CC9933">
        <td height="292" colspan="3">
             <table width="39%" border="1" align="center" cellpadding="4" cellspacing="0">
             <tr>
             <th>Blood Group</th>
             <th>Quantity</th>
              </tr>
                <?php
                $sql = "SELECT Bloodgroup, COUNT(*) FROM registration WHERE Moderation = 1 GROUP BY Bloodgroup";
                $rst = mysql_query($sql);
                while ($row = mysql_fetch_array($rst)) {
                ?>

            <tr>
                <td width="53%" style="padding-top:5px" ><div align="center"><?php echo $row["Bloodgroup"]; ?></div></td>
                <td width="29%" style="padding-top:5px" ><div align="center"><?php echo $row["COUNT(*)"]; ?></div></td>
            </tr>
            <?php } ?>
            <tr>
                <td width="53%" style="padding-top:5px"><div align="center"><b>Total</b></div></td>
                <td width="53%" style="padding-top:5px"><div align="center">
                        <b>
                        <?php 
                        $sql = "SELECT COUNT(*) FROM `registration` WHERE Moderation=1";
                        $rst = mysql_query($sql);
                        $row = mysql_fetch_array($rst);
                        echo $row["COUNT(*)"];
                        ?>
                        </b></div>
                </td>
            </tr>
            <?php mysql_close($link); ?>
             </table>
          </td>
        </tr>
      <tr bgcolor="#990000">
        <td height="15" colspan="3"><div align="right"><span class="style4"><a href="main.php">HOME</a> &nbsp;&nbsp;</span> </div></td>
      </tr>
      
    </table></td>
  </tr>
</table>
</body>
</html>
