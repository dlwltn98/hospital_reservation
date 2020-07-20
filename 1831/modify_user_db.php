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

$new_name = $_POST["user_name"];
$new_year = $_POST["year"];
$new_month = $_POST["month"];
$new_days = $_POST["days"];
$new_gender = $_POST["user_gender"];
$new_phone = $_POST["user_phonenum"];
$new_homenum = $_POST["zonecode"];
$new_add = $_POST["address"];
$new_add_et = $_POST["address_etc"];


$sql = ("UPDATE $db_table SET user_name='$new_name', year='$new_year', month='$new_month', days='$new_days', user_gender='$new_gender', zonecode='$new_homenum', address='$new_add', address_etc='$new_add_et' WHERE user_id = '$u_id' ");

$result = mysqli_query($conn, $sql);
	
	if(mysqli_affected_rows($result) == 0) {
		echo "<script> alert('회원 정보를 수정하였습니다.'); window.location.href='my_page.php' </script>";
    }else{
        echo "<script> alert('사이트에 문제가 발생했습니다.');</script>";
    }

    mysqli_close($conn);
 ?>

