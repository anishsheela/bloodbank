<?php ob_start(); ?>

<?php
session_start(); 
if($_SESSION['key']!='admin')
{   session_destroy(); 
	header( 'Location: ./index.php');
				 } 
Header("Cache-control: private, no-cache");
Header("Expires: Mon, 26 Jun 1997 05:00:00 GMT");
Header("Pragma: no-cache");
?>
<?php
 include("./cnn.php");
 $sql = "select * from request where Status='Y' order by Reqid";
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//E N" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Allotted</title>

</head>

<body>
 <?php
 

       if(isset($_POST["jumpMenu"]))										
		if($_POST["jumpMenu"] != "NULL" && $_POST["jumpMenu"]  != "" && $_POST["jumpMenu"]  != "All") 
		{ $bgroup = trim($_POST["jumpMenu"]);
		
		  $sql = "select * from request where BGroup  = '$bgroup' and Status='Y' order by ReqID"; 
		  
		}
		  
		if($_POST["jumpMenu"] != "NULL" && $_POST["jumpMenu"]  == "All") 
		$sql = "select * from request where Status='Y' order by Reqid";
		
				 ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="848" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><a href="index.php"><img src="images/title.jpg" width="1000" height="121" border="0" /></a></td>
        </tr>
      <tr bgcolor="#CC9933">
        <td width="867" height="34"><strong> &nbsp;&nbsp;List of donors  Blood Group
           <?php
		echo $bgroup;
		?>
        </strong></td> 
        <td width="133"><form id="form1" name="form1" method="post" action="">
          <select name="jumpMenu" size="1" id="jumpMenu" onchange="form1.submit();">
            <option>Select</option>
            <option>All</option>
            <option>O+ve</option>
            <option>A+ve</option>
            <option>B+ve</option>
            <option>AB+ve</option>
            <option>O-Ve</option>
            <option>A-ve</option>
            <option>B-ve</option>
            <option>AB-ve</option>
          </select>
        </form>     </td>
        </tr>
      <tr bgcolor="#CC9933">
        <td height="146" colspan="2"><table width="89%" border="1" align="center" cellpadding="4" cellspacing="0">
          <tr>
            <th>Req ID</th>
            <th>Name</th>
            <th>Contact P</th>
            <th>Contact No</th>
            <th>Blood Group</th>
            <th>Quantity</th>
            <th>Needed Date</th>
          </tr>
          <?php

if($rst = mysql_query($sql))
{
$i = 0;
$rcolor="#CC9933";
while ($row = mysql_fetch_array($rst))
	{
	if($rcolor == "#CC9933") 	$rcolor = "#FFFFFF";
		else   $rcolor = "#CC9933";
	?>
			  <tr>
										   
				<td width="5%" style="padding-top:5px" bgcolor=" <?php echo $rcolor;?>"> <?php echo $row["ReqID"];?></td>
				<td width="24%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"> <?php echo $row["PName"];?></td>
				<td width="25%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>">  <?php echo $row["ContactP"];?></td>
				<td width="13%" style="padding-top:5px"bgcolor="<?php echo $rcolor;?>"><?php echo $row["ContactPh"]; ?></td>
				<td width="8%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"> <?php echo $row["BGroup"];?></td>
				<td width="13%" style="padding-top:5px" bgcolor="<?php echo $rcolor;?>"><?php echo $row["Quantity"];?></td>
				<td width="12%" style="padding-top:5px"bgcolor="<?php echo $rcolor;?>"><?php echo $row["NeedDate"]; ?></td>
				
			  </tr>
			  <?php
	}
}else
echo "No Entries found....";

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
