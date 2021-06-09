<?php
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$servername = $cleardb_url["host"];
$username = $cleardb_url["user"];
$password = $cleardb_url["pass"];
$basename = substr($cleardb_url["path"],1);
$dbc = mysqli_connect($servername, $username, $password, $basename) or die('Error
connecting to MySQL server.'.mysqli_error($dbc));
mysqli_set_charset($dbc, "utf8");

if (!$dbc) {
    die( 'Error connecting to MySQL server.'. mysqli_connect_error());
}?>
