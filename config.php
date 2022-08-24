<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "lks";

$conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
if($conn){
    $setLang = mysqli_query($conn, "SET NAMES 'utf8'");
}else{
    die("Ket noi that bai".mysqli_connect_error());
}

?>