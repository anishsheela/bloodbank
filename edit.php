<?php ob_start(); ?>

<?php
session_start();
$user=$_SESSION['key'];

?>
<?php
 include("./cnn.php");
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
<script language="JavaScript">
function check()
{
if(document.formcheck.password.value !== document.formcheck.repass.value)
{
alert("Password Mismatch Please Check It");
document.formcheck.repass.focus();
return false;
}
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="900" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="900" colspan="3"><img src="images/title.jpg" width="1000" height="121" border="0" /></td>
      </tr>
      <tr bgcolor="#CC9933">
        <td height="292" colspan="3"><form name="formcheck" id="formcheck" onsubmit="return check();"form="form" action="./edit_save.php" method="post">
          <table width="790" border="0" align="center" cellpadding="5" cellspacing="0" >
            <tr>
              <td height="55" colspan="9"><div align="center"><span class="style3 style1"><strong>PROFILE EDIT PAGE</strong></span></div></td>
            </tr>
            <tr>
              <td width="51">Name</td>
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
                ?>" />
                Publish</label></td>
            </tr>
            <tr>
              <td height="32">Age</td>
              <td>&nbsp;</td>
              <td colspan="4"><label>
                <input name="Regdate" type="text" id="Regdate"  style="width:300px" value="<?php echo $row['DOB']; ?>" />
              </label></td>
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
                  <td><label>
                    <input type="radio" name="sex" value="2" id="sex_1" />
                    Female</label></td>
                </tr>
              </table></td>
              <td height="29" colspan="3">&nbsp;</td>
              <td rowspan="3">&nbsp;</td>
              <td>Password</td>
              <td><label>
                <input name="password" type="password" id="password" style="width:300px" value="<?php echo $pass3['PWD']; ?>"  maxlength="100"/>
              </label></td>
            </tr>
            <tr>
              <td width="84" height="34">Blood Group</td>
              <td width="1">&nbsp;</td>
              <td width="74"><select name="jumpMenu" id="jumpMenu">
                <option value="<?php echo $row['Bloodgroup']; ?>" selected="selected"><?php echo $row['Bloodgroup']; ?></option>
                <option>O+ve</option>
                <option>A+ve</option>
                <option>B+ve</option>
                <option>AB+ve</option>
                <option>O-Ve</option>
                <option>A-ve</option>
                <option>B-ve</option>
                <option>AB-ve</option>
              </select></td>
              <td>Re-Enter Password</td>
              <td><label>
                <input name="repass" type="password" id="repass" style="width:300px" value="<?php echo $pass3['PWD']; ?>"  maxlength="100"/>
              </label></td>
            </tr>
            <tr>
              <td height="46">Weight</td>
              <td width="1">&nbsp;</td>
              <td width="74"><input name="weight" type="text" id="weight" value="<?php echo $row['Weight']; ?>" size="15" /></td>
              <td>Address</td>
              <td><input name="address2" type="text" id="address2" style="width:300px" value="<?php echo $row['Post']; ?>" size="100" /></td>
            </tr>
            <tr>
              <td height="59">Class</td>
              <td>&nbsp;</td>
              <td><select name="classs" id="classs">
                <option value="<?php echo $row['Class']?>"><?php echo $row['Class']?></option>
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
              </td>
              <td>Times Donated</td>
              <td>&nbsp;</td>
              <td><label>
                <input name="last" type="text" id="last" value="<?php echo $row['LastDonation']; ?>" size="15" />
              </label></td>
              <td>&nbsp;</td>
              <td>District</td>
              <td>
                  <select name="address3" id="address3" style="width:300px" title="<?php echo $row['District']?>">
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
                  <!--<input name="address3" type="text" id="address3" style="width:300px" value="<?php //echo $row['District']; ?>" size="100" />-->
              </td>
            </tr>
            <tr>
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
