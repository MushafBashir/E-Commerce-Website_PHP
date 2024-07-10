<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "football_project";

$con = new mysqli($server, $username, $password, $database);

if(!$con){
    echo "Issue with database connect";
}


?>