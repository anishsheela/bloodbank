<?php ob_start(); ?>

<?php
session_start(); 
if($_SESSION['key']!='admin'){
    session_destroy();
    header( 'Location: ./index.php');
} 
Header("Cache-control: private, no-cache");
Header("Expires: Mon, 26 Jun 1997 05:00:00 GMT");
Header("Pragma: no-cache");
?>
<?php
 include("./cnn.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//E N" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request Details</title>
</head>

<body>
<?php
/*       if(isset($_POST["jumpMenu"])){
		
                    $bgroup = trim($_POST["jumpMenu"]);
                    $classs = trim($_POST["classs"]);
                    if($bgroup == "0" OR $bgroup == ""){
                        if($classs == "0"OR $classs == "")
                            $sql = "select * from registration order by Regid";
                        else
                            $sql = "select * from registration WHERE Class = '$classs' order by Regid";

                    } else {
                        if($classs == "0" OR $classs == "")
                            $sql = "select * from registration where Bloodgroup  = '$bgroup' order by Regid";
                        else
                            $sql = "select * from registration WHERE Class = '$classs' AND Bloodgroup = '$bgroup' order by Regid";

                    }
echo $sql;
       

}*/

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="848" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1000"><a href="main.php"><img src="images/title.jpg" width="1000" height="121" border="0" /></a></td>
        </tr>
      <tr bgcolor="#CC9933">
        <td height="146"><table width="94%" border="1" align="center" cellpadding="4" cellspacing="0">
          <tr>
            <th>Req ID</th>
            <th>Patient</th>
            <th>Contact Person </th>
            <th>Quantity</th>
            <th>Contact No</th>
            <th>Blood Group </th>
            <th>Hospital</th>
          </tr>
<?php

$sql = "SELECT * FROM request WHERE Status = 'N' ORDER BY ReqID";

$rst = mysql_query($sql);

$i = 0;
$rcolor="#CC9933";
while ($row = mysql_fetch_array($rst))
{
if($rcolor == "#CC9933") 
	$rcolor = "#FFFFFF";
	else  
	$rcolor = "#CC9933";
?>
          <tr>
            <center>
            <td width="7%" style="padding-top:5px" bgcolor=" <?php echo $rcolor;?>"> <?php echo $row["ReqID"];?></td>
            <td width="17%" bgcolor="<?php echo $rcolor;?>" style="padding-top:5px"> <?php echo $row["PName"];?></td>
            <td width="16%" bgcolor="<?php echo $rcolor;?>" style="padding-top:5px"><?php echo $row["ContactP"];?></td>
            <td width="10%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>">  <?php echo $row["Quantity"];?></td>
            <td width="14%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["ContactPh"];?></td>
            <td width="18%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["BGroup"];?></td>
            <td width="18%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["Hospital"];?></td>
            </center>
          </tr>

          <?php
}
mysql_close($link );

?>
        </table></td>
      </tr>
      <tr bgcolor="#990000">
        <td height="15"><div align="right"><span class="style4"><a href="main.php">HOME</a> &nbsp;&nbsp;</span> </div></td>
      </tr>
      
    </table></td>
  </tr>
</table>
</body>
</html>
