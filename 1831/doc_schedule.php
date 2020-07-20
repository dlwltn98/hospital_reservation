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
	$d_id = $_SESSION['doc_id'];
	$days = $_GET['day'];
	//echo $days;
	$year = substr($days,0,4);
	$month = substr($days,4,2);
	$dday = substr($days,6,2);
	$r_date = $year."-".$month."-".$dday;
	//echo $r_date; 
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
	   <?php
        if(isset($_SESSION["doc_id"]))
        {
       ?>
        <a href="doc_home.php" class="header-link">
       <?php
        }
       ?>
         <div class="header-logo"><img src="jisoo.png" width="420px" height="200px"></div></a>

	   
     

      
	<div id="resv_info">예약 정보</div>
	<div style="position:absolute; left:230px; top:480px;">
	<table>
	 <tr><td width="300" align="center">
	 	<div style="font-size:20px; font-weight:bold;"><h3><?=$year?>년 &nbsp<?=$month?>월  &nbsp<?=$dday?>일 &nbsp</h3></div>
	<?	
	$sql = ("SELECT doc_no FROM doctor WHERE doc_id='$d_id'");
	$result = mysqli_query($conn,$sql);
	$row = mysqli_num_rows($result);
		if($row) {
			$a = mysqli_fetch_array($result);
			$doctor_num = $a["doc_no"];
		}
		//echo $doctor_num;
	$sql = ("SELECT count(*) as cnt FROM reservation WHERE dic_no='$doctor_num'");
	$result2 = mysqli_query($conn,$sql);
		if($result2) {
			while($rrow = mysqli_fetch_assoc($result2)) {
				//echo $rrow['cnt']."개</h2><br><br>";
				$count = $rrow['cnt'];
			}
		}?></tr></td>
	<?
	$now_date = date("Y-m-d"); $now_time = date("H:i:s"); // 시간 지난 예약 지우기용
	$str_now_date = strtotime($now_date); $str_now_time = strtotime($now_time);
	$count = 1;

	$sql = ("SELECT resv_no FROM reservation WHERE doc_no='$doctor_num' and resv_date='$r_date'");
	$result3 = mysqli_query($conn,$sql);
		while($row3 = mysqli_fetch_array($result3)) {
			$reservation_no = $row3['resv_no'];
			//echo $reservation_no."<br>";

			$sql = ("SELECT user_no, resv_time FROM reservation WHERE resv_no='$reservation_no'");
			$result4 = mysqli_query($conn, $sql);
			$row4 = mysqli_fetch_array($result4);
			$user_num = $row4['user_no'];
			$r_time = $row4['resv_time'];

			$sql = ("SELECT user_name FROM user WHERE user_no='$user_num'");
			$result5=mysqli_query($conn, $sql);
			$row5 = mysqli_fetch_array($result5);
			$u_name = $row5['user_name'];

				echo "(".$count.")"." "."예약 시간 : ".$r_time."<br>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;환자 이름 : ".$u_name;
				?>
				<a href="doc_medical record.php?usernum=<?=$user_num?>" >상세 확인 </a><br><br> 
				<?
				$count++;
		}
mysqli_close($conn);
?>
<!--<div style="overflow:scroll; width:700px; height:300px;">-->
	</div></td></tr>	
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