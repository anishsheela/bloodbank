<?php

// Connection settings
require("./cnn.php");

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

function change_date_format($date){

       list($year,$month,$day) = explode("-",$date);
       $newdate = $day."/".$month."/".$year;
       return $newdate;
}
?>
