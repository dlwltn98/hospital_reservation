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

$db_table = "doctor";
$d_id = $_SESSION['doc_id'];

$pwch = $_POST["doc_password"];

$sql = ("SELECT doc_password
     FROM $db_table
     WHERE doc_id = '$d_id'");

$result = mysqli_query($conn, $sql);
  
  if($result = $pwch) {
    echo "<script> window.location.href='my_page_pw_change_doctor.php' </script>";
  }else {
    echo "<script> alert('사이트에 문제가 발생했습니다.');</script>";
  }

  mysqli_close($conn);
?>
