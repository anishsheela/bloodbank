<?php
//ob_start();
session_start();
if($_SESSION['key'] ==""){
    session_destroy();
    header( 'Location: ./index.php?msg=Session Expired. Please login again');
}

$user=$_SESSION['key'];

?>
<?php
 require("./calculate_class.php");
 require("./cnn.php");
 @$sql = "select * from registration WHERE Emailid='$user' ";
 @$rst = mysql_query($sql);
 @$row = mysql_fetch_array($rst);
 @$pass1 = "select PWD from user where UserID='$user'";
 @$pass2 = mysql_query($pass1);
 @$pass3 = mysql_fetch_array($pass2)
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
<style type="text/css">
<!--
.style1 {font-size: x-large}
-->
</style>

</head>

<body>
<script type="text/javascript">
function check() {
    if(document.formcheck.password.value !== document.formcheck.repass.value) {
        alert("Password Mismatch Please Check It");
        document.formcheck.repass.focus();
        return false;
    }
}
</script>

<script type="text/javascript">
</script>
<form name="formcheck" id="formcheck" onsubmit="return check();" action="./edit_save.php" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="900" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="900" colspan="3"><img src="images/title.jpg" alt="Title" width="995" height="119" border="0" /></td>
      </tr>
      <tr bgcolor="#CC9933">
        <td height="292" colspan="3">
          <table width="790" border="0" align="center" cellpadding="5" cellspacing="0" >
            <tr>
              <td height="55" colspan="9"><div align="center"><span class="style3 style1"><strong>Edit Your Profile</strong></span></div></td>
            </tr>
            <tr>
              <td width="70">Name</td>
              <td width="1">&nbsp;</td>
              <td colspan="4"><label>
                <input name="name" type="text" id="name" style="width:300px" value="<?php echo $row['Name']; ?>" size="35" maxlength="100" />
              </label></td>
              <td width="1">&nbsp;</td>
              <td width="146">Contact No</td>
              <td width="306"><label>
                <input name="phone" type="text" id="phone" style="width:150px" value="<?php echo $row['ContactNo']; ?>" maxlength="100"/>
                <input type="checkbox" name="publish" <?php
                if($row['Publish'] == 1){
                    echo 'checked="yes"';
                } else {
                    echo "";
                }
                ?>></input>
                Publish</label></td>
            </tr>
            <td height="32" width="70">Date Of Birth</td>
              <td>&nbsp;</td>
              <?php list ($d, $m, $y) = split_date($row['DOB']);?>
                <td width="50" height="62"><select  name="dd" class="Selection" id="dd" style="width:50px">
                      <option><?php echo $d; ?></option>
                      <?php for($i=1; $i<=31; $i++) { ?>
                      <option value="<?php echo $i;?>"  >
                      <?php  echo $i;?>
                      </option>
                      <?php } ?>
                    </select></td><td>
                  <select name="dm" class="Selection" id="dm"  style="width:100px">
                      <option value=<?php echo $m; ?>><?php echo date( 'F', mktime(0, 0, 0, $m) );?></option>
                      <?php
                        for($i=1; $i<=12; $i++)
                        { ?>
                      <option> <?php echo  substr(date("F", strtotime("".$i."/1/1") ),0,9) ; ?> </option>
                      <?php } ?>
                  </select></td><td>
                  <select name="dy" class="Selection" id="dy" style="width:60px">
                        <option><?php echo $y; ?></option>
                        <?php
                        for($i=date("Y"); $i>=date("Y")-90; $i--)
                        { ?>
                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php } ?>
                      </select>
                  </td>
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>Email ID </td>
              <td><label><?php echo $user; ?></label></td>
            </tr>
            <tr>
              <td height="66" rowspan="3">Gender</td>
              <td rowspan="3">&nbsp;</td>
              <td width="134" rowspan="3"><table width="80">
                <tr>
                  <td width="72"><label>
                    <input name="sex" type="radio" id="sex_0" value="1" checked="checked" />
                    Male</label></td>
                </tr>
                <tr>
                  <td width="90"><label>
                    <input type="radio" name="sex" value="2" id="sex_1" />
                    Female</label></td>
                </tr>
              </table></td>
              <td height="29" colspan="3">&nbsp;</td>
              <td rowspan="3">&nbsp;</td>
              <td>Password</td>
              <td><label>
                      <a href="change_password.php?email=<?php echo $user;?>&hash=<?php echo $pass3['PWD'];?>">Change Password</a>
              </label></td>
            </tr>
            <tr>
              <td width="84" height="34">Blood Group</td>
              <td width="74"><select name="jumpMenu" id="jumpMenu">
                <option><?php echo $row['Bloodgroup']; ?></option>
                <?php
                    $sql = "SELECT DISTINCT BloodGroup FROM bloodgroup;";
                    $result = mysql_query($sql);
                    while ($row1 = mysql_fetch_array($result)) {
                ?>
                    <option><?php echo $row1["BloodGroup"];?></option>
                <?php
                    }
                ?>
                
              </select></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><label>
                      &nbsp;
              </label></td>
            </tr>
            <tr>
              <td height="46">Weight</td>
              <td width="74"><input name="weight" type="text" id="weight" value="<?php echo $row['Weight']; ?>" size="15" /></td>
              <td>&nbsp;</td>
              <td>Address</td>
              <td><textarea name="address2" id="address2" cols="40" rows="3"><?php echo $row['Post']; ?></textarea></td>
            </tr>
            <tr>
              <td height="59">Class</td>
              <td>&nbsp;</td>
              <td><select name="admnyear" id="admnyear">
                <option><?php echo $row['AdmissionYear']?></option>
                <?php for($i = (int)date('Y'); $i > ((int)date('Y') - 20); $i--) {?>
                <option><?php echo (string)$i;?></option>
                <?php }?>
              </select>
              </td>
              <td><select name="branch" id="branch">
                <option><?php echo $row['Branch']?></option>
                <?php
                    $sql = "SELECT DISTINCT course FROM course;";
                    $result = mysql_query($sql);
                    while ($row1 = mysql_fetch_array($result)) {
                ?>
                    <option><?php echo $row1["course"];?></option>
                <?php
                    }
                ?>

              </select>
              </td>              
              <td><select name="batch" id="batch">
                <option><?php echo $row['Batch']?></option>
                <?php
                    $sql = "SELECT DISTINCT Batch FROM batch_list;";
                    $result = mysql_query($sql);
                    while ($row1 = mysql_fetch_array($result)) {
                ?>
                    <option><?php echo $row1["Batch"];?></option>
                <?php
                    }
                ?>

              </select>
              </td>
              <td>&nbsp;</td> <td>&nbsp;</td>
              <td>Last Donation</td>
              
                <td width="50" height="62"><select  name="ld" class="Selection" id="ld" style="width:50px">
                      <option><?php echo date("d"); ?></option>
                      <?php for($i=1; $i<=31; $i++) { ?>
                      <option value="<?php echo $i;?>"  >
                      <?php  echo $i;?>
                      </option>
                      <?php } ?>
                    </select>
                  <select name="lm" class="Selection" id="lm"  style="width:100px">
                      <option value=<?php echo date("m"); ?>><?php echo date( 'F', mktime(0, 0, 0, $m) );?></option>
                      <?php
                        for($i=1; $i<=12; $i++)
                        { ?>
                      <option value="<?php echo $i;?>" > <?php echo  substr(date("F", strtotime("".$i."/1/1") ),0,9) ; ?> </option>
                      <?php } ?>
                  </select>
                  <select name="ly" class="Selection" id="ly" style="width:60px">
                        <option><?php echo date("Y"); ?></option>
                        <?php
                        for($i=date("Y"); $i>=date("Y")-90; $i--)
                        { ?>
                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php } ?>
                      </select>
                  </td>
              
              <td>&nbsp;</td>

            </tr>
            <tr>
            <td height="55" colspan="0">District</td>
            <td>&nbsp;</td>
            <td height="55" colspan="8" align="left">
                  <select name="address3" id="address3" style="width:300px" title="<?php echo $row['District']?>">
                    <option><?php echo $row['District']?></option>
                    <?php
                    $sql = "SELECT * FROM `district`;";
                    $result = mysql_query($sql);
                    while ($row1 = mysql_fetch_array($result)) {
                ?>
                    <option><?php echo $row1["Name"];?></option>
                <?php
                    }
                ?>
                </select>
                  <!--<input name="address3" type="text" id="address3" style="width:300px" value="<?php //echo $row['District']; ?>" size="100" />-->
              </td></tr><tr>
              <td colspan="9"><div align="center">
                <p>&nbsp; </p>
                <p>
                  <input type="submit" name="submit" id="submit" value="Submit" style="width:100px"  />
                </p>
              </div></td>
            </tr>
          </table>
        </form></td>
      </tr>
      <tr bgcolor="#990000">
        <td height="15" colspan="3"><div align="right"><span class="style4">&nbsp;&nbsp;</span> </div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
