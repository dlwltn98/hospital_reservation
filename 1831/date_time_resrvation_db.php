<?php

$host = "localhost";
$username = "root";
$userpass = "yull0131";
$dbname = "hospital";
 
$conn = mysqli_connect($host,$username,$userpass,$dbname);

mysqli_set_charset($conn, 'utf8');

if(mysqli_connect_errno($conn)){
    echo "DB 연결 실패".mysqli_connect_error();
}else{
 
}
$db_table = "resv_test";
$date_time = $_POST["datepicker"];

$sql="SELECT resv_before 
	  FROM $db_table
	  WHERE "

$