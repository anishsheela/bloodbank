<?php
 require("./cnn.php");
 require './recaptcha/recaptchalib.php';

/*$mailhide_pubkey = '6Lcd87oSAAAAAIjpzZC74bCCtSOMVRRiHnmTy2Mb';
$mailhide_privkey = '6Lcd87oSAAAAADrp5eUYCPPjX518FWsr87RfU9L5';*/
 ?>
<script type= "text/javascript">
    var RecaptchaOptions = {
        theme: 'clean'
    };
</script>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Comments</title>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="848" height="374" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="121"><a href="index.php"><img src="images/title.jpg" width="1000" height="121" /></a></td>
      </tr>
      <tr bgcolor="#CC9933">
        <td height="31" bgcolor="" >&nbsp;</td>
      </tr>
      <tr bgcolor="#CC9933">
        <td height="184" valign="top" bgcolor="#FFCCFF" >
          <table width="100%" border="0">
            <tr>
              <td bordercolor="#000000" bgcolor="#CACBB4"><?php include "post.php"; ?></td>
            </tr>
          </table>
        <p>&nbsp;</p>
		<?php  
		 $SEL=mysql_query("SELECT * FROM comments ORDER BY Time DESC");
 while ($asd=mysql_fetch_array($SEL))
  {
       ?>
        <table width="500" border="1" align="center" bordercolor="#000000" bgcolor="#FFFFCC">
		
	      <tr>
            <td width="128"><table width="227" border="0" bgcolor="#FF6600">
              <tr>
                <td colspan="2"><?php echo $asd['name']; ?> <span class="style8">Says.... </span></td>
              </tr>
              <tr>
                <td width="70">&nbsp;</td>
                <td width="147" bgcolor="#FFFF00"><?php echo $asd['place']; ?> </td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td bgcolor="#FFFF33"><?php echo $asd['email']; /*recaptcha_mailhide_html ($mailhide_pubkey, $mailhide_privkey, $asd['email']);*/ ?> </td>
              </tr>
            </table></td>
            <td width="362" bgcolor="#FFFFFF"><?php echo $asd['comment']; ?></td>
          </tr>
        </table>
    <?php
    }
    ?>
          <p></p></td>
      </tr>
      <tr bgcolor="#CC9933">
        <td bgcolor="#FFCCFF">&nbsp;</td>
      </tr>
      
    </table>
	</td>
  </tr>
</table>
</body>
</html>