<?php 

$host = "localhost";
$dbname = "database";
$user = "postgres";
$password = "123456";

$connection_string = "host={$host} dbname={$dbname} user={$user} password={$password}'";
$dbconn = pg_connect($connection_string);


if($dbconn){
    echo "Connected to ". pg_host($dbconn); 
}else{
    echo "Error in connecting to database.";
}

echo "<br />";

?>