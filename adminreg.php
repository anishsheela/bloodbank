<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Registration</title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:728px;
	height:280px;
	z-index:1;
	left: 137px;
	top: 35px;
}
.style2 {
	font-size: 18px;
	font-weight: bold;
}
-->
</style>
</head>

<body>

<div id="Layer1">
  <form id="form1" name="form1" method="post" action="adminregsave.php">
  <label></label>
  <p align="center" class="style2">ADMIN REGISTRATION FORM </p>
  <p>Class <select name="classs" id="classs">
                <option><?php
                if(isset($_COOKIE['class']))
                    echo $_COOKIE["class"];?>
                </option>
                <option> S1S2A </option>
                <option> S1S2B </option>
                <option> S1S2C </option>
                <option> S1S2D </option>
                <option> S1S2E </option>
                <option> S1S2F </option>
                <option> S3CS </option>
                <option> S3IT </option>
                <option> S3BT </option>
                <option> S3ME </option>
                <option> S3EE </option>
                <option> S3EC </option>
                <option> S4CS </option>
                <option> S4IT </option>
                <option> S4BT </option>
                <option> S4ME </option>
                <option> S4EE </option>
                <option> S4EC </option>
                <option> S5CS </option>
                <option> S5IT </option>
                <option> S5BT </option>
                <option> S5ME </option>
                <option> S5EE </option>
                <option> S5EC </option>
                <option> S6CS </option>
                <option> S6IT </option>
                <option> S6BT </option>
                <option> S6ME </option>
                <option> S6EE </option>
                <option> S6EC </option>
                <option> S7CS </option>
                <option> S7IT </option>
                <option> S7BT </option>
                <option> S7ME </option>
                <option> S7EE </option>
                <option> S7EC </option>
                <option> S8CS </option>
                <option> S8IT </option>
                <option> S8BT </option>
                <option> S8ME </option>
                <option> S8EE </option>
                <option> S8EC </option>
                <option> S1S2MCA </option>
                <option> S3MCA </option>
                <option> S4MCA </option>
                <option> S5MCA </option>
                <option> S6MCA </option>
                <option> Staff </option>
                <option> Alumini </option>
                <option> Others </option>
      </select>
    </p>
  <p align="justify">
    <label>Name         
    <input name="name" type="text" value="" />
</label>
  </p>
  <p align="justify">
    <label>Email:
    <input name="email" type="text" maxlength="25" />
    </label>
  </p>
  <p align="justify">
    <label>Phone Number
    <input type="text" name="phone" />
    </label>
  </p>
  <p align="justify">
    <label>
    Publish</label>
    <label>
     <input type="checkbox" name="publish" value="checkbox" />
    </label>
  </p>
  <label>Bloodgroup
    <select name="bloodgroup">
                <option>O+ve</option>
                <option>A+ve</option>
                <option>B+ve</option>
                <option>AB+ve</option>
                <option>O-Ve</option>
                <option>A-ve</option>
                <option>B-ve</option>
                <option>AB-ve</option>
                                       
    </select>
</label>
    <p align="justify">
    <label>Gender
    <select name="gender">
      <option selected="selected">Male</option>
      <option>Female</option>
    </select>
    </label>
  </p>
  <p align="justify">
    <label></label>
    <label>District    </label>
    <select name="district" size="1">
                    <option selected="selected">Thiruvananthapuram</option>
                    <option>Kollam</option>
                    <option>Pathanamthitta</option>
                    <option>Alappuzha</option>
                    <option>Kottayam</option>
                    <option>Idukki</option>
                    <option>Ernakulam</option>
                    <option>Thrissur</option>
                    <option>Palakkad</option>
                    <option>Malapuram</option>
                    <option>Kozhikode</option>
                    <option>Wayanad</option>
                    <option>Kannur</option>
                    <option>Kasargod</option>
                    <option>Other</option>
      </select>
  </p>
  <p align="justify">
    <label></label>
    <input name="submitt" type="submit" id="submitt" value="Submit" />
  </p>
</form></div>
</body>
</html>
