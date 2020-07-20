<?
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>이지수 병원(기 타)</title>
   <link rel="stylesheet" type="text/css" href="ETCcss.css">
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
     


			<!--기타 법률정보-->
			<div class="articles">

				<h3 class="art_head">◎환자의 권리와 의무</h3>

				<p>의료법 제1조의 2 제1항 관련</p>

				<h4 class="ex-title2">1. 진료받을 권리</h4>
				<p>환자는 자신의 건강보호와 증진을 위하여 적절한 보건의료서비스를 갖고 성별, 나이, 종교, 신분 및 경제적 사정 등을 이유로 건강에 관한 권리를 침해 받지 아니 하며 의료인은 정당한 사유 없이 진료를 거부하지 못한다.</p>

				<h4 class="ex-title2">2. 알권리 및 자기결정권</h4>
				<p>환자는 담당의사 간호사 등으로 부터 질병상태 치료방법 의학적 대상 연구 여부, 장기이식 여부, 부작용 등 예상 결과 및 진료비용에 관하여 충분한 설명을 듣고 자세히 물어볼 수 있으며 이에 관한 동의여부를 결정할 권리를 가진다.</p>

				<h4 class="ex-title2">3. 비밀을 보호받을 권리</h4>
				<p>환자는 진료와 신체상 건강상 비밀과 사생활의 비밀을 침해 받지 아니하며 의료인과 의료기관은 환자의 동의를 받거나 범죄수사 등 법률에서 정한 경우 외에는 비밀을 누설 발표 하지 못한다.</p>

				<h4 class="ex-title2">4. 상담·조정을 신청할 권리</h4>
				<p>환자는 의료서비스관련 분쟁이 발생한 경우, 한국의료분쟁조정중재원 등에 상담 및 조정 신청을 할 수 있다.</p>

				<h3 class="art_head">◎환자의 의무</h3>
				<h4 class="ex-title2">1. 의료인에 대한 신뢰·존중 의무</h4>
				<p>환자는 자신의 건강관련 정보를 의료인에게 정확히 알리고 의료인의 치료계획을 신뢰하고 존중하여야 한다.</p>

				<h4 class="ex-title2">2. 부정한 방법으로 진료를 받지 않을 의무</h4>
				<p>환자는 진료 전에 본인의 신분을 밝혀야 하고 타인의 명의로 진료를 받는 등 거짓이나 부정한 방법으로 진료를 받지 아니한다.</p>

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