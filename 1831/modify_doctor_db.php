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
$db_table = "doctor";
$d_id = $_SESSION['doc_id'];

$new_name = $_POST["doc_name"];
$new_year = $_POST["year"];
$new_month = $_POST["month"];
$new_days = $_POST["days"];
$new_phone = $_POST["doc_phone"];
$new_birth = $new_year.$new_month.$new_days;


$sql = ("UPDATE $db_table SET doc_name='$new_name', doc_phone ='$new_phone',doc_birth='$new_birth' WHERE doc_id = '$d_id' ");
$result = mysqli_query($conn, $sql);
	
	if($result) {
		echo "<script> alert('회원 정보를 수정하였습니다.'); window.location.href='doc_my_page.php' </script>";
    }else{
        echo "<script> alert('사이트에 문제가 발생했습니다.');</script>";
    }

    mysqli_close($conn);
 ?>