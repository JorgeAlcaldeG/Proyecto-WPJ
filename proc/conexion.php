<?php
/* Database connection start */
$servername = "192.168.0.38";
$username = "usuario1";
$password = "ASDasd123";
$dbname = "curs";
$connection = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
printf("Connect failed: %sn", mysqli_connect_error());
exit();
}


// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "curs";
// $connection = mysqli_connect($servername, $username, $password, $dbname);
// if (mysqli_connect_errno()) {
// printf("Connect failed: %sn", mysqli_connect_error());
// exit();
// }