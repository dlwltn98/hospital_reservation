<?
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>이지수 병원(병원장 소개)</title>
   <link rel="stylesheet" type="text/css" href="chief_introcss.css">
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

			<!--병원 소개정보-->
			<div class="articles">
				
				<div><img src="h-chiefimg.png" width="200px" height="300px">
				<br/><b>&lt이지수병원 병원장 서장원&gt</b></div>
            <div class="art_head"><p style="font-weight:900">◎병원장 인사말</p></div>
                  <div>
                  ‘끊임없는 도전과 열정으로 높은 수준의 진료, 교육, 연구를 성취함으로써 인류의 건강한 삶에 기여한다’는 미션을 위해 모든 역량을 집중해왔습니다.
                  그 결과 불과 20여 년 만에 기존 치료법의 한계를 극복한 새로운 치료법들이 이곳에서 개발되었으며 
                  환자의 마음까지 살피는 인술로 12년 연속 대한민국에서 가장 존경받는 병원에도 선정되었습니다.
                  현재 이지수 병원은 환자 안전과 의료 질 향상을 위한 상시 위기 대응 시스템과 자체 의료질
                  평가 기준을 갖추고 병원의 모든 프로세스를 환자 중심으로 혁신하는 한편 환자 경험을
                  진료에 접목한 의료서비스로 격이 다른 이지수병원만의 문화를 만들고 있습니다.

                  이지수병원은 앞으로도 의료의 학문적 발전과 임상 진료 수준의 향상을 위해 새로운 도전에
                  주저하지 않고, 앞선 의술 더 큰 사랑을 실천하며 대한민국 의료를 선도하는 병원, 누구에게나
                  가장 신뢰받는 병원이 되기 위해 최선을 다할 것을 약속드립니다.
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