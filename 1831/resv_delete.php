<?
session_start();

$host = 'localhost';
$username = 'root';
$userpass = 'yull0131';
$dbname = 'hospital';

$conn = mysqli_connect($host,$username,$userpass,$dbname);
 
	if(mysqli_connect_errno($conn)){
    	echo "DB 연결 실패".mysqli_connect_error();
	}else{

	}

$u_id = $_SESSION['user_id'];
$resv_no = $_POST['select_resv'];
$doc_no = $_POST['doc_no'];

$sql = ("SELECT user_name FROM user WHERE user_id = '$u_id'");
$result = mysqli_query($conn,$sql); 
$row = mysqli_num_rows($result);

	if($row) {
		$a = mysqli_fetch_array($result);
  		$n_name = stripslashes($a["user_name"]); //환자이름
	}

$sql = ("SELECT doc_name, major FROM doctor WHERE doc_no = '$doc_no'");
$result2 = mysqli_query($conn,$sql); 
$row2 = mysqli_num_rows($result2);
	if($row2) {
		$a = mysqli_fetch_array($result2);
		$d_name = stripslashes($a["doc_name"]); // 의사 이름 
		$d_major = stripslashes($a["major"]); // 전공 
	}

$sql = ("SELECT resv_date, resv_time FROM reservation WHERE resv_no='$resv_no'");
$result3 = mysqli_query($conn,$sql); 
$row3 = mysqli_num_rows($result3);
	if($row3) {
		$a = mysqli_fetch_array($result2);
		$r_date = stripslashes($a["resv_date"]); //예약 날짜 
		$r_time = stripslashes($a["resv_time"]); // 예약 시간 
	}
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
	<h3>예약 변경</h3><br>
	이름 : <?=$n_name?>
	진료과  : <input type="" name="">


