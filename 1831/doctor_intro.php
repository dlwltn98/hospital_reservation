<? 
 session_start();
 $db_table="hinfo";
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>이지수 병원(의료진 소개)</title>
   <link rel="stylesheet" type="text/css" href="doctor_intro.css">
</head>
<?
 $host = 'localhost';                                               
 $username = 'root';
 $userpass = 'yull0131';
 $dbname = 'hospital';
 
 $conn = mysqli_connect($host,$username,$userpass,$dbname);           //db연동
 mysqli_set_charset($conn, 'utf8');

 if(mysqli_connect_errno($conn)){
     echo "DB 연결 실패".mysqli_connect_error();
 }else{
 
 }
?>

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

<img src="doctor_intro.jpg" alt="의료진소개" style="width:280px; height:200px; position:absolute; left:120px; top:380px">
  <form name="medic_part" method="post">
   <fieldset style="width:850px; height:300px; border:5px solid green; position:absolute; left:135px; top:600px">
     <div class="box"></div>
     <div class="medic_ch">진료과 선택 : </div>
     <div class="box1">
        <select title="진료과 선택" name="medic" size="1" id="medic" onChange="redirect(this.options.selectedIndex)" 
		style="width:500px; height:60px; font-size:30px;">     
        <option>가정의학과</option>
	    <option>류마티스내과</option>
	    <option>성형외과</option>
        <option>소화기내과</option>
        <option>신경외과</option>
	    <option>이비인후과</option>
	    <option>정신건강의학과</option>
	    <option>치과</option>
	    <option>흉부외과</option>
        </select>
    </div>
	<div class="doctor_ch">의료진 선택 : </div>
	<div class="box2">
		<select name="stage" size="1" style="width:500px; height:60px; font-size:30px;">		
		<option value="intro_doctor00.php">김민수 교수</option>
		<option value="intro_doctor01.php">이은지 교수</option>
		<option value="intro_doctor02.php">장유빈 교수</option>
		</select>
    </div>
  </fieldset>
		<div style="position:absolute; left:800px; top:980px;"><img src="submit.jpg" name="test" onClick="go()" style="width:180px; height:70px;"></div>
	

	<script>
//<!--

var groups=document.medic_part.medic.options.length
var group=new Array(groups)
for (i=0; i<groups; i++)
group[i]=new Array()

group[0][0]=new Option("김민수 교수","intro_doctor00.php") // 첫번째 주항목의 첫번째 부항목
group[0][1]=new Option("이은지 교수","intro_doctor01.php") // 첫번째 주항목의 두번째 부항목
group[0][2]=new Option("장유빈 교수","intro_doctor02.php") // 첫번째 주항목의 세번째 부항목


group[1][0]=new Option("김두상 교수","intro_doctor10.php") //두번째 주항목의 첫번째 부항목
group[1][1]=new Option("송필재 교수","intro_doctor11.php") //두번째 주항목의 두번째 부항목
group[1][2]=new Option("임경철 교수","intro_doctor12.php") //두번째 주항목의 세번째 부항목

group[2][0]=new Option("서장원 교수","intro_doctor20.php") //세번째 주항목의 첫번째 부항목
group[2][1]=new Option("염세훈 교수","intro_doctor21.php") //세번째 주항목의 두번째 부항목
group[2][2]=new Option("정우식 교수","intro_doctor22.php") //세번째 주항목의 세번째 부항목

group[3][0]=new Option("김성현 교수","intro_doctor30.php")
group[3][1]=new Option("박은총 교수","intro_doctor31.php") 
group[3][2]=new Option("이예곤 교수","intro_doctor32.php") 

group[4][0]=new Option("김지우 교수","intro_doctor40.php") 
group[4][1]=new Option("이기배 교수","intro_doctor41.php") 
group[4][2]=new Option("하욱희 교수","intro_doctor42.php") 

group[5][0]=new Option("김현섭 교수","intro_doctor50.php") 
group[5][1]=new Option("원석빈 교수","intro_doctor51.php")
group[5][2]=new Option("임현정 교수","intro_doctor52.php") 

group[6][0]=new Option("김명호 교수","intro_doctor60.php") 
group[6][1]=new Option("장준용 교수","intro_doctor61.php") 
group[6][2]=new Option("조희성 교수","intro_doctor62.php") 

group[7][0]=new Option("박지연 교수","intro_doctor70.php") 
group[7][1]=new Option("임두혁 교수","intro_doctor71.php") 
group[7][2]=new Option("정관일 교수","intro_doctor72.php") 

group[8][0]=new Option("서동린 교수","intro_doctor80.php") 
group[8][1]=new Option("최영철 교수","intro_doctor81.php") 

var temp=document.medic_part.stage

function redirect(x){
for (m=temp.options.length-1;m>0;m--)
temp.options[m]=null
for (i=0;i<group[x].length;i++){
temp.options[i]=new Option(group[x][i].text,group[x][i].value)
}
temp.options[0].selected=true
}

function go(){
window.open(this.temp.options[temp.selectedIndex].value,'', "width=1100, height=1000, scrollbars=yes");
}
//-->
</script>
   
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