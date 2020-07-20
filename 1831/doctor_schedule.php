<?php 
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
	$d_id = $_SESSION['doc_id'];
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>my page</title>
   <link rel="stylesheet" type="text/css" href="m_page.css">
</head>
<body>

<div class="frame">
      <div class="header-box">
	    <a href="home.php" class="header-link">
         <div class="header-logo"><img src="jisoo.png" width="420px" height="200px"></div></a>

	   <ul class="sign-list">
	    <?php 
	      if($_SESSION['doc_id'] != null){
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
	$sql = ("SELECT doc_name, doc_no FROM user WHERE doc_id='$d_id'");
	$result = mysqli_query($conn,$sql);
	$row = mysqli_num_rows($result);

		if($row) {
			$a = mysqli_fetch_array($result);
			$doc_num = $a["doc_no"];
			$name = stripslashes($a["doc_name"]);
		}
		echo "<h2>의료진 이름 : ".$name."</h2><br>";?></td></tr>

    <tr><td  width="300" align="center" >
        <?
		$sql = ("SELECT count(*) as cnt FROM reservation WHERE doc_no='$doc_num'");
		$result2 = mysqli_query($conn,$sql);
		//$ro = mysqli_num_rows($result2);
		if($result2) {
			while($rrow = mysqli_fetch_assoc($result2)) {
				echo "<h2>".$name."님의 예약 건수: ".$rrow['cnt']."개</h2><br><br>";
				$count = $rrow['cnt'];
			}
		}?>
		<div style="overflow:scroll; width:700px; height:300px;">
		<?
		//for($i=0; $i<$count; $i++) {
		$now_date = date("Y-m-d"); $now_time = date("H:i:s");
		$str_now_date = strtotime($now_date); $str_now_time = strtotime($now_time);
		//echo $now_time;

			$sql = ("SELECT resv_no FROM reservation WHERE doc_no='$doc_num'");
			$result4 = mysqli_query($conn,$sql);
				while($row4 = mysqli_fetch_array($result4)) {
					$reservation_no = $row4['resv_no'];
					//echo $reservation_no;

					$sql = ("SELECT user_no, resv_date, resv_time FROM reservation WHERE resv_no = '$reservation_no'");
					$result2 = mysqli_query($conn, $sql);
					$row2 = mysqli_fetch_array($result2);
					$user_num = $row2['user_no'];
					$r_date = $row2['resv_date'];
					$r_time = $row2['resv_time'];
					$str_date = strtotime($r_date); $str_time = strtotime($r_time);


					$sql = ("SELECT user_name, year, month, day, user_gender FROM doctor WHERE user_no='$user_num'");
					$result3 = mysqli_query($conn, $sql);
					$row3 = mysqli_fetch_array($result3);
					$u_name = $row3['user_name'];
					$u_year = $row3['year'];
					$u_month = $row3['month'];
					$u_day = $row3['day'];
					$d_gender = $row3['user_gender'];

					if($str_now_date <= $str_date) {
						if($str_now_time < $str_time) {
						echo "<h2> 현재 예약 </h2>";
						echo "환자 이름 : ".$u_name."<br>";
						echo "생년월일 : ".$u_year."년".$u_month."월".$u_day."<br>";
						echo "성별 : ".$u_gender."<br>";
						echo "예약 날짜 : ".$r_date."<br>";
						echo "예약 시간 : ".$r_time."<br>";
						echo "-----------------------------<br>";
					    }
					    
				    }
					
				}
				 
	mysqli_close($conn);
	?></div></td></tr>	
	</table>
      </div>

       <div class="footer">
         <div class ="footer-box1"> 대표전화 : 031-2819-8111 </div>
		 <div class ="footer-box2"> 응급의료센터 031-2434-9453 </div>
		 <div class ="footer-box3"> 건강검진의료센터 031-9368-1683 </div>
		 <div class ="footer-box4"> 개인정보처리방침| 환자의권리와의무 | 의료정보운영방침 | 홈페이지이용문의 </div>
		 <div class ="footer-box5"> 성남시 수정수 양지동 611(양지로27번길 1)(12140)/사업자등록번호: 281-98-11193 이율리</div>
       </div>
	  </div>
</div>      
</body>
</html>