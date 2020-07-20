<? 
 session_start();
 $db_table="hinfo";
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>이지수 병원</title>
   <link rel="stylesheet" type="text/css" href="resv_medic.css">
</head>
<?
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
        if(isset($_SESSION["user_id"]) == NULL && isset($_SESSION["doc_id"]) == NULL)
        {
       ?>
		  <a href="login.php" class="head-link">로그인 </a>
		  <a href="signup_select.php"" class="head-link"> 회원가입</a>
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
	   <?php
        if(isset($_SESSION["doc_id"]))
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
               <li><a href="doctor_intro.php">의료진소개</a></li>
               <li><a href="QnAList.php">병원문의</a></li>
               <li><a href="healthinfo_list.php">건강정보</a></li>
               <li><a href="BBS.php">자유게시판</a></li>
           </ul>
         </div>

<img src="resv-logo.png" alt="진료예약" style="width:210px; height:70px; position:absolute; left:150px; top:360px">
  <form name="medic_part" method="post">
   <fieldset style="width:700px; height:40px; border:5px solid green; position:absolute; left:200px; top:450px">
    <div class="ch">
        <select title="진료과 선택" name="medic" id="medic" onchange="window.open(this.value ,'','width=1100, height=1000'); return false;" style="width:500px; height:40px; font-size:20px; text-align:center; position:absolute; left:30px; top:6px">     
        <option value="">진료과 선택</option>
        <option value="doctor1.php">가정의학과</option>
	    <option value="doctor2.php">류마티스내과</option>
	    <option value="doctor3.php">성형외과</option>
        <option value="doctor4.php">소화기내과</option>
        <option value="doctor5.php">신경외과</option>
	    <option value="doctor6.php">이비인후과</option>
	    <option value="doctor7.php">정신건강의학과</option>
	    <option value="doctor8.php">치과</option>
	    <option value="doctor9.php">흉부외과</option>
        </select>
	<div><a href=javascript:void(0);></a></div>
	</div>
   </fieldset>
  </form>


 
 <a href= "doctor1.php" onClick="window.open(this.href,'', 'width=1100, height=1000'); return href='home.php' "><img src="doctor1.png" alt="가정의학과" style="width:200px; hight:200px; position:absolute; left:200px; top:550px"></a>
 <a href="doctor2.php" onClick="window.open(this.href,'', 'width=1100, height=1000'); return href='home.php'"><img src="doctor2.png" alt="류마티스내과" style="width:200px; hight:200px; position:absolute; left:470px; top:550px"></a>
 <a href="doctor3.php" onClick="window.open(this.href,'', 'width=1100, height=1000'); return href='home.php'"><img src="doctor3.png" alt="성형외과" style="width:200px; hight:200px; position:absolute; left:750px; top:550px"></a>
 <a href="doctor4.php" onClick="window.open(this.href,'', 'width=1100, height=1000'); return href='home.php'"><img src="doctor4.png" alt="소화기내과" style="width:200px; hight:200px; position:absolute; left:200px; top:770px"></a>
 <a href="doctor5.php" onClick="window.open(this.href,'', 'width=1100, height=1000'); return href='home.php'"><img src="doctor5.png" alt="신경외과" style="width:200px; hight:200px; position:absolute; left:470px; top:770px"></a>
 <a href="doctor6.php" onClick="window.open(this.href,'', 'width=1100, height=1000'); return href='home.php'"><img src="doctor6.png" alt="이비인후과" style="width:200px; hight:200px; position:absolute; left:750px; top:770px"></a>
 <a href="doctor7.php" onClick="window.open(this.href,'', 'width=1100, height=1000'); return href='home.php'"><img src="doctor7.png" alt="정신건강의학과" style="width:200px; hight:200px; position:absolute; left:200px; top:1020px"></a>
 <a href="doctor8.php" onClick="window.open(this.href,'', 'width=1100, height=1000'); return href='home.php'"><img src="doctor8.png" alt="치과" style="width:200px; hight:200px; position:absolute; left:450px; top:1020px"></a>
 <a href="doctor9.php" onClick="window.open(this.href,'', 'width=1100, height=1000'); return href='home.php'"><img src="doctor9.png" alt="흉부외과" style="width:200px; hight:200px; position:absolute; left:750px; top:1020px"></a>

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