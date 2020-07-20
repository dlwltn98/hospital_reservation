<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>이지수 병원(병원문의)</title>
   <link rel="stylesheet" type="text/css" href="QnAListCSS.css">
</head>
<body>

<div class="frame">
      <div class="header-box">
	   <a href="home.php" class="header-link">
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
				
				<div class="accordion">
            <h2>자주하는 질문</h2>
            <div id="one" class="section">
              <h3>
               <a href="#one">1. 인터넷으로 진료 예약을 했는데 예약 변경 및 취소 어떻게 하나요?</a>
              </h3>
              <div>
               <p>인터넷으로 진료 예약을 하신 경우 마이페이지 진료예약조회에서 예약하신 진료일로부터 1일전까지 변경 및 취소가 가능합니다. 또는 전화 진료예약 및 변경(T 031-2819-8111)을 이용하셔서 진료 당일까지 취소 또는 변경 하실 수 있습니다.</p>
              </div>
            </div>
            <div id="two" class="section">
              <h3>
               <a href="#two">2. 진료비에 대해 자세히 알려면 어떻게 하면 됩니까?</a>
              </h3>
              <div>
               <p>원무과 제증명창구에서 진료비 상세내역 안내 및 출력 서비스 제공하고 있습니다.</p>
              </div>
            </div>
            <div id="three" class="section">
              <h3>
               <a href="#three">3. 의사선생님과의 진료상담 없이 치료만 진행한 경우에도 진찰료를 지불해야 하나요?</a>
              </h3>
              <div>
               <p>주사연속처방, 물리치료, 방사선치료 등의 치료시 기본 진찰료 50% 부과됩니다.</p>
              </div>
            </div>
            <div id="four" class="section">
              <h3>
               <a href="#four">4. 진료비 계산은 신용카드, 체크카드로 되나요?</a>
              </h3>
              <div>
               <p>현금과 체크카드, 신용카드 모두 가능합니다. ( 카드종류에 따라 무이자 할부도 가능합니다)</p>
              </div>
            </div>
            <div id="five" class="section">
              <h3>
               <a href="#five">5. 선택진료를 하는 의사의 자격은 어떻게 되나요?</a>
              </h3>
              <div>
               <p>해당 진료과의 전문의 자격을 받은 후 10년이 경과한 진료경험이 풍부한 의사, 면허 취득 후 15년이 경과한 치과의사, 전문의 자격인정 받은 후 5년이 경과한 대학병원의 조교수 이상인 의사 ※추가비용산정기준 참조</p>
              </div>
            </div>
            <div id="six" class="section">
              <h3>
               <a href="#six">6. 선택진료제도는 무엇인가요?</a>
              </h3>
              <div>
               <p>특정한 자격요건을 갖춘 의사를 선택하여 질 높은 의료를 제공하고 전문적 치료와 향상된 서비스를 드리기 위한 제도입니다. (근거 : 의료법 제37조 2항) 선택 진료시 법에서 정하는 선택진료비는 환자가 전액 부담을 하여야 합니다.</p>
              </div>
            </div>
            <div id="seven" class="section large">
            <h3>
               <a href="#seven">7. 응급의료에 대한 법률 제2조에서 응급증상에 해당되는 사항은 어떤 건가요?</a>
              </h3>
              <div>
               <p>신경학적 응급증상 : 급성의식장애, 급성 신경학적 이상, 구토, 의식장애 등이 있는 두부손상 심혈관계 응급증상 : 심폐소생술이 필요한 증상, 급성 호흡곤란, 심장질환으로 인한 급성흉통, 심계항진, 박동이상 및 쇼크 중독 및 대사장애 : 심한 탈수, 약물, 알코올 또는 기타 물질의 과다 복용이나 중독, 급성대사장애(간부전. 신부전. 당뇨 등) 외과적 응급증상 : 개복술을 요하는 급성복증 (급성 복막염. 장폐색증. 급성췌장염 등), 광범위한 화상(신체 표면적의 18%이상), 관통상, 개방성·다발성 골절 또는 대퇴부 척추의 골절, 사지를 절단할 우려가 있는 혈관손상, 다발성 외상, 전신마취 하에 응급수술을 요하는 증상 00% 출혈 : 계속되는 각혈, 지혈이 안되는 출혈, 급성 위장관 출혈, 혈관손상 안과적 응급증상 : 화학물질에 의한 눈의 손상, 급성 시력소실 알러지 : 얼굴 부종을 동반한 알러지 반응 소아과적 응급증상 : 소아경련성 장애 38도 이상인 소아 고열(공휴일. 야간 등 의료서비스가 제공되기 어려운 때에 8세 이하의 소아에게 나타나는 증상) 정신과적 응급증상 : 자신 또는 다른 사람을 해할 우려가 있는 정신장애 산부인과적 응급증상 : 성폭력으로 인하여 산부인과적 검사 또는 처치가 필요한 증상 ※응급처치 및 응급의료를 행한 경우 진찰료 및 치료비 외에 “응급의료관리료”가 추가로 산정되며, 환자의 증상에 따라 급여증상이 아닐 경우 응급의료관리료는 100% 전액 본인분담입니다.</p>
              </div>
            </div>
            <div id="eight" class="section">
            <h3>
               <a href="#eight">8. 선택진료를 하는 의사의 자격은 어떻게 되나요?</a>
              </h3>
              <div>
               <p>홈페이지를 방문하셔서 진료안내｜예약 - 예약 및 내원 조회 메뉴에서 예약 내용을 확인 하실 수 있습니다.</p>
              </div>
            </div>
           </div>

            <div>
               <h3>
               기타문의:000000@naver.com
               </h3>
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