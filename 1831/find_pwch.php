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

$id=$_POST['user_id'];
$email=$_POST['user_email'];

$sql="select user_password from user where user_id='$id' AND user_email='$email'";

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($result);

if(!$result || mysqli_num_rows($result) == 0){

  echo "<script>alert('없는 PW입니다');history.back();</script>";

}else{

    echo "<script>alert('회원님의 PW는 ".$row[0]." 입니다.');history.back();</script>";
}

?>