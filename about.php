<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//E N" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<?php
function  class_calculate($admn_year, $branch, $batch, $designation)
{
		/*
			Author:		Kevin Madhu
			Mail:		kevin.madhu@gmail.com

			Description:	The function calculates and returns the current semester of a student, merges it with his/her Branch and returns it.
		*/

		//Name of semesters for B.Tech, MCA...
		$semesters_btech = array("S1S2", "S3", "S4", "S5", "S6", "S7", "S8");
		$semesters_mca = array("S1", "S3", "S4", "S5", "S6");

		//The period(in months) for each semester. For eg. S1S2 is in the period of 12 months(including vacation), S2 is in the period of 14-20 months etc
    		$periods_btech = array(14, 20, 26, 32, 38, 44, 50);
    		$periods_mca = array(6, 20, 26, 32, 38, 44, 50);


		if($designation == "")
		{
			$admn_date = mktime(0, 0, 0, 1, 1, $admn_year);
			$then_year = date("Y", $admn_date);
			$then_month = date("m", $admn_date);

			$month = 0;

			do
			{
				if($then_month == 12)
				{
					++$then_year;
					$then_month = 1;
				}

				else
					++$then_month;

				$then_timestamp = mktime(24, 0, 0, $then_month, 1, $then_year);

				if($then_timestamp < time())
					++$month;
				else
					break;
			}
			while(1);

			if($branch == "MCA")
			{
				$periods = $periods_mca;
				$semesters = $semesters_mca;
				$limit = 7;
			}

			else
			{
				$periods = $periods_btech;
				$semesters = $semesters_btech;
				$limit = 7;
			}

			$semester = -1;

			if($month >= 0 and $month <= $periods[0])
				$semester = 0;
			else
				for($i = 1; $i < 7; ++$i)
				{
					if(($month > $periods[$i - 1]) and ($month <= $periods[$i]))
					{
						$semester = $i;
						break;
					}
				}

			if($semester == -1)
				return "Alumini" . $admn_year . $branch ;
			else
				return $semesters[$semester] . $branch;
		}

		else
			return $designation;
}

require 'cnn.php';
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>About Us</title>
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
        <td height="184" bgcolor="#FFFFFF" ><div align="left" style="padding: 10px">
          <p align="center"><strong>NSS Online Blood Donor's Directory Team</strong></p>
          <p><b> Thanks to </b></p>
          <?php
              $sql = 'SELECT * FROM operator ORDER BY operator';
              $result = mysql_query($sql);
              while($row = mysql_fetch_array($result)) {
                  if($row['role']=='thanks') {
                    $str = $row['operator'].' ';
                    if( $row['phone'] != '' && $row['email'] != "") {
                        $str .= '('.$row['phone'].', <a href="mailto:'.$row['email'].'">'.$row['email'].'</a>)';
                    } elseif( $row['phone'] != '' && $row['email'] == "") {
                        $str .= '('.$row['phone'].')';
                    } elseif( $row['phone'] == '' && $row['email'] != "") {
                        $str .= '(<a href="mailto:'.$row['email'].'">'.$row['email'].'</a>)';
                    } elseif( $row['phone'] == '' && $row['email'] == "") {
                        ;
                    }
                    $class = class_calculate($row['admission_year'], $row['branch'], $row['batch'], $row['designation']);
                    $str .= ', '.$class;
                    $str .= "<br/>";
                    echo $str;
                  }
              }
          ?>
          <p><b>Development Team</b></p>
          <?php
              $sql = 'SELECT * FROM operator ORDER BY operator';
              $result = mysql_query($sql);
              while($row = mysql_fetch_array($result)) {
                  if($row['role']=='dev') {
                    $str = $row['operator'].' ';
                    if( $row['phone'] != '' && $row['email'] != "") {
                        $str .= '('.$row['phone'].', <a href="mailto:'.$row['email'].'">'.$row['email'].'</a>)';
                    } elseif( $row['phone'] != '' && $row['email'] == "") {
                        $str .= '('.$row['phone'].')';
                    } elseif( $row['phone'] == '' && $row['email'] != "") {
                        $str .= '(<a href="mailto:'.$row['email'].'">'.$row['email'].'</a>)';
                    } elseif( $row['phone'] == '' && $row['email'] == "") {
                        ;
                    }
                    $class = class_calculate($row['admission_year'], $row['branch'], $row['batch'], $row['designation']);
                    $str .= ', '.$class;
                    $str .= "<br/>";
                    echo $str;
                  }
              }
          ?>
          <p><b>First Development Team </b></p>
          <p>Navaneeth T(9947834438, <a href="mailto:navanjo@gmail.com">navanjo@gmail.com</a> ),<br/>
            Ameena Musthafa, Neethu K V, Vineeth K<br />
            3rd Year BSc Computer Sciences<br />
            IHRD Applied Sciences College</p>
          <p><b>Data Entry Team</b></p>
          <?php
              $sql = 'SELECT * FROM operator ORDER BY operator';
              $result = mysql_query($sql);
              while($row = mysql_fetch_array($result)) {
                  if($row['role']=='data') {
                    $str = $row['operator'].' ';
                    if( $row['phone'] != '' && $row['email'] != "") {
                        $str .= '('.$row['phone'].', <a href="mailto:'.$row['email'].'">'.$row['email'].'</a>)';
                    } elseif( $row['phone'] != '' && $row['email'] == "") {
                        $str .= '('.$row['phone'].')';
                    } elseif( $row['phone'] == '' && $row['email'] != "") {
                        $str .= '(<a href="mailto:'.$row['email'].'">'.$row['email'].'</a>)';
                    } elseif( $row['phone'] == '' && $row['email'] == "") {
                        ;
                    }
                    $class = class_calculate($row['admission_year'], $row['branch'], $row['batch'], $row['designation']);
                    $str .= ', '.$class;
                    $str .= "<br/>";
                    echo $str;
                  }
              }
          ?>
          </div></td>
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