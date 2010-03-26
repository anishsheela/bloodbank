<?php
    require 'cnn.php';
    function starts_with($str, $src){
        return substr($src, 0, strlen($str))==$str;
    }
    
    $class = trim($_POST["classs"]);
    setcookie("class", $class, time()+3600);

    $gender = trim($_POST["gender"]);

    if( trim($_POST["email"]) != "" )
        $email = trim($_POST["email"]);

    if( trim($_POST["phone"]) != "" )
        $phone = trim($_POST["phone"]);

    if( trim($_POST["name"]) != "" )
        $name = trim($_POST["name"]);

    $email = strtolower($email);
    $bloodgroup = trim($_POST["bloodgroup"]);

    $publish = trim($_POST["publish"]);
    if($publish == "on")
        $publish1 = 1;
    else
        $publish1 = 0;

    $district = " ";
    $age = 18;

    if(starts_with("S1S2MC", $class))
            $age = 21;
    else if (starts_with("S3MC", $class) OR starts_with("S4MC", $class))
            $age = 22;
    else if (starts_with("S5MC", $class) OR starts_with("S6MC", $class))
            $age = 23;
    else if(starts_with("S1S2", $class))
            $age = 18;
    else if (starts_with("S3", $class) OR starts_with("S4", $class))
            $age = 19;
    else if (starts_with("S5", $class) OR starts_with("S6", $class))
            $age = 20;
    else if (starts_with("S6", $class) OR starts_with("S7", $class))
            $age = 21;
    else if (starts_with("S6", $class) OR starts_with("S7", $class))
        $age = 18;
    else if (starts_with("Sta", $class))
        $age = 22;
    else if (starts_with("Alu", $class))
        $age = 22;
    else if (starts_with("Oth", $class))
        $age = 18;

    if($gender == "Male")
        $sex = 1;
    else
        $sex = 0;

    $weight = 50;
    $last = 0;
    $address = " ";
    $password = "pass";
    $result="INSERT INTO registration (Name,DOB,Gender,Bloodgroup,Weight,Class,ContactNo,Emailid,LastDonation,Publish,District,Post) VALUES ('$name','$age',$sex,'$bloodgroup','$weight','$class','$phone','$email','$last','$publish1','$district','$address')";
    $resulto="INSERT INTO user (UserID, PWD)VALUES ('$email' , '$password')";
//    echo $result."<br/>"."$resulto"."<br/>";
    mysql_query($result);
    mysql_query($resulto);

   /* Mail all persons on sucessfull completion of registration*/
    $sender = "aneesh.nl@gmail.com";
    $subject = "NSS Blood Bank Registration";
    $content = "Sucessfull registration";
    $headers = "From: nssmcet@gmail.com";
    mail($sender, $subject, $content, $headers);
    header("Location: ./adminreg.php");
?>
