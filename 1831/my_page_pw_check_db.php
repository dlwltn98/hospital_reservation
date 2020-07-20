<?php
session_start();

$host = 'localhost';
$username = 'root';
$userpass = 'yull0131';
$dbname = 'hospital';
 
$conn = mysqli_connect($host,$username,$userpass,$dbname);

mysqli_set_charset($conn, 'utf8');

if(mysqli_connect_errno($conn)){
    echo "DB 연결 실패".mysqli_connect_error();
}else{
 
}

$db_table = "user";
$u_id = $_SESSION['user_id'];

$pwch = $_POST["user_password"];

$sql = ("SELECT user_password
		 FROM $db_table
		 WHERE user_id = '$u_id'");

$result = mysqli_query($conn, $sql);
	
	if($result = $pwch) {
		echo "<script> window.location.href='my_page_pw_change.php' </script>";
	}else {
		echo "<script> alert('사이트에 문제가 발생했습니다.');</script>";
	}

	mysqli_close($conn);
?>
