<?php

include "./connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$password = $_POST["p"];
$mobile = $_POST["m"];
$gender = $_POST["g"];

if(empty($fname)) {
    echo("Please Enter Your First Name");
} else if(strlen($fname) > 45) {
    echo("First name must lower than 45 Characters");
} else if(empty($lname)) {
    echo("Please Enter Your Last Name");
} else if(!strlen($fname) > 45) {
    echo("Last name must lower than 45 Characters");
} else if (empty($email)) {
    echo("Please Enter Your Email");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("Enter Valid Email");
} else if(strlen($email) > 100) {
    echo("Email must contain max 100 characters");
} else if(empty($password)) {
    echo("Please Enter tour password");
} else if(strlen($password) < 5 || strlen($password) > 20) {
    echo("pasword must be 5 to 20 characters");
} else if (empty($mobile)) {
    echo("Please enter your mobile");
} else if (!(strlen($mobile) == 10)) {
    echo("Mobile number must contain 10 characters");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)) {
    echo("Please enter your mobile number correctly.");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `email`= '".$email."' OR `mobile` = '".$mobile."'");

    $n = $rs -> num_rows;

    if($n > 0) {
        echo("User Already Register with mobile or email");
    } else {
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");
        Database::iud("INSERT INTO `user` (`fname`, `lname`, `email`, `password`, `mobile`, `joinDate`, `gender_genderId`, `status_statusId`) VALUES ('".$fname."', '".$lname."', '".$email."', '".$password."', '".$mobile."', '".$date."', '".$gender."', '1')");
        echo("success");
    }



}



?>