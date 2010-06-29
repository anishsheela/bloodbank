<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//E N" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blood Bank Installation</title>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="848" height="374" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="121"><a href="index.php"><img src="images/title.jpg" alt="Blood Bank" width="1000" height="121" /></a></td>
        </tr>
      <tr bgcolor="#CC9933">
          <td height="31" align="center"><strong>Blood Bank Installation</strong></td>
      </tr>
      <tr bgcolor="#CC9933">
        <td height="184" bgcolor="#FFFFFF" >
            <div align="left">
                <form name="install" action="install_action.php" method="post">
                    <strong><?php echo $msg;?></strong>
                    <strong>Database Settings</strong><br/>
                    User Name : <input name="dbuser"/> <br/>
                    Password  : <input name="dbpass" type="password"/> <br/>
                    Host Name : <input name="dbhost"/> <br/>
                    Database name : <input name="dbname"/> <br/><br/>
                    <strong>User Settings</strong><br/>
                    User Name : <strong>admin</strong> <br/>
                    Password  : <input name="pass1" type="password"/> <br/>
                    Retype Password  : <input name="pass2" type="password"/> <br/>
                    <input type="submit" name="submit" id="submit" value="Install"/>
                </form>

            </div>
        </td>
      </tr>
      <tr bgcolor="#CC9933">
        <td height="19">&nbsp;</td>
      </tr>
      <tr bgcolor="#990000">
        <td height="19"><div align="right"><span class="style4"><a href="index.php" class="style5">HOME</a> &nbsp;&nbsp;</span> </div></td>
      </tr>

    </table></td>
  </tr>
</table>
</body>
</html>