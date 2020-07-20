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

	$db_table = "reservation";
	$u_id = $_SESSION['user_id'];
	$resv_no = $_POST['resv_no'];
	$rtype = $_POST['resv'];
	//echo $rtype;
	
	$sql = ("DELETE FROM $db_table WHERE resv_no='$resv_no'");
	$result = mysqli_query($conn, $sql);


	if($result) {
		if($rtype =='delete') {
			 echo "<script>	
			 var message = confirm('취소가 완료 되었습니다.추가로 예약 취소를 하시겠습니까?');
								if(message == true){
									location.href='resv_modi_check.php?rtype=delete';
								}else{
									location.href='home.php'
									exit;
								}</script>";
		}
		else if($rtype =='change') {
			echo "<script> 
			location.href='resv_medic.php?rtype=change';

								</script>";
		}
		else {
			echo "<script> alert('사이트에 문제가 발생했습니다.');</script>";
		}
	}
	else {
		echo "<script> alert('사이트에 문제가 발생했습니다.');</script>";
	}

mysqli_close($conn);
?>
	