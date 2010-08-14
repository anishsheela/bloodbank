<?php
include('cnn.php');
session_start();
if($_SESSION['key']!='admin') {
    session_destroy();
    header( 'Location: ./index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Registration</title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:728px;
	height:280px;
	z-index:1;
	left: 137px;
	top: 35px;
}
.style2 {
	font-size: 18px;
	font-weight: bold;
}
.status {
    color: red;
    border: red solid;
}
.status2 {
    color :green;
    border: green solid;
}
-->
</style>
</head>

<body>

<script type="text/javascript" src="adminreg_check.js"> </script>
<div id="">
  <form id="form1" name="formcheck" method="post" action="adminregsave.php" onsubmit="javascript:return check();">
    <div class ="<?php if($status == 0) echo 'status2'; else echo 'status';?>">
        Status :
        <b>
        <?php
            echo $_GET['msg'];
        ?>
        </b>
    </div>
  <p align="center" class="style2">Administrator Registration </p>
  <p>
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
  </p>
    <p>Admission year
      <select name="admission_year" id="admission_year">
        <option><?php
        // If cookie is set, then use it as default
        if(isset($_COOKIE['admission_year']))
            echo $_COOKIE["admission_year"];
        ?>
        </option>
          <?php
          /* Add the date from current year to 2002 (College Starting Year)*/
          $year = date("Y");
          for ($index = (int)$year; $index >= 2002; $index--) {
              ?> <option><?php echo $index;?></option><?
          }
          ?>

      </select>
    </p>
    <p>Batch
        <select name="batch" id="batch">
        <option><?php
        // If cookie is set, then use it as default
        if(isset($_COOKIE['batch']))
            echo $_COOKIE["batch"];
        ?>
        </option>
        <?php
            $sql = "SELECT DISTINCT Batch FROM batch_list;";
            $result = mysql_query($sql);
            while ($row1 = mysql_fetch_array($result)) {
        ?> <option><?php echo $row1["Batch"];?></option>
        <?php } ?>
      </select>
    </p>
  <p align="justify">
    <label>Admission Number
    <input name="admission_number" type="text" value="" maxlength ="4" size="4"/>
    </label>
  </p>
  <p align="justify">
    <label>Name :
    <input name="name" type="text" value="" size="50"/>
    </label>
  </p>
    <p>Date of birth
        <select  name="bd" style="width:auto">
          <option value="">Select</option>
          <?php for($i=1; $i<=31; $i++) { ?>
          <option value="<?php echo $i;?>"  >
          <?php  echo $i;?>
          </option>
          <?php } ?>
        </select>
        <select name="bm" style="width:auto">
          <option value="">Select</option>
          <?php
            for($i=1; $i<=12; $i++)
            { ?>
          <option value="<?php echo $i;?>"> <?php echo  substr(date("F", strtotime("".$i."/1/1") ),0,9) ; ?> </option>
          <?php } ?>
        </select>
        <select name="by" style="width:auto">
          <option value="">Select</option>
          <?php
            for($i=date("Y")-17; $i>=date("Y")-90; $i--)
            { ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php } ?>
        </select>
    </p>
    <p align="justify">
        <label>Sex
        <select name="sex">
          <option value="">Select</option>
          <option>Male</option>
          <option>Female</option>
        </select>
        </label>
    </p>
    <p align="justify">
    <label>Blood Group
        <select name="bloodgroup">
            <option value="">Select</option>
            <?php
                $sql = "SELECT DISTINCT BloodGroup FROM bloodgroup;";
                $result = mysql_query($sql);
                while ($row1 = mysql_fetch_array($result)) {
            ?>
                <option><?php echo $row1["BloodGroup"];?></option>
            <?php } ?>
        </select>
    </label>
    </p>
    <p align="justify">
        <label>Weight
            <input name="weight" type="text" id="weight" size="3" maxlength="3"/>
        </label>
    </p>

    <p>Branch 
        <select name="branch" id="branch">
            <option value="">Select</option>
            <?php
            /* Add all the branches from the Table course and feild course */
            $query = "SELECT course FROM course ORDER BY course ASC;";
            $list = mysql_query($query, $link);
            while($record = mysql_fetch_array($list)){
              ?> <option> <?php echo $record['course'];?> </option><?php
            }
            ?>
      </select>
    </p>
    <p>Date of Last Donation
        <select  name="ld" style="width:auto">
          <?php for($i=1; $i<=31; $i++) { ?>
          <option value="<?php echo $i;?>"  >
          <?php  echo $i;?>
          </option>
          <?php } ?>
        </select>
        <select name="lm" style="width:auto">
          <?php
            for($i=1; $i<=12; $i++)
            { ?>
          <option value="<?php echo $i;?>"> <?php echo  substr(date("F", strtotime("".$i."/1/1") ),0,9) ; ?> </option>
          <?php } ?>
        </select>
        <select name="ly" style="width:auto">
            <?php
            for($i=date("Y"); $i>=date("Y")-90; $i--)
            { ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php } ?>
        </select>
    </p>
    <p align="justify">
        <label>District</label>
        <select name="district">
            <option value="">Select</option>
            <?php
                $sql = "SELECT Name FROM district";
                $result = mysql_query($sql);
                while ($row1 = mysql_fetch_array($result)) {
            ?> <option><?php echo $row1["Name"];?></option>
            <?php } ?>
         </select>
    </p>
    <p align="justify">
        <label>Phone
            <input type="text" name="phone" maxlength="11" size="11"/>
        </label>
    </p>
    <p align="justify">
        <label>
            Publish
        </label>
        <label>
             <input name="publish" type="checkbox"/>
        </label>
    </p>
    <p align="justify">
        <label>Email
            <input name="email" type="text" id="email" size="50"/>
        </label>
    </p>
    <p>Address</p>
    <p>
        <textarea cols="50" rows="4"  name="address"></textarea>
    </p>

  <p align="justify">
    <label></label>
    <input name="submit" type="submit" id="submit" value="Submit" />
  </p>
</form></div><br/>
</body>
</html>
