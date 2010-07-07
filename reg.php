<?php ob_start();

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//E N" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register a Donor</title>

<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<style type="text/css">
<!--
#header {
    font-size: 150pt;
    font-weight: bold;
    color: #000000;
}
-->
</style>
</head>

<body>
<script type="text/javascript">
function validate(form_id,email) {
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = document.forms[form_id].elements[email].value;
   if(reg.test(address) == false) {
      alert('Invalid Email Address');
      return false;
   }
}
function check() {
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
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
    if(document.formcheck.Regdate.value=="") {
        alert("Enter Your Age");
        document.formcheck.Regdate.focus();
        return false;
    }
    if(document.formcheck.Regdate.value < 18) {
        alert("You must be above 18 to donate blood.");
        document.formcheck.Regdate.focus();
        return false;
    }
    if(document.formcheck.classs.value=="") {
        alert("Select the class");
        document.formcheck.quantity.focus();
        return false;
    }
    if(document.formcheck.jumpMenu.selectedIndex==0) {
        alert("Select Your Blood Group");
        document.formcheck.jumpMenu.focus();
        return false;
    }
    if(document.formcheck.weight.value=="") {
        alert("Enter Weight");
        document.formcheck.weight.focus();
        return false;
    }
    if(document.formcheck.last.value=="") {
        alert("Enter Last Donated Date(Put 0 if never donate)");
        document.formcheck.last.focus();
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
    if(document.formcheck.address3.value=="Select") {
        alert("Select District");
        document.formcheck.address3.focus();
        return false;
    }
}
</script>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="900" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="900" colspan="3"><a href="index.php"><img src="images/title.jpg" width="1000" height="121" border="0" /></a></td>
        </tr>
      <tr bgcolor="#CC9933">
        <td height="292" colspan="3">
       <form name="formcheck" id="formcheck" onsubmit="javascript:return check();" action="./reg_save.php" method="post">

          <table width="790" border="0" align="center" cellpadding="5" cellspacing="0" >
            <tr>
              <td height="55" colspan="10"><div align="center"><span class="header"><strong>REGISTRATION FORM</strong></span></div></td>
              </tr>
            <tr>
              <td width="51">Name</td>
              <td width="1">&nbsp;</td>
              <td colspan="4"><label>
                <input name="name" type="text" id="name" size="35" maxlength="100" style="width:300px" />
              </label></td>
              <td width="1">&nbsp;</td>
              <td width="146">Contact No</td>
              <td width="153"><label>
                <input type="text" name="phone" id="phone" maxlength="100" style="width:150px"/>
              </label></td>
              <td width="153"><label>
                      <input type="checkbox" name="publish" checked="false" />
                Publish</label></td>
            </tr>
            <tr>
              <td height="32">Age</td>
              <td>&nbsp;</td>
              <td colspan="4"><label>
                <input name="Regdate" type="text" id="Regdate"  style="width:300px" value="18" />
              </label></td>
              <td>&nbsp;</td>
              <td>Email ID </td>
              <td colspan="2"><label>
                <input type="text" name="email" id="email"  maxlength="100" style="width:300px"/>
              (This will be your username for login)</label></td>
            </tr>
            <tr>
              <td height="66" rowspan="3">Gender</td>
              <td rowspan="3">&nbsp;</td>
              <td width="134" rowspan="3"><table width="119">
                <tr>
                  <td width="111"><label>
                    <input name="sex" type="radio" id="sex_0" value="1" checked="checked" />
                    Male</label></td>
                    </tr>
                <tr>
                  <td><label>
                    <input type="radio" name="sex" value="2" id="sex_1" />
                    Female</label></td>
                    </tr>
              </table>                </td>
              <td height="29" colspan="3">&nbsp;</td>
              <td rowspan="3">&nbsp;</td>
              <td>Password</td>
              <td colspan="2"><label>
                <input type="password" name="password" id="password"  maxlength="100" style="width:300px"/>
              </label></td>
            </tr>
            <tr>
              <td width="84" height="34">Blood Group</td>
              <td width="1">&nbsp;</td>
              <td width="74"><select name="jumpMenu" id="jumpMenu">
                <option value="0" selected="selected">Select</option>
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
              <td colspan="2"><label>
              <input type="password" name="repass" id="repass"  maxlength="100" style="width:300px"/>
              </label></td>
            </tr>
            <tr>
              <td height="46">Weight</td>
              <td width="1">&nbsp;</td>
              <td width="74"><input name="weight" type="text" id="weight" size="5" /></td>
              <td>Address</td>
              <td colspan="2"><textarea name="address2" cols="100" id="address2" style="width:300px"></textarea></td>
            </tr>
            <tr>
              <td height="59">Class</td>
              <td>&nbsp;</td>
              <td><select name="classs" id="classs">
                <!--  <option value="0" selected="selected">Select</option> -->
                <option selected="selected" value="0">Select</option>
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

              </select></td>
              <td>Times Donated</td>
              <td>&nbsp;</td>
              <td><label>
              <input name="last" type="text" id="last" size="5" value="0" />
              </label></td>
              <td>&nbsp;</td>
              <td>District</td>
              <td colspan="2">
                <select name="address3" id="address3" style="width:300px">
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
              </td>
            </tr>
            
            <tr>
              <td height="74" colspan="10"> <div align="center">
                <p><input type="submit" name="submit" id="submit" value="Submit" style="width:100px"  />                
                                    
                  <input type="reset" name="reset" id="reset" value="Reset"  style="width:100px" />
                </p>
                </div>              </td>
              </tr>
          </table>
            </form>
          </td>
        </tr>
      <tr bgcolor="#990000">
        <td height="15" colspan="3" bgcolor="#FFFFFF"><div align="center"><span class="style4 style3"><a href="privacy.xhtml">Privacy Policy</a></span></div></td>
      </tr>
      
    </table></td>
  </tr>
</table>

</body>
</html>
