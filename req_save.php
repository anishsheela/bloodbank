<?php
  ob_start();
	session_start(); 
   include("./cnn.php");


	$pname="";
	$pDisease="";
	$psex="";
	$pbgroup = "";
	$pquantity = 0;
	$pReqdate = 0;
	$pphone = "";
	$pContaactP = "";
	$phouse="";
	$pplace="";
	$ppostoff="";
	$result="";
	$result1="";
	$pa="";
	$plast="";
    $Drref="";
	$pHouse="";
	$address2="";
	$address3="";
	$pHospital="";
	if(isset($_POST["pname"])) 
	{
		if( trim($_POST["pname"]) != "" ) $pname = trim($_POST["pname"]);
		if( trim($_POST["pDOB"]) != "" ) $pDisease = trim($_POST["pDOB"]);
		if( trim($_POST["psex"]) != "" ) $psex = trim($_POST["psex"]);
		if( trim($_POST["pjumpMenu"]) != "" ) $pbgroup = trim($_POST["pjumpMenu"]);
		if( trim($_POST["pquantity"]) != "" ) $pquantity = trim($_POST["pquantity"]);
		if( trim($_POST["pReqdate"]) != "" ) $pReqdate = trim($_POST["pReqdate"]);
		if( trim($_POST["pContaactP"]) != "" ) $pContaactP = trim($_POST["pContaactP"]);
		if( trim($_POST["pphone"]) != "" ) $pphone = trim($_POST["pphone"]);
		if( trim($_POST["Drref"]) != "" ) $Drref = trim($_POST["Drref"]);
		if( trim($_POST["address"]) != "" ) $pHouse = trim($_POST["address"]);
		if( trim($_POST["address2"]) != "" ) $place = trim($_POST["address2"]);
		if( trim($_POST["address3"]) != "" ) $postoff = trim($_POST["address3"]);
		if( trim($_POST["pHospital"]) != "" ) $pHospital = trim($_POST["pHospital"]);
		
  	     		
		$result="INSERT INTO request  (PName,BGroup,Quantity,NeedDate,DrRef,Disease,Gender,ContactP,ContactPh,PHouse,PPlace,Post,Hospital) VALUES ('$pname','$pbgroup',$pquantity,STR_TO_DATE('".$_POST["ney"]."-".$_POST["nem"]."-".$_POST["ned"]."','%Y-%m-%d'),'$Drref','$pDisease',$psex,'$pContaactP','$pphone','$pHouse','$place','$postoff','$pHospital')";
		echo $result;
	//
				
				if(!mysql_query($result,$link)) 
				   {die ('Error' . mysql_error());
				   }
				    else
				   { 
				  //mysql_query($result1,$link);	 
				    $_SESSION['key1']='queee';
				 
					header( 'Location: ./issue.php');}
   }
?>