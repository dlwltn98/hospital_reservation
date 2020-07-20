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

$password = $_POST["doc_password"];
$drop_kkey = $_POST["drop_key"];

$sql = "SELECT doc_password
      FROM $db_table
      WHERE doc_id = '$d_id'";

$result1 = mysqli_query($conn,$sql);

$sql = "SELECT drop_key
      FROM $db_table
      WHERE doc_id = '$d_id'";

$result2 = mysqli_query($conn,$sql);

  if($result1 = $password) {
    if($result2 = $drop_kkey){
      $sql = "DELETE FROM $db_table WHERE doc_id = '$d_id'";
      $result3 = mysqli_query($conn,$sql);

      if($result3) {
        echo "<script> alert('회원 탈퇴가 완료 되었습니다.'); window.location.href='home.php' </script>";
      }else {
        echo "<script> alert('사이트에 문제가 발생했습니다.');</script>";
      }
    }else {
      echo "<script> alert('사이트에 문제가 발생했습니다.');</script>";
    }
  }else {
    echo "<script> alert('사이트에 문제가 발생했습니다.');</script>";
      }

    mysqli_close($conn);
?>  
