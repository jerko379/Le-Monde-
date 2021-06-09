<?php
$servername = "localhost";
$username = "root";
$password = "";
$basename = "projekt";
$dbc = mysqli_connect($servername, $username, $password, $basename) or die('Error
connecting to MySQL server.'.mysqli_error($dbc));
mysqli_set_charset($dbc, "utf8");

if (!$dbc) {
    die( 'Error connecting to MySQL server.'. mysqli_connect_error());
}?>