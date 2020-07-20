<?php
session_start();

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
$db_table = "user";
$u_id = $_SESSION['user_id'];

$new_password = $_POST["user_password"];

$sql = ("UPDATE $db_table
		 SET user_password='$new_password'
		 WHERE user_id = '$u_id' ");

$result = mysqli_query($conn, $sql);
	if(mysqli_affected_rows($result) == 0) {
		echo "<script> alert('회원 정보를 수정하였습니다.'); window.location.href='my_page.php' </script>";
    }else{
        echo "<script> alert('사이트에 문제가 발생했습니다.');</script>";
    }

    mysqli_close($conn);
 ?>
