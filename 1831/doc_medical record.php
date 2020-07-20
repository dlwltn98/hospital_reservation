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
	 <tr><td width="300" height="170" align="center" style="background-color:#F3F3F3" >
<?

	//$db_table = "reservation";
	$d_id = $_SESSION['doc_id'];
	$user_no = $_GET['usernum'];
	//echo $user_no;

	$sql = ("SELECT user_name, year, month, days, user_gender FROM user WHERE user_no = '$user_no'");
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$u_name = $row['user_name'];
	$u_year = $row['year'];
	$u_month = $row['month'];
	$u_days = $row['days'];
	$u_gender = $row['user_gender'];

	$sql = ("SELECT disease_code FROM medical WHERE user_no='$user_no'");
	$result2 = mysqli_query($conn, $sql);
	$row2 = mysqli_fetch_array($result2);
	$d_code = $row2['disease_code'];
	//echo $d_code."<br>";

	$sql = ("SELECT disease_name FROM disease WHERE disease_code='$d_code'");
	$result3 = mysqli_query($conn, $sql);
	$row3 = mysqli_fetch_array($result3);
	$d_name = $row3['disease_name'];
	//echo $d_name;

	echo "<h2>이름 : ".$u_name."</h2>";
	echo "<h2>성별 : ".$u_gender."</h2>";
	echo "<h2>생년월일 :".$u_year."년".$u_month."월".$u_days."일"."</h2>";
	echo "<h2>병명 : ".$d_name."</h2><br>";
	?></td></tr>
	<tr><td width="300" align="center">
	<div style="font-size:50px; font-weight:bold; color:gray;">이전 진료 기록</div>
	<div style="overflow:scroll; width:700px; height:300px;">
    
	<?
	$sql = ("SELECT doc_no FROM doctor WHERE doc_id='$d_id'");
	$result7 = mysqli_query($conn, $sql);
	$row7 = mysqli_fetch_array($result7);
	$doctor_num = $row7['doc_no'];

	$sql = ("SELECT medic_no FROM medical WHERE doc_no = '$doctor_num' and user_no = '$user_no'");
	$result4 = mysqli_query($conn, $sql);
		while($row4 = mysqli_fetch_array($result4)) {
			$medic_num = $row4['medic_no'];
			//echo $doctor_no;

			$sql = ("SELECT medic_pill, medic_detail, disease_code FROM medical WHERE medic_no='$medic_num'");
			$result5 = mysqli_query($conn, $sql);
			$row5 = mysqli_fetch_array($result5);
			$pill = $row5['medic_pill'];
			$detail = $row5['medic_detail'];
			$d_code = $row5['disease_code'];

			$sql = ("SELECT disease_name FROM disease WHERE disease_code='$d_code'");
			$result6 = mysqli_query($conn, $sql);
			$row6 = mysqli_fetch_array($result6);
			$d_name = $row6['disease_name'];
			//echo $d_name;
        echo    "<font color=#aaa>";
		echo	"처방약".$pill."<br>";
		echo 	"상세사항".$detail."<br>";
		echo 	"별명".$d_name."<br>";
		echo 	"질병분류코드".$d_code."<br>";

		}
	?></div></td></tr>
	</table>	
	<!--<a href = "" >진료보기</a>-->

<!--<div style="overflow:scroll; width:700px; height:300px;">-->
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