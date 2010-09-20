<?php

ob_start();
require 'cnn.php';
require 'calculate_class.php';

?>

<?php
	session_start();

	if($_GET['new_page'] == "yes")
		session_unset();
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

		$_GET['page'] = (int) $_GET['page'];

		if($_GET['page'] == 0)
			$_GET['page'] = 1;

		$max_records_per_page = 10;

		$sql = "SELECT * FROM `registration` where(moderation = 1";

		if(isset($_POST['submit']))
		{
			if($_POST["jumpMenu"] != "NULL" && $_POST["jumpMenu"]  != "" && $_POST["jumpMenu"]  != "All")
         			$_SESSION['bgroup'] = trim($_POST["jumpMenu"]);
			else
				unset($_SESSION['bgroup']);

			if($_POST["District"] != "NULL" && $_POST["District"]  != "" && $_POST["District"]  != "All")
				$_SESSION['District'] = trim($_POST["District"]);
			else
				unset($_SESSION['District']);

			if($_POST["RadioGroup1"] != "NULL" && $_POST["RadioGroup1"]  != "" && $_POST["RadioGroup1"]  != 3)
				$_SESSION['sex'] = trim($_POST["RadioGroup1"]);
			else
				unset($_SESSION['sex']);
		}

		if(isset($_SESSION["bgroup"]))										
			$sql =$sql." AND Bloodgroup  = '" . $_SESSION['bgroup'] . "'";

		if(isset($_SESSION["District"]))
			$sql .= " AND District = '" . $_SESSION['District'] . "'";

		if(isset($_SESSION["sex"]))										
			$sql =$sql." AND Gender = '" . $_SESSION['sex'] . "'";

		$sql .= ")";

		$results = mysql_query($sql);
		$num_records = mysql_num_rows($results);

		$sql .= " limit " . (($_GET['page'] - 1) * $max_records_per_page) . ", " . $max_records_per_page;
	?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="848" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><a href="index.php"><img src="images/title.jpg" alt ="Blood bank" width="1000" height="121" /></a></td>
        </tr>
      <tr bgcolor="#993300">
        <td width="701" height="169"><strong> &nbsp;&nbsp;List of 
          <?php
		  if($_SESSION['sex'] == 1)
		      echo "Male";
		  elseif($_SESSION['sex'] == 2)
		      echo "Female";
		  else
		      echo "All";
		?> Donors
           <?php
		if ($_SESSION['district'] != ""){
                    echo " from ";
                    echo $_SESSION['district'];
                }
		?>        
           <?php
		if ($_SESSION['bgroup'] != ""){
                    echo " with Blood Group ";
                    echo $_SESSION['bgroup'];
                }
	   ?>
        </strong></td> 
        <td width="303"><form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?page=1&new_page=yes'; ?>"<br />
            
            <label>              </label>
            <table bgcolor="#CC9933" width="296" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="5" height="36">&nbsp;</td>
                <td width="118">Select District </td>
                <td width="173"><select name="District" id="District">
           <option value="NULL" >All</option>
          <?php

            $rst = mysql_query("select DISTINCT District from registration ");
            while($nt=mysql_fetch_array($rst)) { ?>
          <option value="<?php echo $nt["District"];?>"><?php echo $nt["District"]?></option>
          <?php } ?>
          </select></td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>Blood Group</td>
                <td>
                  <select name="jumpMenu" size="1" id="jumpMenu" onchange="form1.submit();">
                  <option>All</option>
                <?php
                    $sql1 = "SELECT DISTINCT BloodGroup FROM bloodgroup;";
                    $result = mysql_query($sql1);
                    while ($row1 = mysql_fetch_array($result)) { ?>
                    <option><?php echo $row1["BloodGroup"];?></option>
                <?php } ?>
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
              <input type="radio" name="RadioGroup1" value="0" id="RadioGroup1_1" />
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
        if($rcolor == "#CC9933")
            $rcolor = "#FFFFFF";
	else
            $rcolor = "#CC9933";

?>
          <tr>
            <td width="10%" style="padding-top:5px" bgcolor=" <?php echo $rcolor;?>"><div align="justify"><b><?php echo $row["Regid"]; ?></b></div></td>
            <td width="29%" style="padding-top:5px" bgcolor=" <?php echo $rcolor;?>"><div align="justify"><b>
                        <a href=<?php echo 'profilepub.php?regid='.$row['Regid']?>><?php echo $row["Name"]; ?></a>
            </b></div></td>
            <td width="15%" style="padding-top:5px" bgcolor=" <?php echo $rcolor;?>"><div align="center"><b><?php echo $row["Bloodgroup"]; ?></b></div></td>
            <td width="10%" style="padding-top:5px" bgcolor=" <?php echo $rcolor;?>"><div align="right"><b><?php echo getAge(date2timestamp($row["DOB"])); ?></b></div></td>
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
mysql_close($link );

?>
        </table></td>
      </tr>

	<tr>
		<td colspan="2"height="60px" align="center">
			<style type="text/css">
				.search_link:visited {color: black;}
			</style>

			<?php
				$no_of_links = 4;

				if($_GET['page'] != 1)
				{
					echo "<a class=\"search_link\" href=\"search.php?page=" . ($page-1) . "\"><b><i>\t<< Back\t</b></i></a>";

					for($i = ($_GET['page']- $no_of_links), $j = $no_of_links; $j > 0; ++$i, --$j)
					{
						if($i >= 1)
							echo "<a class=\"search_link\" href=\"search.php?page=" . $i . "\"><i>\t" . $i . "\t</i></a>";
						else
							continue;
					}
				}

				echo "\t<big><b><i>" . $_GET['page'] . "</i></b></big>\t";

				$max_pages = $num_records / $max_records_per_page;

				if($max_pages >=1)
					$max_pages = floor($max_pages);
				else
					$max_pages = 1;

				for($i = ($_GET['page'] + 1), $j = $no_of_links; $j > 0; ++$i, --$j)
				{
					if($i <= $max_pages)
						echo "<a class=\"search_link\" href=\"search.php?page=" . $i . "\"><i>\t" . $i . "\t</i></a>";
					else
						break;
				}

				if($max_pages != $_GET['page'])
					echo "<a class=\"search_link\" href=\"search.php?page=" . ($page+1) . "\"><b><i>\tNext >>\t</b></i></a>";
			?>
		</td>
	</tr>

      <tr bgcolor="#990000">
        <td height="15" colspan="2" bgcolor="#FFFFFF"><div align="right">
          <div align="center"><span class="style4"><strong>* Admin Phone number : 8907509611</strong></span> </div>
        </div></td>
      </tr>
      
    </table></td>
  </tr>
</table>
</body>
</html>
