<?
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>이지수 병원(위치 안내)</title>
   <link rel="stylesheet" type="text/css" href="locationcss.css">
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

			<!--병원  위치소개-->
			<div class="articles">
					<div class="articles-E">
						<div class='h-map'>
							<h2 class="art_head" =""><p style="font-weight:900">◎위치 안내</p></h2>
							<img src='Hlocation.png' align="center" width="600px" height="300px"><br/>※동서울대학교 1호관 </div>

						<div>
						<h2 class="art_head"><p style="font-weight:900">◎오시는 길</p></h2>

						<table class="bus_list">
							<colgroup>
								<col width="10%">
								<col width="10%">
								<col>
								<col width="10%">
								<col width="10%">
								<col>
							</colgroup>
							<thead>
								<tr>
									<th scope="col">구분</th>
									<th scope="col">번호</th>
									<th scope="col">주요경유지</th>
									<th scope="col">구분</th>
									<th scope="col">번호</th>
									<th scope="col">주요경유지</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td rowspan="10">
										<span class="bus_green">일반</span>
									</td>
									<td>100</td>
									<td>성남-<b><u>이지수 병원</u></b>-가락시장-잠실</td>
									<td rowspan="2">
										<span class="bus_blue">좌석</span>
									</td>
									<td>500-2</td>
									<td>곤지암-모란-<b><u>이지수 병원</u></b>-교대</td>
								</tr>  
								<tr>
									<td>70</td>
									<td>성남-<b><u>이지수 병원</u></b>-천호-상봉</td>
									<td>200-1</td>
									<td>동원대-모란-<b><u>이지수 병원</u></b>-잠실</td>
								</tr>  
								<tr>
									<td>30</td>
									<td>강일-올림픽공원-<b><u>이지수 병원</u></b>-성남</td>
									<td rowspan="6">
										<span class="bus_blue">간선</span>
									</td>
									<td>302</td>
									<td>성남-<b><u>이지수 병원</u></b>-구의-동대문</td>
								</tr> 
								<tr>
									<td>30-1</td>
									<td>하남시-천호-<b><u>이지수 병원</u></b>-성남</td>
									<td>303</td>
									<td>성남-<b><u>이지수 병원</u></b>-잠실-신설동</td>
								</tr> 
								<tr>
									<td>500-5</td>
									<td>광주시-<b><u>이지수 병원</u></b>-양재-강남</td>
									<td>440</td>
									<td>단대오거리-<b><u>이지수 병원</u></b>-양재-신사</td>
								</tr> 
								<tr>
									<td>32</td>
									<td>송정동-모란-<b><u>이지수 병원</u></b>-석촌호수</td>
									<td>407</td>
									<td>신흥역-<b><u>이지수 병원</u></b>-논현-종로5가</td>
								</tr> 
								<tr>
									<td>1116</td>
									<td>흥-모란-<b><u>이지수 병원</u></b>-잠실</td>
									<td>408</td>
									<td>단대오거리-<b><u>이지수 병원</u></b>-한남-광화문</td>
								</tr> 
								<tr>
									<td>5</td>
									<td>야탑-<b><u>이지수 병원</u></b>-복정-마천</td>
									<td>462</td>
									<td>성남시청-<b><u>이지수 병원</u></b>-양재-신길</td>
								</tr>
								<tr>
									<td>116</td>
									<td>죽전-모란-<b><u>이지수 병원</u></b>-잠실</td>
									<td><span class="bus_green">지선</span></td>
									<td>4419</td>
									<td>성남-<b><u>이지수 병원</u></b>-세곡동-청담역</td>
								</tr> 
								<tr>
									<td>119</td>
									<td>광주-서현-<b><u>이지수 병원</u></b>-잠실</td>
									<td><span class="bus_red">광역</span></td>
									<td>9403</td>
									<td>분당-<b><u>이지수 병원</u></b>-광진구청-동대문운동장</td>
								</tr> 
							</tbody>
						</table>
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