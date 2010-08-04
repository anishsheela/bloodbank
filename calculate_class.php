<?php
	// Connection settings
	require 'cnn.php';
?>

<?php
	function calculate_class($reg_id)
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

		$query = "SELECT AdmissionYear, Branch, Batch, Designation FROM registration WHERE Regid = " . $reg_id;
    		$results = mysql_query($query);
		$result = mysql_fetch_array($results);
    
		$designation = $result['Designation'];

		if($designation == "Student")
		{
			$admn_year = $result['AdmissionYear'];
			$admn_date = mktime(0, 0, 0, 1, 1, $admn_year); //result from db
			$branch = $result['Branch']; //result from db
			$batch = $result['Batch'];

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
			return "Staff";
}

// Change date format from dd-mm-yyyy to dd/mm/yyyy
function change_date_format($date){
       list($year,$month,$day) = explode("-",$date);
       $newdate = $day."/".$month."/".$year;
       return $newdate;
}

// Convert age to approximate date of birth.
function agetodob($age){
    $birthdate = (date('Y') - $age).'-1-1';
    $dob = date('Y-m-d H:i:s', strtotime($birthdate));
    return $dob;
}

// Function to convert admission year to agge, assuming the person had
// compleated 18 years at the year of joining
function admnyeartoage($year) {
    return (date('Y') - $year + 18);
}

// Convert admission year directly to date of birth.
function admnyeartodob($year) {
    return agetodob(admnyeartoage($year));
}


/*
* Function to turn a mysql datetime (YYYY-MM-DD HH:MM:SS) into a unix timestamp
* @param str
* The string to be formatted
*/

function date2timestamp($str) {
    list($date, $time) = explode(' ', $str);
    list($year, $month, $day) = explode('-', $date);
    $timestamp = mktime(0, 0, 0, $month, $day, $year);
    return $timestamp;
}

// Function that calculates age from date of birth
function getAge($iTimestamp)
{
    // See http://php.net/date for what the first arguments mean.
    $iDiffYear  = date('Y') - date('Y', $iTimestamp);
    $iDiffMonth = date('n') - date('n', $iTimestamp);
    $iDiffDay   = date('j') - date('j', $iTimestamp);

    // If birthday has not happen yet for this year, subtract 1.
    if ($iDiffMonth < 0 || ($iDiffMonth == 0 && $iDiffDay < 0))
    {
        $iDiffYear--;
    }

    return $iDiffYear;
}

// Function to split a given date and return day, month and year, in order
// as an array.
function split_date($date) {
   list($year,$month,$day) = explode("-",$date);
   return array ($day,$month,$year);
}

// Function to convert the date, month, year to mysql date
function dmy2mysql($d, $m, $y) {
    $time_stamp = mktime(0, 0, 0, $m, $d, $y);
    return date( 'Y-m-d', $time_stamp );
}
?>
