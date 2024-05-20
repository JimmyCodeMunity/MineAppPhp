<?php
// $host = "localhost";
// $user = "bitsneay_mufasa";
// $password = "crypto@2024";
// $db = "bitsneay_crypto";
$host = "localhost";
$user = "root";
$password = "";
$db = "bitsneay";

$conn = mysqli_connect($host, $user, $password, $db);

if(!$conn) {
    echo "Something went wrong. Database connection failed!";
}


?>