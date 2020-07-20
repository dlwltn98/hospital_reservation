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
$db_table = "doctor";
$d_id = $_SESSION["doc_id"];

$sql = ("SELECT doc_name,doc_email,doc_phone,doc_birth FROM $db_table WHERE doc_id = '$d_id'"); 

  $result = mysqli_query($conn,$sql);

  $row = mysqli_num_rows($result);

  if($row) {
  $a = mysqli_fetch_array($result);
  $d_name = stripslashes($a["doc_name"]);
  $d_birth = stripslashes($a["doc_birth"]);
  $year = substr($d_birth,0,4);
  $month = substr($d_birth,4,2);
  $day = substr($d_birth,6,2);
  $d_phone = stripslashes($a["doc_phone"]);
  $email = stripslashes($a["doc_email"]);
  
}
//echo $year."<br>";
//echo  $month."<br>";

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>개인정보 수정</title>
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
     

     <div id="modify">개인 정보 수정</div>
  <form action="modify_doctor_db.php" method="post" name="modify_docinput"> 
    <div id="chart">
    <table>
    <tr>
        <th>이름</th>
        <td><input type="text" name="doc_name" id="doc_name" maxlength="20" value="<?=$d_name?>" style="width:400px; height:45px;"></td>
    </tr>
    <tr>
        <th>생년월일</th>
        <td><input type="text" name="year" id="year" value="<?= $year ?>" style="width:100px; height:45px;"> 년
          <input type="text" name="month" id="month" value="<?= $month?>" style="width:100px; height:45px;"> 월
          <input type="text" name="days" id="days" value="<?= $day?>" style="width:100px; height:45px;"> 일</td>    
    </tr>
    <tr>
        <th>전화번호</th>
        <td><input type="tel" name="doc_phone" id="doc_phone" maxlength="11" value="<?= $d_phone ?>" style="width:400px; height:45px;"></td>
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