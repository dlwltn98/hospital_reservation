<?
 session_start();
 $db_table="healthinfo";
 
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
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>이지수 병원</title>
   <link rel="stylesheet" type="text/css" href="homeframe.css">
</head>
<?
$yy = $_REQUEST['yy'];
$mm = $_REQUEST['mm'];
if($yy == '') $yy = date('Y');
if($mm == '') $mm = date('m');

function sel_yy($yy, $func) {
	if($yy == '') $yy = date('Y');

	if($func=='') {
		$str = "<select name='yy'>\n<option value=''></option>\n";
	} else {
		$str = "<select name='yy' onChange='$func'>\n<option value=''></option>\n";
	}
	$gijun = date('Y');
	for($i=$gijun-5;$i<$gijun+20;$i++) {
		if($yy == $i) $str .= "<option value='$i' selected>$i</option>";
		else $str .= "<option value='$i'>$i</option>";
	}
	$str .= "</select>";
	return $str;
}

function sel_mm($mm, $func) {
	if($func=='') {
		$str = "<select name='mm'>\n";
	} else {
		$str = "<select name='mm' onChange='$func'>\n";
	}
	for($i=1;$i<13;$i++) {
		if($mm == $i) $str .= "<option value='$i' selected>{$i}월</option>";
		else $str .= "<option value='$i'>{$i}월</option>";
	}
	$str .= "</select>";
	return $str;
}

/*스케쥴 불러오는 함수
function get_schedule($yy,$mm,$dd) {
	$mm = str_pad($mm, 2, "0", STR_PAD_LEFT);
	$dd = str_pad($dd, 2, "0", STR_PAD_LEFT);
	$dtstr = $yy."-".$mm."-".$dd;
	$sql = "SELECT *
FROM schedule
WHERE frdt <= '$dtstr'
AND todt >= '$dtstr'
ORDER BY frdt, todt";
	$ret = dbquery($sql) or die(mysql_error());
	while($row = dbfetch($ret)) {
		$str .= "<font style='font-size:8pt;'>- $row[name]</font><br>";
	}
	return $str;
}
*/

// 1. 총일수 구하기
$last_day = date("t", strtotime($yy."-".$mm."-01"));

// 2. 시작요일 구하기
$start_week = date("w", strtotime($yy."-".$mm."-01"));

// 3. 총 몇 주인지 구하기
$total_week = ceil(($last_day + $start_week) / 7);

// 4. 마지막 요일 구하기
$last_week = date('w', strtotime($yy."-".$mm."-".$last_day));
?>

<body>
<div class="frame">
      <div class="header-box">
	   <a href="home.php" class="header-link">
	   <div class="header-logo"><img src="jisoo.png" width="420px" height="200px"></div></a>

	   <ul class="sign-list">
		   <?php
        if(isset($_SESSION["user_id"]) == NULL)
        {
       ?>
		  <a href="login.php" class="head-link">로그인 </a>
		  <a href="signup.php"" class="head-link"> 회원가입</a>
       <?php
        }
       ?>

	   <?php
        if(isset($_SESSION["user_id"]))
        {
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
               <li><a href="hospital_intro.php">병원소개</a>
			       <ul>
						<li><a href="chief_intro.php">병원장 소개</a></li>
						<li><a href="location.php">오시는 길</a></li>
						<li><a href="ETC.php">환자의 의무</a></li>
					</ul>
			   </li>
               <li><a href="">의료진소개</a></li>
               <li><a href="QnAList.php">병원문의</a></li>
               <li><a href="healthinfo_list.php">건강정보</a></li>
               <li><a href="">자유게시판</a></li>
           </ul>
         </div>

<form name="form" method="get">
<div id="calender">
<table width='910' cellpadding='0' cellspacing='1' bgcolor="#999999" style="position:absolute; left:130px; top:450px;" border="0px">
<tr>
<td height="70" align="center" bgcolor="#FFFFFF" colspan="7">
<?=sel_yy($yy,'submit();')?>&nbsp년 &nbsp&nbsp<?=sel_mm($mm,'submit();')?>&nbsp월 &nbsp&nbsp<input type="submit" value="보기"></td>
</tr>
<tr>
<td width="130" height="40" align="center" bgcolor="#A5A5E7"><b>일</b></td>
<td width="130" align="center" bgcolor="#A5A5E7"><b>월</b></td>
<td width="130" align="center" bgcolor="#A5A5E7"><b>화</b></td>
<td width="130" align="center" bgcolor="#A5A5E7"><b>수</b></td>
<td width="130" align="center" bgcolor="#A5A5E7"><b>목</b></td>
<td width="130" align="center" bgcolor="#A5A5E7"><b>금</b></td>
<td width="130" align="center" bgcolor="#A5A5E7"><b>토</b></td>
</tr>

<?
$today_yy = date('Y');
$today_mm = date('m');
// 5. 화면에 표시할 화면의 초기값을 1로 설정
$day=1;

// 6. 총 주 수에 맞춰서 세로줄 만들기
for($i=1; $i <= $total_week; $i++){?>
<tr>
<?
	// 7. 총 가로칸 만들기
	for ($j=0; $j<7; $j++){
?>
<td width="130" height="120" align="left" valign="top" bgcolor="#FFFFFF">
  <?
	// 8. 첫번째 주이고 시작요일보다 $j가 작거나 마지막주이고 $j가 마지막 요일보다 크면 표시하지 않아야하므로
	//    그 반대의 경우 -  ! 으로 표현 - 에만 날자를 표시한다.
	if (!(($i == 1 && $j < $start_week) || ($i == $total_week && $j > $last_week))){

		if($j == 0){
			// 9. $j가 0이면 일요일이므로 빨간색
			echo "<font color='#FF0000'><b>";
		}else if($j == 6){
			// 10. $j가 0이면 일요일이므로 파란색
			echo "<font color='#0000FF'><b>";
		}else{
			// 11. 그외는 평일이므로 검정색
			echo "<font color='#000000'><b>";
		}

		// 12. 오늘 날자면 굵은 글씨
		if($today_yy == $yy && $today_mm == $mm && $day == date("j")){
			echo "<u>";
		}
		
		// 13. 날자 출력
		?> <div><a href="doctor_schedule.php" onClick="window.open(this.href,'', "width=1100, height=1000, scrollbars=yes"); return false;" style="text-decoration:none;">
		<?echo $day;?></div>
		
        <?
		if($today_yy == $yy && $today_mm == $mm && $day == date("j")){
			echo "</u>";
		}

		echo "</b></font> &nbsp;";

		// 14. 날자 증가
		$day++;
	}
	?>
</td>
<?}?>
</tr>
<?}?>
</table> 
</form>
</div>
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