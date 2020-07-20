<?php
session_start();

$host = "localhost";
$username = "root";
$userpass = "yull0131";
$dbname = "hospital";
 
$conn = mysqli_connect($host,$username,$userpass,$dbname);

mysqli_set_charset($conn, 'utf8');

if(mysqli_connect_errno($conn)){
    echo "DB 연결 실패".mysqli_connect_error();
}else{
 
}
$db_table = "user";
$u_id = $_SESSION['user_id'];

$sql = ("SELECT user_name,year,month,days,user_gender,user_phonenum,zonecode,address,address_etc, user_email FROM user WHERE user_id = '$u_id'"); 

  $result = mysqli_query($conn,$sql);

  $row = mysqli_num_rows($result);

  if($row) {
  $a = mysqli_fetch_array($result);
  $n_name = stripslashes($a["user_name"]);
  $n_year = stripslashes($a["year"]);
  $n_month = stripslashes($a["month"]);
  $n_dyas = stripslashes($a["days"]);
  $n_gender = stripslashes($a["user_gender"]);
  $n_phone = stripslashes($a["user_phonenum"]);
  $n_homecode = stripslashes($a["zonecode"]); 
  $homecode1 = substr($n_homecode,0,5);
  $n_add = stripslashes($a["address"]);
  $n_add_etc = stripslashes($a["address_etc"]);
  $email = stripslashes($a["user_email"]);
  
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>이지수 병원(개인정보 수정)</title>
   <link rel="stylesheet" type="text/css" href="m_page.css">
</head>
<script type="text/JavaScript" src="http://code.jquery.com/jquery-1.7.min.js"></script>

  <script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>

  <script type="text/javascript">

    function openDaumZipAddress() {

      new daum.Postcode({

        oncomplete:function(data) {

          jQuery("#zonecode").val(data.zonecode);

          jQuery("#address").val(data.address);

          jQuery("#address_etc").focus();

          console.log(data);

        }

      }).open();

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
	      if($_SESSION['user_id'] != null){
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
     

     <div id="modify">개인 정보 수정</div>
  <form action="modify_user_db.php" method="post" name="modify_userinput"> 
    <div id="chart">
    <table>
    <tr>
        <th>이름</th>
        <td><input type="text" name="user_name" id="user_name" maxlength="20" value="<?=$n_name?>" style="width:400px; height:45px;"></td>
    </tr>
    <tr>
        <th>생년월일</th>
        <td><input type="text" name="year" id="year" value="<?= $n_year ?>" style="width:100px; height:45px;"> 년
          <input type="text" name="month" id="month" value="<?= $n_month?>" style="width:100px; height:45px;"> 월
          <input type="text" name="days" id="days" value="<?= $n_dyas?>" style="width:100px; height:45px;"> 일</td>    
    </tr>
    <tr>
        <th>성별</th>
        <td>
		  <input type="radio" name="user_gender" id="user_gender" value="남" <?if($n_gender == "남") {?> checked <?}?>> 남자&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          <input type="radio" name="user_gender" id="user_gender" value="여" <? if($n_gender == "여") {?> checked <?}?>>여자  
        </td>
    </tr>
    <tr>
        <th>전화번호</th>
        <td><input type="tel" name="user_phonenum" id="user_phonenum" maxlength="11" value="<?= $n_phone ?>" style="width:400px; height:45px;"></td>
    </tr>
    <tr>
        <th>주소</th> 
        <td>
        <input type="text" name="zonecode" id="zonecode" value="<?= $homecode1 ?>" style="width:100px; height:25px; position:absolute; left:190px; top:460px;"><div style="position:absolute; left:295px; top:460px;">우편번호</div>
        <input type="button" onClick="openDaumZipAddress();" value = "주소 찾기" style="position:absolute; left:370px; top:460px;"><br>
        <input type="text" name="address" id="address" value="<?= $n_add ?>" readonly style="width:400px; height:25px; position:absolute; left:190px; top:485px;"><br>
        <input type="text" name="address_etc" id="address_etc" value="<?= $n_add_etc ?>"  style="width:200px;" style="width300px; height:25px; position:absolute; left:190px; top:510px;"> 
		<div style="position:absolute; left:400px; top:510px;">상세주소를 입력해주세요.</div>
    </tr>
    <tr>
        <th>이메일</th>
        <td> <?=$email?> </td>
    </tr>    
    </table></div>
	    <input type="submit" value="수정하기" style="width:100px; height:45px; position:absolute; left:810px; bottom:130px; cursor:pointer;">
        <input type="reset" value="되돌리기" style="width:100px; height:45px; position:absolute; left:920px; bottom:130px; cursor:pointer;">
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