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

	//$db_table = "reservation";
	$u_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>예약 확인</title>
	<link rel="stylesheet" type="text/css" href="m_page.css">
</head>
<script type="text/javascript">
	function deletecheck(){
		var message = confirm("정말 예약을 취소하시겠습니까?");
			if(message == true){
				alert("취소할 예약을 선택해주세요.");
			}else{
				event.preventDefault();
				exit;
			}
}
</script>
<script type="text/javascript">
	function changecheck(){
		var message = confirm("예약 변경시 변경하려는 예약은 취소됩니다.");
			if(message == true){
				alert("변경할 예약을 선택해주세요.");
			}else{
				event.preventDefault();
				exit;
			}
}
</script>
<body>

<div class="frame">
      <div class="header-box">
	   <a href="home.php" class="header-link">
	   <?php
        if(isset($_SESSION["doc_id"]))
        {
       ?>
        <a href="doc_home.php" class="header-link">
       <?php
        }
       ?>
	   <ul class="sign-list">
	    <?php 
	      if($_SESSION['user_id'] != null){
	    ?>
		  <a href="logout.php"" class="head-link"> 로그아웃</a> |
		  <a href="my_page.php"" class="head-link"> my page</a>
	    <?php
	      }
		?>
       </ul>

	   <img src="dong.jpg" width="1150px" height="220px">
	  </div> 

	  
	     <div id="nav-box">
           <ul>
               <li><a href="reservation_confi.php">예약확인</a></li>
               <li><a href="modify_user.php">개인 정보 수정</a></li>
               <li><a href="my_page_pw_check.php">비밀번호 변경</a></li>
               <li><a href="my_page_Personal_information.php">개인정보 처리 방침</a></li>
               <li><a href="my_page_Terms_of_Use.php">회원약관</a></li>
               <li><a href="drop_out.php">회원탈퇴</a></li>
		   </ul>
         </div>

    <div id="resv_info" style="left:420px;">현재 예약 정보</div>
	<div style="position:absolute; left:230px; top:480px;">
	<table>
	 <tr><td width="300" align="center" style="background-color:#F3F3F3" >
		<?
if($_SESSION['user_id'] != null) {	
	$sql = ("SELECT user_name, user_no FROM user WHERE user_id='$u_id'");
	$result = mysqli_query($conn,$sql);
	$row = mysqli_num_rows($result);

		if($row) {
			$a = mysqli_fetch_array($result);
			$user_num = $a["user_no"];
			$name = stripslashes($a["user_name"]);
		}
		echo "<h2>환자 이름 : ".$name."</h2><br>";?></td></tr>

    <tr><td  width="300" align="center" >
        <?
				echo "<h2>".$name."님의 예약"."</h2><br><br>";
		?>
		<div style="overflow:scroll; width:700px; height:300px;">
		<?
		//for($i=0; $i<$count; $i++) {
		
		//$now_date = date("Y-m-d H:i:s");
		//echo $now_date."<br>";
		//$now_date_str=strtotime($now_date);

			$sql = ("SELECT resv_no FROM reservation WHERE user_no='$user_num'");
			$result4 = mysqli_query($conn,$sql);
				while($row4 = mysqli_fetch_array($result4)) {
					$reservation_no = $row4['resv_no'];
					//echo $reservation_no;

					$sql = ("SELECT doc_no, resv_date, resv_time FROM reservation WHERE resv_no='$reservation_no'");
					$result2 = mysqli_query($conn, $sql);
					$row2 = mysqli_fetch_array($result2);
					$doc_num = $row2['doc_no'];
					$r_date = $row2['resv_date'];
					$r_time = $row2['resv_time'];
					$r_all_date = $r_date." ".$r_time;
					//echo $r_all_date."<br>";
					//$r_all_date_str=strtotime($r_all_date);
					
					$sql = ("SELECT doc_name, major FROM doctor WHERE doc_no = '$doc_num'");
					$result3 = mysqli_query($conn, $sql);
					$row3 = mysqli_fetch_array($result3);
					$d_name = $row3['doc_name'];
					$d_major = $row3['major'];

					if(strtotime($r_all_date) < strtotime(date('Y-m-d H:i:s'))) {
							
					}else {
						echo "진료과 : ".$d_major."<br>";
						echo "의사 이름 : ".$d_name."<br>";
						echo "예약 날짜 : ".$r_date."<br>";
						echo "예약 시간 : ".$r_time."<br>";
						echo "-----------------------------<br>";
					}
				}
}
else {
	echo "<script> window.location.href='login.php' </script>";
}
		
	mysqli_close($conn);
	?></div></td></tr>	
	</table>
	<a href="resv_modi_check.php?rtype=change" style="font-size:20px;" onclick="javascript:changecheck();">예약 변경</a>
	<a href="resv_modi_check.php?rtype=delete" style="font-size:20px;" onclick="javascript:deletecheck();">예약 취소</a>
	</div>

	   <div class="footer">
         <div class ="footer-box1"> 대표전화 : 031-2819-8111 </div>
		 <div class ="footer-box2"> 응급의료센터 031-2434-9453 </div>
		 <div class ="footer-box3"> 건강검진의료센터 031-9368-1683 </div>
		 <div class ="footer-box4"> 개인정보처리방침| 환자의권리와의무 | 의료정보운영방침 | 홈페이지이용문의 </div>
		 <div class ="footer-box5"> 성남시 수정수 양지동 611(양지로27번길 1)(12140)/사업자등록번호: 281-98-11193 이율리</div>
       </div>
</body>
</html>