<?php ob_start(); ?>

<?php
require("./cnn.php");
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//E N" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search</title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:404px;
	height:23px;
	z-index:1;
	left: 283px;
	top: 455px;
}
-->
</style>
</head>

<body>
 <?php 
  $district="";
  $bgroup="";
        $sql = "SELECT * FROM `registration`";
       if(isset($_POST["jumpMenu"]))										
		
		 if($_POST["jumpMenu"] != "NULL" && $_POST["jumpMenu"]  != "" && $_POST["jumpMenu"]  != "All") 
		{ $bgroup = trim($_POST["jumpMenu"]);
		  $sql =$sql." and  Bloodgroup  = '$bgroup'"; 
		}
		
		  
		if(isset($_POST["District"]))
		if($_POST["District"] != "NULL" && $_POST["District"]  != "" && $_POST["District"]  != "All")
		{ $district = trim($_POST["District"]);
          $sql = $sql." and District = '$district'"; 
		}
		 
		 if(isset($_POST["RadioGroup1"]))										
		if($_POST["RadioGroup1"] != "NULL" && $_POST["RadioGroup1"]  != "" && $_POST["RadioGroup1"]  != 3) 
		{ $sex = trim($_POST["RadioGroup1"]);
          $sql = $sql." and Gender  = '$sex'"; 
		} 
		//echo $sql;
		 ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="848" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><a href="index.php"><img src="images/title.jpg" width="1000" height="121" /></a></td>
        </tr>
      <tr bgcolor="#993300">
        <td width="701" height="169"><strong> &nbsp;&nbsp;List of 
          <?php
		  if($sex == 1)
		      echo "Male";
		  elseif($sex == 2)
		      echo "Female";
		  else
		      echo "All";
		?> Donors
           <?php
		if ($district != ""){
                    echo " from ";
                    echo $district;
                }
		?>        
           <?php
		if ($bgroup != ""){
                    echo " with Blood Group ";
                    echo $bgroup;
                }
	   ?>
        </strong></td> 
        <td width="303"><form id="form1" name="form1" method="post" action=""><br />
            
            <label>              </label>
            <table bgcolor="#CC9933" width="296" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="5" height="36">&nbsp;</td>
                <td width="118">Select District </td>
                <td width="173"><select name="District" id="District">
           <option value="NULL" >All</option>
          <?php

                        $rst = mysql_query("select DISTINCT District from registration ");
                        while($nt=mysql_fetch_array($rst))
                        {
                                ?>
                                  <option value="<?php echo $nt["District"];?>"><?php echo $nt["District"]?></option>
                                  <?php
                        }
                ?>
          </select></td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Blood Group</td>
                <td>
                  <select name="jumpMenu" size="1" id="jumpMenu" onchange="form1.submit();">
                  <option>All</option>
                  <option>O+ve</option>
                  <option>A+ve</option>
                  <option>B+ve</option>
                  <option>AB+ve</option>
                  <option>O-Ve</option>
                  <option>A-ve</option>
                  <option>B-ve</option>
                  <option>AB-ve</option>
                  </select></td>
                </tr>
              <tr>
                <td height="49">&nbsp;</td>
                <td>Gender</td>
                <td>   <table width="140">
          <tr>
            <td width="35" ><label>
              <input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0" />
                Male
                </label></td>
          
          
            <td width="56"><label>
              <input type="radio" name="RadioGroup1" value="2" id="RadioGroup1_1" />
                Female
                </label></td>
            <td width="33"><label>
              <input type="radio" name="RadioGroup1" value="3" id="RadioGroup1_1" />
                All
                </label></td>
          </tr>
        </table></td>
                </tr>
              <tr bgcolor="#993300">
                <td height="30">&nbsp;</td>
                <td colspan="2"><div align="center">
                  <input type="submit" name="submit" id="submit" value="Submit" />
                  <input type="reset" name="reset" id="reset" value="Reset" /> 
                </div></td>
                </tr>
            </table>
            <label></label>
          </form></td>
        </tr>
      <tr bgcolor="#CC9933">
        <td height="105" colspan="2"><table width="89%" border="1" align="center" cellpadding="4" cellspacing="0">
          <tr>
            <th>Reg ID</th>
            <th>Name</th>
            <th>Blood Group </th>
            <th>Age</th>
            <th>Contact No</th> 
            <th>Gender</th>
          </tr>
          <?php

$rst = mysql_query($sql);

$i = 0;

while ($row = mysql_fetch_array($rst)) {
    if($row["Moderation"] == 1){
        if($rcolor == "#CC9933")
            $rcolor = "#FFFFFF";
	else
            $rcolor = "#CC9933";

?>
          <tr>
            <td width="10%" style="padding-top:5px" bgcolor=" <?php echo $rcolor;?>"><div align="justify"><b><?php echo $row["Regid"]; ?></b></div></td>
            <td width="29%" style="padding-top:5px" bgcolor=" <?php echo $rcolor;?>"><div align="justify"><b><?php echo $row["Name"]; ?></b></div></td>
            <td width="15%" style="padding-top:5px" bgcolor=" <?php echo $rcolor;?>"><div align="center"><b><?php echo $row["Bloodgroup"]; ?></b></div></td>
            <td width="10%" style="padding-top:5px" bgcolor=" <?php echo $rcolor;?>"><div align="right"><b><?php echo $row["DOB"]; ?></b></div></td>
            <td width="19%" style="padding-top:5px" bgcolor=" <?php echo $rcolor;?>"><div align="right"><b><?php
                if($row['Publish'] == '1'){
                    echo $row["ContactNo"];
                } else {
                    echo "Contact Admin *";
                }

            ?></b></div></td>
            <td width="17%" style="padding-top:5px" bgcolor=" <?php echo $rcolor;?>"><div align="right"><b>
            <?php

            $gender = $row["Gender"];
            if ($gender == 1){
                echo "Male";
            } else {
                echo "Female";
            }

            ?>
                    </b></div></td>
          </tr>
          <?php
    }
}
mysql_close($link );

?>
        </table></td>
      </tr>
      <tr bgcolor="#990000">
        <td height="15" colspan="2" bgcolor="#FFFFFF"><div align="right">
          <div align="center"><span class="style4"><strong>* Admin Phone number : 9446172320</strong></span> </div>
        </div></td>
      </tr>
      
    </table></td>
  </tr>
</table>
</body>
</html>
