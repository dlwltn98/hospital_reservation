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
	$resv = $_GET['rtype'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>예약</title>
	<link rel="stylesheet" type="text/css" href="m_page.css">
</head>
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
         <div class="header-logo"><img src="jisoo.png" width="420px" height="200px"></div></a>

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

	<div id="resv_info">예약 정보</div>
	<div style="position:absolute; left:230px; top:480px;">
	<table>
	 <tr><td width="300" align="center" style="background-color:#F3F3F3" >
	<?	
	$sql = ("SELECT user_name, user_no FROM user WHERE user_id='$u_id'");
	$result = mysqli_query($conn,$sql);
	$row = mysqli_num_rows($result);

		if($row) {
			$a = mysqli_fetch_array($result);
			$user_num = $a["user_no"];
			$name = stripslashes($a["user_name"]);
		}
		echo "<h3>환자 이름 : ".$name."</h3><br>";?></td></tr>

      <tr><td  width="300" align="center">
        <?
		$sql = ("SELECT count(*) as cnt FROM reservation WHERE user_no='$user_num'");
		$result2 = mysqli_query($conn,$sql);
			if($result2) {
				while($rrow = mysqli_fetch_assoc($result2)) {
					echo $name."님의 예약 : ".$rrow['cnt']."개<br><br>";
					$count = $rrow['cnt'];
				}
			}?>
		<div style="overflow:scroll; width:700px; height:300px;">
		<?
		
		//$now_date = date("Y-m-d"); $now_time = date("H:i:s");
		//$str_now_date = strtotime($now_date); $str_now_time = strtotime($now_time);
		//echo $now_time;

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


					$sql = ("SELECT doc_name, major FROM doctor WHERE doc_no = '$doc_num'");
					$result3 = mysqli_query($conn, $sql);
					$row3 = mysqli_fetch_array($result3);
					$d_name = $row3['doc_name'];
					$d_major = $row3['major'];

					if(strtotime($r_all_date) < strtotime(date('Y-m-d H:i:s'))) {

					}
					else {
						?>
							<form name="resv" method="post" action="resv_delete_change.php">
							<input type = "radio" name="resv_no" value="<?=$reservation_no?>">
							<!--<input type="hidden" name="doc_no" value="<?=$doc_num?>">-->
							<input type="hidden" name="resv" value="<?=$resv?>">
							<?
						echo "<h3> 현재 예약 </h3>";
						echo "진료과 : ".$d_major."<br>";
						echo "의사 이름 : ".$d_name."<br>";
						echo "예약 날짜 : ".$r_date."<br>";
						echo "예약 시간 : ".$r_time."<br>";
						echo "-----------------------------<br>"; 
					}
					
				}		
		
	mysqli_close($conn);
	?></div></td></tr>	
	</table>	
	<input type="submit" name="" value="확인" style="width:100px; height:40px;"></div>
</form>
	
	<div class="footer">
         <div class ="footer-box1"> 대표전화 : 031-2819-8111 </div>
		 <div class ="footer-box2"> 응급의료센터 031-2434-9453 </div>
		 <div class ="footer-box3"> 건강검진의료센터 031-9368-1683 </div>
		 <div class ="footer-box4"> 개인정보처리방침| 환자의권리와의무 | 의료정보운영방침 | 홈페이지이용문의 </div>
		 <div class ="footer-box5"> 성남시 수정수 양지동 611(양지로27번길 1)(12140)/사업자등록번호: 281-98-11193 이율리</div>
    </div>
</div>	
</body>
</html>