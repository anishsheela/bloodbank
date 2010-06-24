<?php
session_start();
$user=$_SESSION['key'];
?>
<?php 
	   
   include("./cnn.php");

	if(isset($_POST["name"])) 
	{
		if( trim($_POST["name"]) != "" ) $name = trim($_POST["name"]);
		if( trim($_POST["Regdate"]) != "" ) $Regdate = trim($_POST["Regdate"]);
		if( trim($_POST["sex"]) != "" ) $sex = trim($_POST["sex"]);
		if( trim($_POST["jumpMenu"]) != "" ) $bgroup = trim($_POST["jumpMenu"]);
		if( trim($_POST["quantity"]) != "" ) $quantity = trim($_POST["quantity"]);
		if( trim($_POST["phone"]) != "" ) $phone = trim($_POST["phone"]);
		if( trim($_POST["email"]) != "" ) $email = trim($_POST["email"]);
		if( trim($_POST["password"]) != "" ) $password = trim($_POST["password"]);
		if( trim($_POST["address2"]) != "" ) $post = trim($_POST["address2"]);
		if( trim($_POST["address3"]) != "" ) $district = trim($_POST["address3"]);
		if( trim($_POST["weight"]) != "" ) $weight = trim($_POST["weight"]);
                if( trim($_POST["last"]) != "" ) $last1 = trim($_POST["last"]);
                if( trim($_POST["admnyear"]) != "" ) $admnyear = trim($_POST["admnyear"]);
                if( trim($_POST["branch"]) != "" ) $branch = trim($_POST["branch"]);
                if( trim($_POST["batch"]) != "" ) $batch = trim($_POST["batch"]);

                $last2 = str_replace('/', '-', $last1);
                $last = date('Y-m-d H:i:s', strtotime($last2));
                $result="UPDATE registration SET Name='$name',DOB='$Regdate',Gender='$sex',Bloodgroup='$bgroup',Weight='$weight',AdmissionYear='$admnyear',Branch='$branch',Batch='$batch',ContactNo='$phone',Emailid='$user',LastDonation='$last',District='$district',Post='$post' WHERE Emailid='$user'";
                $resulto="UPDATE  user SET PWD='$password' WHERE UserID= '$user'";
//                echo $bgroup;

                mysql_query($resulto,$link);
	
				
                if(!mysql_query($result,$link))
                        die ('Error' . mysql_error());
                else
                    header( 'Location: ./profile.php');
   }
?>