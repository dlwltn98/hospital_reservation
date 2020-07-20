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

$Num = $_GET['no'];

$sql = 'select * from qna where num = ' . $Num;

$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>이지수 병원(건강정보)</title>
   <link rel="stylesheet" type="text/css" href="health_view.css">
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
         <div id="title">          
           <img src="title_hinfo.png" align="center" width="180" height="80" alt="건강정보"> 
         </div>
         <article class="boardArticle">
           <div id="boardView">
             <h3 id="boardTitle">제목: <?php echo $row['subject']?></h3>
             <div id="boardInfo">
               <span id="boardName">작성자: <?php echo $row['id']?></span>
               <span id="boardDate">등록일: <?php echo $row['regist_day']?></span>
               <span id="boardHit">조회: <?php echo $row['hit']?></span>
             </div>
           <div id="boardContent"><?php echo $row['content']?></div>     
          
         <div class="buttonbox">
		          <a href="healthinfo_list.php"><button>목록</button></a>
				</article>
			  </div>
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
