<?php
 include_once("./cnn.php");
$mg="";  
$name=$_POST['name'];
$place=$_POST['place'];
$email=$_POST['email'];
$comment=$_POST['comment'];

if(isset($_POST['post']))
{
if($name !="" && $place!="" && $email!="" && $comment!="")
{
$insert="INSERT INTO comments VALUES('$name','$place','$email','$comment')";
mysql_query($insert,$link);
$name="";
$place="";
$email="";
$comment="";
$mg=""; 
}
else
{$mg='!!!!!!!!!!!!Enter All Datas!!!!!!!!!!!!!!!!!!!';}
}
if(isset($_POST['reset']))
{
$name="";
$place="";
$email="";
$comment="";
$mg=""; 
//header("Location: ./speak.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<body>
<form id="form" name="form" method="post" action="">
  <p class="style9">Post Your Comments</p>
  <table width="500" border="0" align="center" bordercolor="#000000" bgcolor="#FFFFFF">
       <tr>
      <td width="128" rowspan="2"><table width="227" border="0" bgcolor="#FFFFFF">
          <tr>
            <td bordercolor="#FFFFFF" bgcolor="#FFFFFF">Name</td>
            <td bordercolor="#FFFFFF" bgcolor="#FFFFFF"><input name="name" type="text" id="name" /></td>
          </tr>
          <tr>
            <td width="70" bordercolor="#FFFFFF" bgcolor="#FFFFFF">Place</td>
            <td width="147" bordercolor="#FFFFFF" bgcolor="#FFFFFF"><input name="place" type="text" id="place" /></td>
          </tr>
          <tr>
            <td bordercolor="#FFFFFF" bgcolor="#FFFFFF">Email ID </td>
            <td bordercolor="#FFFFFF" bgcolor="#FFFFFF"><input name="email" type="text" id="email" /></td>
          </tr>
      </table></td>
      <td width="362" bgcolor="#FFFFFF">Comment(Max 250 Letters) </td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><textarea name="comment" cols="50" rows="3" id="comment"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#FFFFFF">
        
        <div align="center">
          <input name="post" type="submit" id="post" value="Post" />
          <input type="submit" name="reset" value="Reset" id="reset" />
        <?php echo $mg; ?></div></td></tr>
  </table>
</form>
</body>
</html>