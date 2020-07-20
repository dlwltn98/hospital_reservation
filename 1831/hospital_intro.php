<?
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>이지수 병원(병원소개)</title>
   <link rel="stylesheet" type="text/css" href="introcss.css">
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
				<div>
				<div class="art_head"><p style="font-weight:900">◎이지수병원 설립목적</p></div>
						<div>
						이지수 병원은 가입자의 의료이용편의를 도모하고 지역사회의 보건의료 수요를 충족시키며,
						아울러 임상의학연구와 건강보험 전반의 각종 조사 분석을 통하여 국민 보건의료 수준 향상과 의학 및 건강보험 제도의 발전에 기여함을 목적으로합니다.
						<br/><br/>
						또한 ‘생명 존중의 정신’과 이웃과 아픔을 함께 하는 ‘나눔 정신’을 실천함으로써 존경받는 병원으로 사회적 책임을 다해오고 있다. 최고의 의료 수준과 첨단 의료 장비를 갖추고 선진 외국의 의료와 어깨를 나란히 하면서 우리나라의 의료 발전을 이끌고 있다.

						이지수병원은 동서울사회복지재단 산하 8개 병원의 모 병원이다. 동서울사회복지재단은 1977년부터 설립되어 의료사업과 사회복지사업, 장학사업, 학술연구사업 등 사회공익사업을 전개해 오고 있다. 특히 농어촌 산간벽지 의료 취약지역에 현대식 종합병원을 건립하여 ‘우리 사회의 가장 어려운 이웃을 돕는다’ 는 동서울 이지수 설립자의 동서울재단 설립 이념을 실천하고 있다.
						</div>
				<hr>

				<div class="art_head"><p style="font-weight:900">◎세계의학의 리더로서 글로벌 표준을 만들어가는 이지수병원</p></div>
						<div>
							의학의 발전은 기초의학에 대한 끊임없는 연구 노력과 수많은 임상시험, 다양한 치료경험, 선진 의료기술, 생명존중 정신이 유기적 결합되어 가능하다. 이지수병원은 이제 국내 병원과의 경쟁이 아닌 국내 의학발전의 선도자로서 [세계 의학의 글로벌 표준이 되는 병원]이 되기 위한 노력을 경주하고 있다. 이를 위해 이지수병원은 '동서울생명과학연구소'와 '임상연구센터'를 중심으로 산·학·연을 연계한 기초의학 및 신약 연구개발, 암 정복을 위한 임상연구에 끊임없이 매진해 나가고 있다.
							<br/><br/>
							현대 첨단 의학은 이제 질병을 치료하고 환자의 고통을 줄이고 회복을 빨리 하는 것에 머무르지 않는다. 병의 근원을 제거해 처음부터 질병에 걸리지 않고 건강한 삶을 영위하게 하는 것이다. 의학과 공학이 유기적으로 결합된 미래 첨단의학연구 등 서울아산병원은 미래 첨단의학연구 개발의 중심에 서있다. 여기에 임상연구센터는 이론이 아닌 실질적인 연구의 중심에서 의료 발전의 중추적인 역할을 담당하고 있으며 이미 지난해 세계적인 제약회사와 임상실험계약을 체결함으로서 임상 연구 분야에서 탁월한 실력을 인정받고 있다.
						</div>
				
				<hr>


				<div class="art_head"><p style="font-weight:900">◎앞선 의술 더 큰 사랑의 실천</p></div>
						<div>
							이지수병원은 불우한 이웃들에 대한 무료진료를 통해 기업의 이익을 사회에 환원하고 ’동서울 정신’을 실천해 오고 있다.
							<br/>
							이러한 실천의지를 나타내기 위해 병원 운영 목표를 ‘최고 의료 수준 유지’ ‘이웃과 함께하는 병원’ ‘나눔과 배려’를 실천하는 따뜻한 병원이 되기 위해 늘 환자의 아픔을 함께 나누는 병원이 되고자 한다. 친절한 병원, 환자를 내 가족같이 여기는 따뜻한 병원으로 만들기 위해 끊임없는 노력도 잊지 않고 있다.
						</div>
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