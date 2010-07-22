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
    
<script type="text/javascript">
function validate(form_id,email) {
    // Not a complete e-mail validation. Just checking if there is any e-mail
   //var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var reg = /^([A-Za-z0-9_\-\.])$/;
   var address = document.forms[form_id].elements[email].value;
   if(address == '') {
      alert('Invalid Email Address');
      document.form1.email.focus();
      return false;
   }
}
</script>
<div id="Layer1">
  <form id="form1" name="form1" method="post" action="adminregsave.php" onsubmit="javascript:return validate('form1','email');">
  <label></label>
  <p align="center" class="style2">ADMIN REGISTRATION FORM </p>
  <p>Admission year <select name="admission_year" id="admission_year">
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
  <p>Branch <select name="branch" id="branch">
        <option><?php
        // If cookie is set, then use it as default
        if(isset($_COOKIE['branch']))
            echo $_COOKIE["branch"];
        ?>
        </option>
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
    <p>Batch <select name="batch" id="batch">
        <option><?php
        // If cookie is set, then use it as default
        if(isset($_COOKIE['batch']))
            echo $_COOKIE["batch"];
        ?>
        </option>
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
            <option>E</option>
            <option>F</option>
      </select>
    </p>
  <p align="justify">
    <label>Name : 
    <input name="name" type="text" value="" />
</label>
  </p>
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
  <p align="justify">
    <label>Email :
    <input name="email" type="text" id="email"/>
</label>
  </p>
  <p align="justify">
    <label>Phone :
    <input type="text" name="phone" maxlength="11"/>
    </label>
  </p>
  <p align="justify">
    <label>
    Publish</label>
    <label>
     <input name="publish" type="checkbox" checked="checked" />
    </label>
  </p>
    <p align="justify">
    <label>Gender
    <select name="gender">
      <option selected="selected">Male</option>
      <option>Female</option>
    </select>
    </label>
  </p>
  <p align="justify">
    <label></label>
    <label>District    </label>
    <select name="district" size="1">
                    <option selected="selected">Thiruvananthapuram</option>
                    <option>Kollam</option>
                    <option>Pathanamthitta</option>
                    <option>Alappuzha</option>
                    <option>Kottayam</option>
                    <option>Idukki</option>
                    <option>Ernakulam</option>
                    <option>Thrissur</option>
                    <option>Palakkad</option>
                    <option>Malapuram</option>
                    <option>Kozhikode</option>
                    <option>Wayanad</option>
                    <option>Kannur</option>
                    <option>Kasargod</option>
                    <option>Other</option>
      </select>
  </p>
  <p align="justify">
    <label></label>
    <input name="submit" type="submit" id="submit" value="Submit" />
  </p>
</form></div><br/>

<div class ="<?php if($status == 0) echo 'status2'; else echo 'status';?>">
Status :
<b>
<?php
    echo $_GET['msg'];
?>
</b>
</div>
</body>
</html>
