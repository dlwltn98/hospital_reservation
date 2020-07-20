<!DOCTYPE html>
<HTML>
<head>
<title>이지수 병원(의사PW찾기)</title>
<link rel="stylesheet" type="text/css" href="homeframe.css">
</head>

<script>
  function id_ch(){

            if(!frm1.doc_id.value){
               alert('ID를 입력해주세요');
            }
            else{
                frm1.submit();
            }

			if(!frm2.doc_email.value){
               alert('Email를 입력해주세요');
            }
            else{
                frm2.submit();
            }
        }
</script>
 <body>
 <div class="frame">
      <div class="header-box">
	    <?php
        if(isset($_SESSION["user_id"]))
        {
       ?>
        <a href="home.php" class="header-link">
       <?php
        }
       ?>
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
        
            <div id="f_pw">비밀번호 찾기</div><br>
            <form name=frm1 method='post' action='doc_find_password_mail.php'>
            <div class="f_pw1">아이디 : &nbsp;</div>
            <div class="f_pw2"><input type=text size=13 name=doc_id style="width:350px; height:45px;"></div>
			<form name=frm2 method='post' action='doc_find_pwcheck.php'>
            <div class="f_pw3">이메일 : &nbsp;</div>
            <div class="f_pw4"><input type=text size=30 name=doc_email style="width:350px; height:45px;"></div>
			<div class="f_pw5"><img src="submit.jpg" onclick="id_ch()" style="width:150px; heihgt:50px;"></div>
			<div class="f_pw6"><img src="findid.jpg" onclick="location.href='doc_findID.php'" style="width:150px; heihgt:50px;"></div>
			<div class="f_pw7"><img src="main.jpg" onclick="location.href='home.php'" style="width:150px; heihgt:50px;"></div>
            </form>

        <div class="footer">
         <div class ="footer-box1"> 대표전화 : 031-2819-8111 </div>
		 <div class ="footer-box2"> 응급의료센터 031-2434-9453 </div>
		 <div class ="footer-box3"> 건강검진의료센터 031-9368-1683 </div>
		 <div class ="footer-box4"> 개인정보처리방침| 환자의권리와의무 | 의료정보운영방침 | 홈페이지이용문의 </div>
		 <div class ="footer-box5"> 성남시 수정수 양지동 611(양지로27번길 1)(12140)/사업자등록번호: 281-98-11193 이율리</div>

</div>
</body>
</html>