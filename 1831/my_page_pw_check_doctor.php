<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>비밀번호 변경</title>
   <link rel="stylesheet" type="text/css" href="m_page.css">
</head>
<script type="text/javascript">
    function check_Pw() {
      var du = document.pwChange;

      if(!du.doc_password.value){
        alert("비밀번호를 입력하시오");
        du.doc_password.focus();
        return false;
      }
    }
</script>
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
	      if($_SESSION['doc_id'] != null){
	    ?>
		  <a href="logout.php"" class="head-link"> 로그아웃</a> |
		  <a href="doc_my_page.php"" class="head-link"> my page</a>
	    <?php
	      }
		?>
       </ul>

	   <img src="dong.jpg" width="1150px" height="220px">
	  </div> 

	  
	     <div id="nav-box">
           <ul>
               <li><a href="modify_doctor.php">개인 정보 수정</a></li>
               <li><a href="my_page_pw_check_doctor.php">비밀번호 변경</a></li>
               <li><a href="my_page_Personal_information_doctor.php">개인정보 처리 방침</a></li>
               <li><a href="my_page_Terms_of_Use_doctor.php">회원약관</a></li>
               <li><a href="drop_out_doctor.php">회원탈퇴</a></li>
		   </ul>
         </div>
     

      
      	<div id="pw_ch">비밀번호 변경하기</div>     	
      	<form action="my_page_pw_check_doctor_db.php" name="pwChange" method="post">
      	  <div id="pre_pw">현재 비밀번호 : </div> 
      	  <input type = "password" name = "doc_password" id="doc_password" maxlength="13" style="width:400px; height:40px; position:absolute; left:520px; top:710px;">
      	  <input type="image" src="submit.jpg" onclick="return check_Pw()" style="width:140px; height:60px; position:absolute; left:780px; top:830px;">
		 </form>		        

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

