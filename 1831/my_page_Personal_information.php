<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>이지수 병원(개인정보 처리 방침)</title>
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
               <li><a href="my_page.php">예약확인</a></li>
               <li><a href="modify_user.php">개인 정보 수정</a></li>
               <li><a href="my_page_pw_check.php">비밀번호 변경</a></li>
               <li><a href="my_page_Personal_information.php">개인정보 처리 방침</a></li>
               <li><a href="my_page_Terms_of_Use.php">회원약관</a></li>
               <li><a href="drop_out.php">회원탈퇴</a></li>
		   </ul>
         </div>
     

    
   <div id="personal">개인 정보 처리 방침</div>
	<textarea name="textarea"   rows="45" cols="130"  readonly="readonly" class="textarea"  style="position:absolute; left:45px; top:480px;"  title="서비스 약관">
 이 약관은 주식회사 나이스정보통신 주식회사(이하 회사라 함)가 제공하는 전자지급결제대행서비스 및 결제대금예치서비스를 이용자가 이용함에 있어 회사와 이용자 사이의 개인정보 수집 및 이용에 대한 기본적인 사항을 정함을 목적으로 합니다.

1.회사는 다음과 같은 목적 하에 “서비스”와 관련한 개인정보를 수집합니다.
◦서비스 제공 계약의 성립, 유지, 종료를 위한 본인 식별 및 실명확인, 각종 회원관리
◦서비스 제공 과정 중 본인 식별, 인증, 실명확인 및 회원에 대한 각종 안내/고지
◦대금 환불, 상품배송 등 전자상거래 관련 서비스 제공
◦서비스 제공 및 관련 업무처리에 필요한 동의 또는 철회 등 의사확인
◦이용 빈도 파악 및 인구통계학적 특성에 따른 서비스 제공 및 CRM
◦기타 회사가 제공하는 이벤트 등 광고성 정보 전달, 통계학적 특성에 따른 서비스 제공 및 광고 게재, 실제 마케팅 활동


2.결제수단별 회사가 수집하는 개인정보의 항목은 다음과 같습니다.
◦전자금융거래서비스 이행과 관련 수집 정보 
◾이용자의 고유식별번호
◾이용자의 신용카드 정보 또는 지불하고자 하는 금융기관 계좌 정보
◾이용자의 이메일
◾이용자의 상품 또는 용역 거래 정보



3.이용자의 개인정보는 원칙적으로 개인정보의 수집 및 이용목적이 달성되면 지체 없이 파기 합니다. 단, 다음의 정보에 대해서는 아래의 이유로 명시한 기간 동안 보존 합니다.
1.회사 내부 방침의 의한 정보보유
 ◾보존항목: 서비스 상담 수집 항목(회사명, 고객명, 전화번호, E-mail, 상담내용 등)
◾보존이유: 분쟁이 발생 할 경우 소명자료 활용
◾보존기간: 상담 완료 후 6개월

2.관련법령에 의한 정보보유 ◾상법, 전자상거래 등에서의 소비자보호에 관한 법률, 전자금융거래법 등 관련법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 관련법령에서 정한 일정한 기간 동안 정보를 보관합니다. 이 경우 회사는 보관하는 정보를 그 보관의 목적으로만 이용하며 보존기간은 아래와 같습니다.
◾계약 또는 청약철회 등에 관한 기록
◾보존기간: 5년 / 보존근거: 전자상거래 등에서의 소비자보호에 관한 법률

◾대금결제 및 재화 등의 공급에 관한 기록 
◾보존기간: 5년 / 보존근거: 전자상거래 등에서의 소비자보호에 관한 법률
◾(단, 건당 거래 금액이 1만원 이하의 경우에는 1년간 보존 합니다).

◾소비자의 불만 또는 분쟁처리에 관한 기록 
◾보존기간: 3년 / 보존근거: 전자상거래 등에서의 소비자보호에 관한 법률

◾신용정보의 수집/처리 및 이용 등에 관한 기록 
◾보존기간: 3년 / 보존근거: 신용정보의 이용 및 보호에 관한 법률

◾본인확인에 관한 기록 
◾보존기간: 6개월 / 보존근거: 정보통신 이용촉진 및 정보보호 등에 관한 법률

◾방문에 관한 기록 
◾보존기간: 3개월 / 보존근거: 통신비밀보호법




4.이용자는 회사의 개인정보 수집 및 이용 동의를 거부할 수 있습니다. 단, 동의를 거부 하는 경우 서비스 결제가 정상적으로 완료 될 수 없음을 알려 드립니다.
1.회사 내부 방침의 의한 정보보유 
◾보존항목: 서비스 상담 수집 항목(회사명, 고객명, 전화번호, E-mail, 상담내용 등)
◾보존이유: 분쟁이 발생 할 경우 소명자료 활용
◾보존기간: 상담 완료 후 6개월

2.관련법령에 의한 정보보유 
◾상법, 전자상거래 등에서의 소비자보호에 관한 법률, 전자금융거래법 등 관련법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 관련법령에서 정한 일정한 기간 동안 정보를 보관합니다. 이 경우 회사는 보관하는 정보를 그 보관의 목적으로만 이용하며 보존기간은 아래와 같습니다.
◾계약 또는 청약철회 등에 관한 기록 
◾보존기간: 5년 / 보존근거: 전자상거래 등에서의 소비자보호에 관한 법률

◾대금결제 및 재화 등의 공급에 관한 기록 
◾보존기간: 5년 / 보존근거: 전자상거래 등에서의 소비자보호에 관한 법률
◾(단, 건당 거래 금액이 1만원 이하의 경우에는 1년간 보존 합니다).

◾소비자의 불만 또는 분쟁처리에 관한 기록 
◾보존기간: 3년 / 보존근거: 전자상거래 등에서의 소비자보호에 관한 법률

◾신용정보의 수집/처리 및 이용 등에 관한 기록 
◾보존기간: 3년 / 보존근거: 신용정보의 이용 및 보호에 관한 법률

◾본인확인에 관한 기록 
◾보존기간: 6개월 / 보존근거: 정보통신 이용촉진 및 정보보호 등에 관한 법률

◾방문에 관한 기록 
◾보존기간: 3개월 / 보존근거: 통신비밀보호법
</textarea>

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