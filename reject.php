<?php
ob_start();

session_start();
if($_SESSION['key']!='admin'){
    session_destroy();
    header( 'Location: ./index.php');
}
Header("Cache-control: private, no-cache");
Header("Expires: Mon, 26 Jun 1997 05:00:00 GMT");
Header("Pragma: no-cache");

require 'cnn.php';
require 'calculate_class.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//E N" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rejected List of Donors</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="rejectchk.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="848" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><a href="main.php"><img src="images/title.jpg" width="1000" height="121" border="0" /></a></td>
        </tr>
      <tr bgcolor="#CC9933">
        <td height="146" colspan="2"><table width="89%" border="1" align="center" cellpadding="4" cellspacing="0">
          <tr>
            <th>Reg ID</th>
            <th>Name</th>
            <th>Blood Group </th>
            <th>Date Of Birth</th>
            <th>Contact No</th>
            <th>Class</th>
            <th>Gender</th>
            <th>Moderate</th>
          </tr>
<?php
$sql = "SELECT * FROM registration WHERE Moderation = 2";
$rst = mysql_query($sql);

$i = 0;
$rcolor="#CC9933";
while ($row = mysql_fetch_array($rst)){
    if($rcolor == "#CC9933")
        $rcolor = "#FFFFFF";
    else
        $rcolor = "#CC9933";
?>
          <tr>

            <td width="7%" style="padding-top:5px" bgcolor=" <?php echo $rcolor;?>"> <?php echo $row["Regid"];?></td>
            <td width="23%" bgcolor="<?php echo $rcolor;?>" style="padding-top:5px"> <?php echo $row["Name"];?></td>
            <td width="12%" bgcolor="<?php echo $rcolor;?>" style="padding-top:5px" align="center"><?php echo $row["Bloodgroup"];?></td>
            <td width="7%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>">  <?php echo change_date_format($row["DOB"]);?></td>
            <td width="17%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["ContactNo"];?></td>
            <td width="12%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["AdmissionYear"].' '.$row['Branch'].' '.$row['Batch'];?></td>
            <td width="11%"bgcolor="<?php echo $rcolor;?>" style="padding-top:5px"><?php
            if($row["Gender"] == 1){
                echo "Male";
            } else {
                echo "Female";
            }

            ?></td>
            <td width="11%"bgcolor="<?php echo $rcolor;?>" style="padding-top:5px">
               <div align="center"><label>
                <input type="checkbox" name=<?php echo "moderate".$row["Regid"];?> />
                </label>
             </div>

            </td>
          </tr>
          <?php
}
mysql_close($link );

?>
        </table></td>
      </tr>
      <tr>
      <td>
            <center>
                <input type="submit" name="accept" id="accept" value="Accept" style="width:100px"/>
                <input type="submit" name="delete" id="accept" value="Delete" style="width:100px"/>
            </center>
      </td>
      </tr>
      <tr bgcolor="#990000">
        <td height="15" colspan="2"><div align="right"><span class="style4"><a href="main.php">HOME</a> &nbsp;&nbsp;</span> </div></td>
      </tr>
      </form>
    </table></td>
  </tr>
</table>
</body>
</html>
