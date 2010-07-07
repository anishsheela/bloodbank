<?php ob_start(); ?>
<?php
session_start(); 
if($_SESSION['key']!='admin')
{   session_destroy(); 
	header( 'Location: ./index.php');
				 } 
?>
<?php

	include("./cnn.php");
	
			
				if(isset($_POST['sub']))
				{
					if(isset($_POST['reqs']))
					
					{
						$reqid = $_POST['reqs'];
						 
																										
						foreach ($reqid as $reqs) 
						{
												
							
							$result1="UPDATE request SET Status = 'R'  WHERE ReqID  = '$reqs'";
							if(!mysql_query($result1,$link)) 
							   {die ('Error' . mysql_error());
							   }
				    	}
					}
					}
					
				   
			
	
	
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//E N" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reject</title>
</head>

<body>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="848" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><a href="index.php"><img src="images/title.jpg" width="1000" height="121" border="0" /></a></td>
        </tr>
      <tr bgcolor="#CC9933">
        <td width="867" height="34"><strong> &nbsp;&nbsp;List of Donors  Blood Group        
           
        </strong></td> 
        <td width="133">&nbsp;</td>
      </tr>
      <tr bgcolor="#CC9933">
        <td height="146" colspan="2"><table width="100%" cellspacing="0" cellpadding="0">
        <form name="form1" action="allott_reject.php" method="post">
          
          <tr>
            <td><table width="713" align="center" cellpadding="5" cellspacing="0">
                <tr>
                  <td  width="23">Reject</td>
                  <td width="470">Name</td>
                  <td width="188" >Blood Gr</td>
                  <td width="188" >Quantity</td>
                  <td width="188" >Date Required</td>
                </tr>
                <?php
										
										$sql = "select * from request where Status='N'";
										$rst = mysql_query($sql);
										
										$rcolor="#CCCCCC";
										while($row=mysql_fetch_array($rst))
										{
										
											if($rcolor == "#CCCCCC") 	$rcolor = "#FFFFFF";
											else   $rcolor = "#CCCCCC";
											?>
                <tr>
                  <td bgcolor="<?php echo $rcolor;?>"><input type="checkbox" name="reqs[]" id="reqs[]" value="<?php echo $row["ReqID"]; ?>" /></td>
                  <td bgcolor="<?php echo $rcolor;?>"><?php echo $row["PName"]; ?></td>
                  <td bgcolor="<?php echo $rcolor;?>"><?php echo $row["BGroup"]; ?></td>
                 <td bgcolor="<?php echo $rcolor;?>"><?php echo $row["Quantity"]; ?></td>
                  <td bgcolor="<?php echo $rcolor;?>"><?php echo $row["NeedDate"]; ?></td>
                </tr>
                <?php
										}
									?>
            </table></td>
          </tr>
          <tr>
            <td><br />
                <input type="submit" name="sub" id="sub" value="Reject" />
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