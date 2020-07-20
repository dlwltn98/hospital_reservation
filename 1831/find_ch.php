<?php
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

$email=$_POST['user_email'];

$sql="select user_id from user where user_email='$email'";

$result=mysqli_query($conn,$sql);

$count=mysqli_num_rows($result);

$row=mysqli_fetch_array($result);

if(!$result || mysqli_num_rows($result) == 0){

  echo "<script>alert('없는 ID입니다');history.back();</script>";

}else{

    echo "<script>alert('회원님의 ID는 ".$row[0]." 입니다.');history.back();</script>";
}

?>