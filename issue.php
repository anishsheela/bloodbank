<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//E N" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request Blood</title>

<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>

<body>
<script language="JavaScript">
<!--

/***********************************************
* Required field(s) validation v1.10- By NavSurf
* Visit Nav Surf at http://navsurf.com
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

function formCheck(formobj){
	// Enter name of mandatory fields
	var fieldRequired = Array("pname", "pDOB","psex","pweight","pquantity","pContaactP","Drref","pphone","address","pHospital", "address2");
	// Enter field description to appear in the dialog box
	var fieldDescription = Array("Patient Name", "Date Required","Sex","Weight","Quantity","Contact Person","Doctor Reference","Phone Number","Address","Hospital", "address2");
	// dialog message
	var alertMsg = "Please complete the following fields:\n";

	var l_Msg = alertMsg.length;
	
	for (var i = 0; i < fieldRequired.length; i++){
		var obj = formobj.elements[fieldRequired[i]];
		if (obj){
			switch(obj.type){
			case "select-one":
				if (obj.selectedIndex == -1 || obj.options[obj.selectedIndex].text == ""){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "select-multiple":
				if (obj.selectedIndex == -1){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			case "text":
			case "textarea":
				if (obj.value == "" || obj.value == null){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
				break;
			default:
			}
			if (obj.type == undefined){
				var blnchecked = false;
				for (var j = 0; j < obj.length; j++){
					if (obj[j].checked){
						blnchecked = true;
					}
				}
				if (!blnchecked){
					alertMsg += " - " + fieldDescription[i] + "\n";
				}
			}
		}
	}

	if (alertMsg.length == l_Msg){
		return true;
	}else{
		alert(alertMsg);
		return false;
	}
}
// -->
</script>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="1004" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1000" colspan="3"><a href="index.php"><img src="images/title.jpg" width="1000" height="121" /></a></td>
        </tr>
      <tr bgcolor="#CC9933">
        <td height="292" colspan="3">
       <form name="formcheck" id="formcheck" onsubmit="return formCheck(this);"form action="./req_save.php" method="post">

          <table width="789" border="0" align="center" cellpadding="5" cellspacing="0" >
            <tr>
              <td height="44" colspan="9"><div align="center"><span class="style3">BLOOD REQUEST</span></div></td>
              </tr>
            <tr>
              <td width="61">Patient Name</td>
              <td width="1">&nbsp;</td>
              <td colspan="4"><label>
                <input name="pname" type="text" id="pname" size="35" maxlength="100" style="width:300px" />
              </label></td>
              <td width="1">&nbsp;</td>
              <td width="52">Contact Person</td>
              <td width="300"><label>
                <input type="text" name="pContaactP" id="pContaactP" maxlength="100" style="width:300px"/>
              </label></td>
            </tr>
            <tr>
              <td>Disease</td>
              <td>&nbsp;</td>
              <td colspan="4"><label>
                <input type="text" name="pDOB" id="pDOB" style="width:300px" />
              </label></td>
              <td>&nbsp;</td>
              <td>Contact Phone</td>
              <td><label><input type="text" name="pphone" id="pphone" maxlength="100" style="width:300px"/></label></td>
            </tr>
            <tr>
              <td height="66" rowspan="2">Gender</td>
              <td rowspan="2">&nbsp;</td>
              <td width="144" rowspan="2"><table width="136">
                <tr>
                  <td width="128"><label>
                    <input type="radio" name="psex" value="1" id="sex_0" />
                    Male</label></td>
                </tr>
                <tr>
                  <td width="128"><label>
                    <input type="radio" name="psex" value="2" id="sex_1" />
                    Female</label></td>
                </tr>
              </table>                </td>
              <td width="86">Blood Group</td>
              <td width="2">&nbsp;</td>
              <td width="92">
                <select name="pjumpMenu" id="pjumpMenu">
                <option>O+ve</option>
                <option>A+ve</option>
                <option>B+ve</option>
                <option>AB+ve</option>
                <option>O-Ve</option>
                <option>A-ve</option>
                <option>B-ve</option>
                <option>AB-ve</option>
              </select></td>
              <td rowspan="2">&nbsp;</td>
              <td>Doctor</td>
              <td><label>
                <input type="text" name="Drref" id="Drref"  maxlength="100" style="width:300px"/>
              </label></td>
            </tr>
            <tr>
              <td colspan="3"><div align="center">Hospital Name</div></td>
              <td>Address</td>
              <td><textarea name="address" cols="100" id="address" style="width:300px"></textarea></td>
            </tr>
            <tr>
              <td>Quantity</td>
              <td>&nbsp;</td>
              <td><input name="pquantity" type="text" id="pquantity" value="1" /></td>
              <td colspan="3"><input type="text" name="pHospital" id="pHospital" style="width:200px"/></td>
              <td>&nbsp;</td>
              <td>District</td>
                <td colspan="2">
                <select name="address2" id="address2" style="width:300px">
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
              <td>Date Required</td>
              <td>&nbsp;</td>
              <td colspan="3"><table width="222" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="50" height="62"><select  name="ned" class="Selection" id="ned" style="width:50px">
                      <option value=<?php echo date("d"); ?>><?php echo date("d"); ?></option>
                      <?php
							for($i=1; $i<=31; $i++)  
							{
								?>
                      <option value="<?php echo $i;?>"  >
                      <?php  echo $i;?>
                      </option>
                      <?php
							}
						?>
                    </select>                  </td>
                  <td width="60" ><select name="nem" class="Selection" id="nem"  style="width:60px">
                      <option value=<?php echo date("m"); ?>><?php echo date("M"); ?></option>
                      <?php
							for($i=1; $i<=12; $i++)  
							{
								?>
                      <option value="<?php echo $i;?>" > <?php echo  substr(date("F", strtotime("".$i."/1/1") ),0,3) ; ?> </option>
                      <?php
							}
						?>
                  </select></td>
                  <td width="61">
                  <select name="ney" class="Selection" id="ney" style="width:60px">
                        <option value=<?php echo date("Y"); ?>><?php echo date("Y"); ?></option>
                        <?php
							for($i=date("Y"); $i<=date("Y")+3; $i++)   
							{
								?>
                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php
							}
						?>
                      </select>
                  </td>
                  <td width="51">&nbsp;</td>
                </tr>
              </table></td>
              <td><label></label></td>
              <td>&nbsp;</td>
              <td>Remarks</td>
              <td><textarea name="address3" cols="100" id="address3" style="width:300px"></textarea></td>
            </tr>
            
            <tr>
              <td colspan="9"> <div align="center">
                <p>
                  <input type="submit" name="submit" id="submit" value="Submit" style="width:100px"  />                
                  
                  
                  <input type="reset" name="reset" id="reset" value="Reset"  style="width:100px" />
                </p>
                </div>              </td>
              </tr>
          </table>
            </form>
          </td>
        </tr>
      <tr bgcolor="#990000">
        <td height="15" colspan="3"><div align="right"><span class="style4"><a href="main.php">HOME</a> &nbsp;&nbsp;</span> </div></td>
      </tr>
      
    </table></td>
  </tr>
</table>
</body>
</html>
