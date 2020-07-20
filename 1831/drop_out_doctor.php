<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>회원 탈퇴</title>
   <link rel="stylesheet" type="text/css" href="m_page.css">
</head>
<script>
  function blank_check() {
    var du = document.drop;

    if(!du.doc_email.value){
        alert("이메일을 입력하시오");
        du.doc_email.focus();
        return false;
    }
    if(!du.doc_password.value){
        alert("비밀번호를 입력하시오");
        du.doc_password.focus();
        return false;
    }
  }
</script>
<script>
  function mail(){
 
    var du = document.drop;
        
    var emailc = du.doc_email.value;
    
    if(!emailc){
        alert('이메일을 입력해주세요.');
        du.doc_email.focus();
        return false;
    }
        
    var url = "drop_out_check_mail_doctor.php?doc_email="+emailc; //고쳐라 
    
    window.open(url,'','width=450,height=300,left=500');
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
               <li><a href="modify_user_doctor.php">개인 정보 수정</a></li>
               <li><a href="my_page_pw_check_doctor.php">비밀번호 변경</a></li>
               <li><a href="my_page_Personal_information_doctor.php">개인정보 처리 방침</a></li>
               <li><a href="my_page_Terms_of_Use_doctor.php">회원약관</a></li>
               <li><a href="drop_out_doctor.php">회원탈퇴</a></li>
		   </ul>
         </div>
     

      
		<div id="out">회원 탈퇴</div>
        
        <form  action ="drop_out_doctor_db.php" method="post" name="drop">
          <div class="warn">탈퇴를 위해서는 이메일 인증이 필요합니다.</div>
  
          <div class="mail">이메일</div>     
          <input type="email" name="doc_email" id="doc_email" maxlength="30" placeholder="ex) aaa@email.com" style="width:700px; height:60px; position:absolute; left:250px; top:660px;">
          
		  <div emailc="email">이메일을 입력하세요.</div>              
          <input type="button" name="" value="인증하기" onclick="mail()" style="width:130px; height:45px; position:absolute; left:250px; top:730px; cursor:pointer">

		  <div class="confirm">인증키</div>
          <input type="text" name="drop_key" id="drop_key" required style="width:700px; height:60px; position:absolute; left:250px; top:855px;">
       
          <div class="my_pw">비밀번호</div>
		  <input type="password" name="doc_password" id="doc_password" maxlength="13" style="width:700px; height:60px; position:absolute; left:250px; top:1005px;">
        
          <input type="image" src="out.jpg" onclick="return blank_check()" style="width:130px; height:50px; position:absolute; left:700px; top:1105px;">
          <a href="home.php"><img src="main.jpg" style="width:130px; height:50px; position:absolute; left:850px; top:1105px;"></a> 
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

