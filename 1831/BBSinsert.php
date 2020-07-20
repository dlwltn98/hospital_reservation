<?
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
	
	if(isset($_SESSION["user_id"])){
		$bid=$_SESSION['user_id'];
		$sql="select user_name from user where user_id = '$bid'";
		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		while ($row = $result->fetch_assoc()) {
			$bname = $row['user_name'];
		}
	}

    if(isset($_SESSION["doc_id"])){
		$bid=$_SESSION['doc_id'];
		$sql="select doc_name from doctor where doc_id = '$bid'";
		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		while ($row = $result->fetch_assoc()) {
			$bname = $row['doc_name'];
		}
	}
	
	$btitle=$_POST['title'];
    $bcontent=$_POST['content'];


	try{
	$query = "INSERT INTO bbs
	(bbs_id, bbs_name, bbs_title, bbs_content, bbs_wdate, bbs_view)
	VALUES ('$bid', '$bname','$btitle','$bcontent', now(), 0)";
	$result=mysqli_query($conn, $query) or die(mysqli_error($conn));


	// DB와의 연결종료
	mysqli_close($conn);

	//글쓰기 완료후 리스트로
	echo ("<meta http-equiv='Refresh' content='1; URL=BBS.php'>");
	}
	catch (Exception $Exception){
		print "오류: ".$Exception->getMessage();
		} 
?>
<center>
<font size=2>정상적으로 저장되었습니다.</font>