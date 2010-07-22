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
?>
<?php
require 'cnn.php';
require 'calculate_class.php';
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//E N" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>List of donors</title>
</head>

<body>
<?php
if((!isset ($bgroup)) OR (!isset ($admnyear)) OR (!isset ($branch)) OR (!isset ($batch))) {
    $bgroup = "All";
    $admnyear = "All";
    $branch = "All";
    $batch = "All";
    $sql = 'SELECT * FROM registration WHERE Moderation = 1';
} else {

    $sql = 'SELECT * FROM registration WHERE ';
    if(($_POST["bgroup"] != "All") or !(isset ($_POST["bgroup"])))
        $sql .= 'Bloodgroup = \''.$bgroup.'\' AND ';
    else
        $sql .= ' 1 = 1 AND ';

    if(($_POST["admnyear"] != "All") or !(isset ($_POST["admnyear"])))
        $sql .= 'AdmissionYear  = \''.$admnyear.'\' AND ';
    else
        $sql .= ' 1 = 1 AND ';

    if(($_POST["branch"] != "All") or !(isset ($_POST["branch"])))
        $sql .= 'Branch = \''.$branch.'\' AND ';
    else
        $sql .= ' 1 = 1 AND ';

    if(($_POST["batch"] != "All") or !(isset ($_POST["batch"])))
        $sql .= 'Batch = \''.$batch.'\'';
    else
        $sql .= ' 1 = 1';

    $sql .= ' AND Moderation=1';
}
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="848" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><a href="main.php"><img alt="" src="images/title.jpg" width="1000" height="121" border="0" /></a></td>
        </tr>
      <tr bgcolor="#CC9933">
        <td width="548" height="34"><strong>List of Donors  Blood Group        
           <?php echo $bgroup; ?> in branch <?php echo $branch?> at year <?php echo $admnyear;?> at batch <?php echo $batch;?>.
           <label></label>
        </strong></td> 
        <td width="452"><form id="form1" name="form1" method="post" action="">
          <strong>Blood Group</strong>
          <select name="bgroup" size="1" id="bgroup" onchange="form1.submit();">
            <option selected="selected"><?php echo $bgroup;?></option>
            <option>All</option>
            <?php
                $sql1 = "SELECT BloodGroup FROM bloodgroup";
                $result1 = mysql_query($sql1);
                while ($row1 = mysql_fetch_array($result1)) {
            ?>
                <option><?php echo $row1["BloodGroup"];?></option>
            <?php } ?>
          </select>
          <strong>
          <label>Admission Year
          <select name="admnyear" id="admnyear" onchange="form1.submit();">
		<option selected="selected"><?php echo $admnyear;?></option>
                <option>All</option>
                <?php for($i = (int)date('Y'); $i > ((int)date('Y') - 11); $i--) {?>
                <option><?php echo $i;?></option>
                <?php }?>
              </select>
          </label>
          </strong>
          <strong>
          <label>Branch
          <select name="branch" size="1" id="branch" onchange="form1.submit();">
            <option selected="selected"><?php echo $branch;?></option>
            <option>All</option>
            <?php
                $sql1 = "SELECT course FROM course";
                $result1 = mysql_query($sql1);
                while ($row1 = mysql_fetch_array($result1)) {
            ?>
                <option><?php echo $row1["course"];?></option>
            <?php } ?>
          </select>
          </label>
          </strong>
        <strong>
          <label>Batch
          <select name="batch" size="1" id="batch" onchange="form1.submit();">
            <option selected="selected"><?php echo $batch;?></option>
            <option>All</option>
            <?php
                $sql1 = "SELECT batch FROM batch_list";
                $result1 = mysql_query($sql1);
                while ($row1 = mysql_fetch_array($result1)) {
            ?>
                <option><?php echo $row1["batch"];?></option>
            <?php } ?>
          </select>
          </label>
        </strong>
        </form></td>
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
            <td width="7%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>">  <?php echo getAge(date2timestamp($row["DOB"]));?></td>
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
