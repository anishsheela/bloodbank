<?php ob_start(); ?>

<?php
session_start(); 
if($_SESSION['key']!='admin')
{   session_destroy(); 
	header( 'Location: ./index.php');
				 } 
?>
<?php

require("./cnn.php");


if(isset($_POST['sub'])){
    if(isset($_POST['rid']))
    {   $req_element="";
        $qty_element=0;

        $requests = $_POST['rid'];

        foreach ($requests as $request){
            if(isset($_POST["req".$request]))
                if(trim($_POST["req".$request]) != "")
                    $req_element = $_POST["req".$request];
            if(isset($_POST["grp".$request]))
                if(trim($_POST["grp".$request]) != "")
                    $grp_element = $_POST["grp".$request];
                if(isset($_POST["qty".$request]))
                    if(trim($_POST["qty".$request]) != "")
                        $qty_element = $_POST["qty".$request];
                    $A=DATE("m/d/y");

            $result1="UPDATE request SET Status = 'Y' , AQty = '$qty_element' , ADate= '$A' WHERE ReqID  = '$request'";
            mysql_query($result1,$link);
            $result1="UPDATE stock SET Stock = Stock - $req_element  WHERE BGroup  ='$grp_element'";
            mysql_query($result1,$link);
        }
    }
}



								
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//E N" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Alloted list</title>
</head>

<body>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="848" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><a href="index.php"><img src="images/title.jpg" width="1000" height="121" /></a></td>
        </tr>
      <tr bgcolor="#CC9933">
        <td width="867" height="34"><strong> &nbsp;&nbsp;Allottement of Blood        
           
        </strong></td> 
        <td width="133">&nbsp;</td>
      </tr>
      <tr bgcolor="#CC9933">
        <td height="146" colspan="2"><table width="100%" cellspacing="0" cellpadding="0">
        <form name="form1" action="allott.php" method="post">
          
          <tr>
            <td><table width="713" align="center" cellpadding="5" cellspacing="0">
                <tr>
                  <td width="10"></td>
                  <td width="470">Name</td>
                  <td width="188" >Blood Group</td>
                  <td width="188" >Req.Quantity</td>
                  <td width="188" >Quantity</td>
                  <td width="500" >Date Required</td>
                </tr>
                <?php
										
                $sql = "select * from request where Status='N'";
                $rst = mysql_query($sql);

                $rcolor="#CCCCCC";
                while($row=mysql_fetch_array($rst)){

                        if($rcolor == "#CCCCCC")
                            $rcolor = "#FFFFFF";
                        else
                            $rcolor = "#CCCCCC";
                ?>
                <tr>
                  <td bgcolor="<?php echo $rcolor;?>"><input name="rid[]" type="checkbox" id="rid<?php echo $row["ReqID"]; ?>" value="<?php echo $row["ReqID"]; ?>" style="visibility:hidden" /></td>
                  <td bgcolor="<?php echo $rcolor;?>"><?php echo $row["PName"]; ?></td>
                  <td bgcolor="<?php echo $rcolor;?>"><?php echo $row["BGroup"]; ?></td>
                  <input type="hidden" name="grp<?php echo $row["ReqID"]; ?>" id="reqs3[]" value="<?php echo $row["BGroup"]; ?>" />
                  <td bgcolor="<?php echo $rcolor;?>"><?php echo $row["Quantity"]; ?></td>
                  <input type="hidden" name="qty<?php echo $row["ReqID"]; ?>" id="reqs4[]" value="<?php echo $row["Quantity"]; ?>" />
                  <td bgcolor="<?php echo $rcolor;?>"><input type="text" name="req<?php echo $row["ReqID"]; ?>" id="reqs1[]"  style="width:50px;" onkeypress="javascript: document.getElementById('rid<?php echo $row["ReqID"]; ?>').checked = true;" /></td>
                  <td bgcolor="<?php echo $rcolor;?>"><?php echo $row["NeedDate"]; ?></td>
                </tr>
                <?php
		}
		?>
            </table></td>

         </tr>
          <tr>
            <td><br />
                <input type="submit" name="sub" id="sub" value="Alott" />
                </form>
            </td>
          </tr>
        </table></td>
      </tr>
      <tr bgcolor="#990000">
        <td height="15" colspan="2"><div align="right"><span class="style4"><a href="main.php">HOME</a> &nbsp;&nbsp;</span> </div></td>
      </tr>
      
    </table></td>
  </tr>
</table>
</body>
</html>