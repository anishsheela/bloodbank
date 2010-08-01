<?php require 'cnn.php';?>
<html> 
<head> 
<title>Blood Donor Registration Form</title>
<LINK href="register_style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function check() {
   var reg = /^([a-z0-9_\-\.])+\@([a-z0-9_\-\.])+\.([a-z]{2,4})$/;
   var address = document.formcheck.email.value;
   if(reg.test(address) == false) {
      alert('Invalid Email Address');
      return false;
   }
    if(document.formcheck.name.value=="") {
        alert("Enter name");
        document.formcheck.name.focus();
        return false;
    }
    if(document.formcheck.bloodgroup.selectedIndex==0) {
        alert("Select Your Blood Group");
        document.formcheck.bloodgroup.focus();
        return false;
    }
    if(document.formcheck.sex.selectedIndex==0) {
        alert("Select Your Gender");
        document.formcheck.jumpMenu.focus();
        return false;
    }
    if(document.formcheck.weight.value=="") {
        alert("Enter Weight");
        document.formcheck.weight.focus();
        return false;
    }
    if(document.formcheck.phone.value=="") {
        alert("Enter Contact Phone Number");
        document.formcheck.phone.focus();
        return false;
    }
    if(document.formcheck.email.value=="") {
        alert("Enter Email");
        document.formcheck.email.focus();
        return false;
    }
    if(document.formcheck.password.value=="") {
        alert("Enter Password");
        document.formcheck.password.focus();
        return false;
    }
    if(document.formcheck.repass.value=="") {
        alert("Re-enter The Same Password Given Above");
        document.formcheck.repass.focus();
        return false;
    }
    if(document.formcheck.repass.value !== document.formcheck.password.value) {
        alert("Password Mismatch Please Check It");
        document.formcheck.repass.focus();
        return false;
    }
    if(document.formcheck.address.value=="") {
        alert("Enter the address");
        document.formcheck.repass.focus();
        return false;
    }
}
</script>
</head> 
 
<body> 
    <form name="formcheck" id="formcheck" onsubmit="javascript:return check();" action="register_action.php" method="post">
		
		<h1>Blood Bank Registration</h1>
		<div id="left-side">	
			
			<p>Name</p>
			<input name="name" id="name"type="text" value="" />
		
			<p>Date of Birth</p>
            <select  name="dd" style="width:auto">
              <?php for($i=1; $i<=31; $i++) { ?>
              <option value="<?php echo $i;?>"  >
              <?php  echo $i;?>
              </option>
              <?php } ?>
            </select>
            <select name="dm" style="width:auto">
              <?php
                for($i=1; $i<=12; $i++)
                { ?>
              <option value="<?php echo $i;?>"> <?php echo  substr(date("F", strtotime("".$i."/1/1") ),0,9) ; ?> </option>
              <?php } ?>
            </select>
            <select name="dy" style="width:auto">
                <?php
                for($i=date("Y"); $i>=date("Y")-90; $i--)
                { ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php } ?>
            </select>

			<p>Gender &nbsp;&nbsp;&nbsp;Blood Group&nbsp;&nbsp;Weight</p>
            <select name="sex" style="width:auto">
                <option value="" >Select</option>
                <option value="1">Male</option>
                <option value="0">Female</option>
            </select>&nbsp;&nbsp;
            <select name="bloodgroup" style="width:auto">
                <option value="">Select</option>
                <?php
                    $sql = "SELECT DISTINCT BloodGroup FROM bloodgroup;";
                    $result = mysql_query($sql);
                    while ($row1 = mysql_fetch_array($result)) {
                ?>
                    <option><?php echo $row1["BloodGroup"];?></option>
                <?php } ?>
            </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="weight" style="width:50px"/>
		
            <p>Year &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Branch&nbsp;&nbsp; Batch</p>
            <select name="admnyear" style="width:auto">
                <?php for($i = (int)date('Y'); $i > ((int)date('Y') - 20); $i--) {?>
                <option><?php echo (string)$i;?></option>
                <?php }?>
            </select>&nbsp;&nbsp;
            <select name="branch" style="width:auto">
                <?php
                    $sql = "SELECT DISTINCT course FROM course;";
                    $result = mysql_query($sql);
                    while ($row1 = mysql_fetch_array($result)) {
                ?> <option><?php echo $row1["course"];?></option>
                <?php } ?>
            </select>&nbsp;&nbsp;
            <select name="batch" style="width:auto">
                <?php
                    $sql = "SELECT DISTINCT Batch FROM batch_list;";
                    $result = mysql_query($sql);
                    while ($row1 = mysql_fetch_array($result)) {
                ?> <option><?php echo $row1["Batch"];?></option>
                <?php } ?>
            </select>
			<p>Date of Last Donation</p>
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
            <p>District</p>
            <select name="address3" style="width:auto">
                <?php
                    $sql = "SELECT * FROM `district`;";
                    $result = mysql_query($sql);
                    while ($row1 = mysql_fetch_array($result)) {
                ?> <option><?php echo $row1["Name"];?></option>
                <?php } ?>
            </select>
		</div><!--end user-details-->
		
		<div id="right-side">		
			<p>Phone number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Publish</p>
			<input type="text" name="phone" value="" style="width:150px;" />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="publish" checked="false" />
			<p>Email ID (This will be your username for login)</p>
			<input type="text" name="email" id="email" value=""/>
            <p>Password</p>
			<input type="password" name="password" value=""/>
            <p>Re Enter Password</p>
			<input type="password" name="repass" value=""/>
			<p>Address</p>
            <textarea cols="" rows=""  name="address"></textarea>
            <p>&nbsp;</p><p>&nbsp;</p>
            <input type="reset" value="Reset" name="reset" class="reset"/>
		</div><!-- end user-message -->
        <div id="submit-button">
            <input type="submit" value="Submit" name="submit" class="submit" />
        </div>
	</form>	
 
</body> 
</html> 
