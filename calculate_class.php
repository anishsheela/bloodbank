<?php

// Connection settings
require("./cnn.php");

// There is some bugs in this function. Please correct it.
function calculate_class($regid) {
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
?>
