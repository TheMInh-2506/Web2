<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "web2_db_pvn_ltm";
$con = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()){
    echo "Connection Fail: ".mysqli_connect_errno();exit;
}