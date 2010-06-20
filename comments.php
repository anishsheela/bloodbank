<?php
 include("./cnn.php");
 ?>



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
        <td height="184" valign="top" bgcolor="#FFCCFF" ><form id="form1" name="form1" method="post" action="">
          <table width="100%" border="0">
            <tr>
              <td bordercolor="#000000" bgcolor="#CACBB4"><?php include "post.php"; ?></td>
            </tr>
          </table>
                </form>
        <p>&nbsp;</p>
		<?php  
		 $SEL=mysql_query("SELECT * FROM comments ");
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
                <td bgcolor="#FFFF33"><?php echo $asd['email']; ?> </td>
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