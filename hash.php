<?php
/* When creating a password, use superHash($pass);
** When checking a password, use <?php if(superHash($pass,$hash)==$hash);?>
** where $hash = the hash you are checking against.
*/
/*function superHash($source, $storedSalt = null)
{
    if ($storedSalt === null)
    {
        $salt = substr(md5(uniqid(rand(), true)), 0, 5);
        /*Note: The number 5 above is the length of the salt. This particular method only allows for a maximum 32 character salt.*//*
    }
    else
    {
        $salt = $storedSalt{14} . $storedSalt{92} . $storedSalt{33} . $storedSalt{71} . $storedSalt{9};
        /*This will obviously change based on how you distribute your salt in the hash, and how long it is.*//*
    }
    $salt1="something custom";
    $salt2="blahblah";
    $salt3="differentblah";
    $hash1=sha1($salt1.$source.$salt);
    $hash2=sha1($salt2.$source.$salt);
    $hash3=md5($salt3.$source.$salt);
    $h = $salt.$hash1.$hash2.$hash3; //add salt to the mix
    $scrambledhash = $a{70} . $a{43} . $a{37} . $a{52} . $a{91} . $a{29} . $a{10}/*...etc*/;
    /*Here, we would look for the numbers 0, 1,2, 3 and 4 (which is where $salt was placed), and use their relative location (like 15th, 93rd, 34th, 72nd and 10th), and use those numbers (minus 1) in the statement above.
    Note that there are 117 characters to be accounted for (112 for the hashes + 5 for the salt).*//*

    return $scrambledhash;
}*/

function superHash($source) {
    return md5(md5($source));
}
?>
