<?php

session_start();

include "./connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

if (empty($email)) {
    echo("Please enter your email");
} else if (empty($password)) {
    echo ("Enter your password");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '". $email."' AND `password` = '". $password."'");

    if(($rs->num_rows) == 1) {
        echo ("success");

        $d = $rs->fetch_assoc();
        $_SESSION["u"] = $d;

        if ($rememberme == "true") {
            setcookie("email", $email, time() + 60 * 60 * 24 * 7);
            setcookie("password", $password, time() + 60 *60 *24 *7);
        } else {
            setcookie("email","",-1);
            setcookie("password","",-1);
        }

    } else {
        echo("Something went wrong. USER not found");
    }
}

?>