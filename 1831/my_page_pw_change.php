<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>이지수 병원(비밀번호 변경)</title>
   <link rel="stylesheet" type="text/css" href="m_page.css">
</head>
<script type="text/javascript">
    function check_Pw() {
      var du = document.pwChange;

      if(!du.user_password.value){
        alert("비밀번호를 입력하시오");
        du.user_password.focus();
        return false;
      }
      if(du.user_password.value != du.pwch.value){
        alert("비밀번호확인을 입력해주세요.");
        du.pwch.focus();
        return false;
      }
    }
</script>
<script>
  function check_pw(val){
    
    var du = document.pwChange;
    var ogpw = du.user_password.value;
    var same = "<span style='color:green;'>비밀번호가 일치합니다.</span>";
    var diff = "<span style='color:red;'>비밀번호가 일치하지 않습니다.</span>";
    
    if(ogpw == val){
        document.getElementById("check").innerHTML = same;
    }else if(ogpw != val){
        document.getElementById("check").innerHTML = diff;
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
        if(isset($_SESSION["user_id"]))
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
     

        <div id="pw_change">비밀번호 변경하기</div>
  
     <form action="my_page_pw_change_db.php" name="pwChange" method="post">    		
       <div class="new_pw">새로운 비밀번호</div>
       <input type = "password" name = "user_password" id="user_password" maxlength="13" style="width:700px; height:80px; position:absolute; left:220px; top:640px;">
       <div class="ch_new_pw">새 비밀번호 확인</div>
       <input type = "password" name = "pwch" id="pwch" maxlength="13" onkeyup="check_pw(this.value)" style="width:700px; height:80px; position:absolute; left:220px; top:870px;"> 
       <div id="check">비밀번호를 확인하세요.</div>

       <input type="image" src="submit.jpg" onclick="return check_Pw()" style="width:140px; height:60px; position:absolute; left:770px; top:1040px;">
	</form>
		
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