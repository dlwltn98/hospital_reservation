<?php
    session_start();

	$db_table="qna";
 
 $host = 'localhost';                                               
 $username = 'root';
 $userpass = 'yull0131';
 $dbname = 'hospital';
 
 $conn = mysqli_connect($host,$username,$userpass,$dbname);           //db연동
 mysqli_set_charset($conn, 'utf8');

 if(mysqli_connect_errno($conn)){
     echo "DB 연결 실패".mysqli_connect_error();
 }else{
 
 }

	$bNo = $_GET['no'];
	$id = $_GET['bbs_id'];
	$btitle = $_GET['bsub'];
	$sql = "DELETE FROM bbs where bbs_id = '$id' and bbs_title = '$btitle'";
	//틀리다면 메시지 출력 후 이전화면으로

	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	
//쿼리가 정상 실행 됐다면,
if($result) {
	$msg = '정상적으로 글이 삭제되었습니다.';
	$replaceURL = 'BBS.php';
} else {
	$msg = '글을 삭제하지 못했습니다.';
	$replaceURL = 'BBS.php';
}
?>
	<script>
		alert("<?php echo $msg?>");
		location.replace("<?php echo $replaceURL?>");
		exit;
	</script>
<?php
	exit;
?>