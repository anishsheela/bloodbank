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
<title>Moderate Donors</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="moderatechk.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="848" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><a href="main.php"><img src="images/title.jpg" width="1000" height="121" border="0" /></a></td>
       </tr>
       <tr>
           <td>
           Data Entry Operator
            <select name="operator" id="operator">
                <option><?php
                // If cookie is set, then use it as default
                if(isset($_COOKIE['operator']))
                    echo $_COOKIE["operator"];
                ?>
                </option>
                    <?php
                    /* Add all the operators from the operator table, by alphabetic order*/
                        $sql = "SELECT DISTINCT operator FROM operator";
                        $result = mysql_query($sql);
                        while ($row1 = mysql_fetch_array($result)) {
                    ?>
                        <option><?php echo $row1["operator"];?></option>
                    <?php } ?>

            </select>
           </td>
       </tr>
      <tr bgcolor="#CC9933">
        <td height="146" colspan="2"><table width="89%" border="1" align="center" cellpadding="4" cellspacing="0">
<?php
$sql = "SELECT * FROM registration WHERE Moderation = 0";
$rst = mysql_query($sql);

$i = 0;
$rcolor="#FFFFFF";
while ($row = mysql_fetch_array($rst)){
?>

          <tr>
            <th>Mod</th>
            <th>Reg ID</th>
            <th>Class</th>
            <th>Name</th>
            <th>Date of birth</th>
            <th>Sex</th>
            <th>Blood Group</th>
            <th>Weight</th>
            <th>Last Donation</th>
            <th>District</th>
            <th>Phone</th>
            <th>Pub</th>
            <th>Email</th>
            <th>Address</th>
          </tr>
          <tr>                                       
            <td style="padding-top:5px" bgcolor="<?php echo $rcolor;?>">
               <div align="center">
                   <label>
                       <input type="checkbox" name=<?php echo "moderate".$row["Regid"];?> />
                   </label>
               </div>
            </td>
            <td style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["Regid"];?></td>
            <td style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["AdmissionYear"].' '.$row['Branch'].' '.$row['Batch'];?></td>
            <td style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["Name"];?></td>
            <td style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo change_date_format($row["DOB"]);?></td>
            <td style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo(($row["Gender"] == 1)? "Male": "Female");?></td>
            <td style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["Bloodgroup"];?></td>
            <td style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["Weight"];?></td>
            <td style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo change_date_format($row["LastDonation"]);?></td>
            <td style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["District"];?></td>
            <td style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["ContactNo"];?></td>
            <td style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo(($row["Publish"] == 1)? 'Yes': 'No');?></td>
            <td style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["Emailid"];?></td>
            <td style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["Post"];?></td>
          </tr>
      <?php $i++; if($i%5 == 0) { ?>
      <tr>
      <td colspan="15">
            <center>
                <input type="submit" name="accept" id="accept" value="Accept" style="width:100px"/>
                <input type="submit" name="reject" id="reject" value="Reject"  style="width:100px" />
            </center>
      </td>
      </tr>
     <?php }
}
mysql_close($link );

?>
        </table></td>
      </tr>
      <tr>
      <td>
            <center>
                <input type="submit" name="accept" id="accept" value="Accept" style="width:100px"/>
                <input type="submit" name="reject" id="reject" value="Reject"  style="width:100px" />
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
