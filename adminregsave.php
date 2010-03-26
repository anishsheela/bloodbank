<?php
    if( trim($_POST["classs"]) != "" )
        $class = trim($_POST["classs"]);
    setcookie("class", $class, time()+3600);

    $gender = trim($_POST["gender"]);
    if( trim($_POST["email"]) != "" )
        $email = trim($_POST["email"]);
    $email = strtolower($email);
    echo $email;
    $bloodgroup = trim($_POST["bloodgroup"]);

    $district = trim($_POST["bloodgroup"]);
    $age = 18;
    if($gender == "Male")
        $sex = 1;
    else
        $sex = 0;
    $weight = 50;
    $last = 0;
    $address = "";
    $password = "pass";
    $result="INSERT INTO registration (Name,DOB,Gender,Bloodgroup,Weight,Class,ContactNo,Emailid,LastDonation,Publish,District,Post) VALUES ('$name','$age',$sex,'$bgroup','$weight','$class','$phone','$email','$last','$publish1','$district','$address')";
    $resulto="INSERT INTO user (UserID, PWD)VALUES ('$email' , '$password')";

 //   header("Location: ./adminreg.php");
?>
