<?php

// Connection settings
require 'cnn.php';

// New calculate class from Kevin Madhu <kevin.madhu@gmail.com>

function calculate_class($reg_id) {
	$semesters = array("S1S2", "S3", "S4", "S5", "S6", "S7", "S8");
	//For eg. S1S2 is in the period of 12 months(including vacation), S2 is in the period of 14-20 months etc
    $periods = array(14, 20, 26, 32, 38, 44, 50);

	$query = "SELECT AdmissionYear, Branch, Batch FROM registration WHERE Regid = " . $reg_id;
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    
	$admn_date = mktime(0, 0, 0, 1, 1, $row['AdmissionYear']); //result from db
	$branch = $row['Branch']; //result from db
    $batch = $row['Batch'];

	$then_year = date("Y", $admn_date);
	$then_month = date("m", $admn_date);

	$month = 0;
	do {
		if($then_month == 12) {
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
	}while(1);

	if($month >= 0 and $month <= $periods[0])
		$semester = 0;
	else
		for($i = 1; $i < 7; ++$i) {
			if(($month > $periods[$i - 1]) and ($month <= $periods[$i])) {
				$semester = $i;
				break;
			}
		}

	return $semesters[$semester] . $branch;
}
// There is some bugs in this function. Please correct it.
/*function calculate_class($regid) {
    // Select row and database
    $sql = 'SELECT * FROM `registration` WHERE Regid = '.$regid.';';
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
    // If Designation is != student then class is Destignation
    if($row['Designation'] != 'Student') {
        return $row['Designation'];
    } else {
        // Assign the year, Branch and batch to variables
        $year = (int)$row['AdmissionYear'];
        $year = 2007;
        $branch = $row['Branch'];
        $batch = $row['Batch'];

        // Calculate the no: of months studied
        $yearnow = (int)date('Y');
        $yeardiff = $yearnow - $year;
        $months_studied = ($yeardiff * 12) + (int)date('m') - 7;

        // If month < 11 then s1s2
        if($months_studied < 11){
            return 'S1S2'.$batch;
        } else if($months_studied < 48){
            $semester = (int)($months_studied / 6);
            return 'S'.$semester.$branch;
        } else {
            return 'Alumini '.$year.' '.$branch;
        }

        // Append the class and batch if year == current. Else class and batch
    }
}*/

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
