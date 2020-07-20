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

$db_table = "reservation";
$u_id = $_SESSION['user_id']; // 회원 예약
$prof = $_POST['prof']; // 의사 
$doc_major = $_POST['major']; // 의사 전공
$select_day = $_POST['select_day']; // 선택 날짜
$select_time = $_POST['select_time']; // 선택 시간


$sql = ("SELECT doc_no 
		from doctor 
		where doc_name = '$prof'");
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$doc_num = $row['doc_no'];

$sql = ("SELECT user_no
		FROM user
		WHERE user_id = '$u_id'");
$result2 = mysqli_query($conn,$sql);
$row2 = mysqli_fetch_array($result2);
$user_num = $row2['user_no'];  

$sql = "INSERT INTO $db_table(user_no, doc_no, resv_date, resv_time)
		VALUES('$user_num', '$doc_num','$select_day','$select_time')";
$result3 = mysqli_query($conn,$sql);

if($result3) {
	echo "<script> var message = confirm('추가 예약을 하시겠습니까?');
					if(message == true){
						window.opener.location ='resv_medic.php';
						window.close();
					}else{
						window.close(); 
					} </script>";
}else {
	 echo "<script> alert('사이트에 문제가 발생했습니다.'); 
	 		window.close(); </script>";
}
?>
