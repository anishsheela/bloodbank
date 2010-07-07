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
require("./cnn.php");
require("./calculate_class.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//E N" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>List of donors</title>
</head>

<body>
<?php
       if(isset($_POST["jumpMenu"])){
		
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
       

}

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="848" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><a href="main.php"><img src="images/title.jpg" width="1000" height="121" border="0" /></a></td>
        </tr>
      <tr bgcolor="#CC9933">
        <td width="548" height="34"><strong> &nbsp;&nbsp;List of Donors  Blood Group        
           <?php
		echo $bgroup;
		?>
            in class <?php echo $classs?>
           <label></label>
        </strong></td> 
        <td width="452"><form id="form1" name="form1" method="post" action="">
          <strong>Blood Group</strong>
          <select name="jumpMenu" size="1" id="jumpMenu" onchange="form1.submit();">
            <option selected="selected"><?php echo $bgroup;?></option>
            <option value="0">All</option>
                <option><?php echo $row['Bloodgroup']; ?></option>
                <?php
                    $sql1 = "SELECT DISTINCT BloodGroup FROM bloodgroup;";
                    $result = mysql_query($sql);
                    while ($row1 = mysql_fetch_array($result)) {
                ?>
                    <option><?php echo $row1["BloodGroup"];?></option>
                <?php
                    }
                ?>
          </select>
          <strong>
          <label>Class
          <select name="classs" id="classs" onchange="form1.submit();">
		<option selected="selected"><?php echo $classs;?></option>
                <option value="0">All</option>
                <option> S1S2A </option>
                <option> S1S2B </option>
                <option> S1S2C </option>
                <option> S1S2D </option>
                <option> S1S2E </option>
                <option> S1S2F </option>
                <option> S3CS </option>
                <option> S3IT </option>
                <option> S3BT </option>
                <option> S3ME </option>
                <option> S3EE </option>
                <option> S3EC </option>
                <option> S4CS </option>
                <option> S4IT </option>
                <option> S4BT </option>
                <option> S4ME </option>
                <option> S4EE </option>
                <option> S4EC </option>
                <option> S5CS </option>
                <option> S5IT </option>
                <option> S5BT </option>
                <option> S5ME </option>
                <option> S5EE </option>
                <option> S5EC </option>
                <option> S6CS </option>
                <option> S6IT </option>
                <option> S6BT </option>
                <option> S6ME </option>
                <option> S6EE </option>
                <option> S6EC </option>
                <option> S7CS </option>
                <option> S7IT </option>
                <option> S7BT </option>
                <option> S7ME </option>
                <option> S7EE </option>
                <option> S7EC </option>
                <option> S8CS </option>
                <option> S8IT </option>
                <option> S8BT </option>
                <option> S8ME </option>
                <option> S8EE </option>
                <option> S8EC </option>
                <option> S1S2MCA </option>
                <option> S3MCA </option>
                <option> S4MCA </option>
                <option> S5MCA </option>
                <option> S6MCA </option>
                <option> Staff </option>
                <option> Alumini </option>
                <option> Others </option>
              </select>
          </label>
          </strong>
        </form>     </td>
        </tr>
      <tr bgcolor="#CC9933">
        <td height="146" colspan="2"><table width="89%" border="1" align="center" cellpadding="4" cellspacing="0">
          <tr>
            <th>Reg ID</th>
            <th>Name</th>
            <th>Blood Group </th>
            <th>Age</th>
            <th>Contact No</th>
            <th>Class</th>
            <th>Gender</th>
          </tr>
          <?php
if($sql == "")
    $sql = "select * from registration order by Regid";

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
                                       
            <td width="7%" style="padding-top:5px" bgcolor=" <?php echo $rcolor;?>"> <?php echo $row["Regid"];?></td>
            <td width="27%" bgcolor="<?php echo $rcolor;?>" style="padding-top:5px">
                <a href=<?php echo 'profilepub.php?regid='.$row['Regid']?>>
                <?php echo $row["Name"];?>
                </a></td>
            <td width="11%" bgcolor="<?php echo $rcolor;?>" style="padding-top:5px"><?php echo $row["Bloodgroup"];?></td>
            <td width="7%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>">  <?php echo $row["DOB"];?></td>
            <td width="16%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["ContactNo"];?></td>
            <td width="14%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo calculate_class($row["Regid"]);?></td>
            <td width="18%" style="padding-top:5px"bgcolor="<?php echo $rcolor;?>"><?php
            if($row["Gender"] == 1){
                echo "Male";
            } else {
                echo "Female";
            }

            ?></td>
          </tr>
          <?php
}
mysql_close($link );

?>
        </table></td>
      </tr>
      <tr bgcolor="#990000">
        <td height="15" colspan="2"><div align="right"><span class="style4"><a href="main.php">HOME</a> &nbsp;&nbsp;</span> </div></td>
      </tr>
      
    </table></td>
  </tr>
</table>
</body>
</html>
