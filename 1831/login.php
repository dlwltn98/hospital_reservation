<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "yull0131";
$mysql_database = "hospital";

$db = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("db connect error");

mysqli_set_charset($db, 'utf8');

$db_select = mysqli_select_db($db, $mysql_database) or 
    die("Database selection failed: " . mysqli_error());

 //DB연결을 위한 config.php를 로딩합니다.
    session_start();   //세션의 시작

    if($_SERVER["REQUEST_METHOD"] == "POST"){

    $myid=($_POST['id']); 
    $mypassword=addslashes($_POST['password']); 

	$str1 = "doc";
	$str2 = strrev($myid);
	echo $str2,'/';
	$str2 = substr($str2,-3,3);
	echo $str2,'/';
	$str2 = strrev($str2);
	echo $str2,'/';
	$result1 = strcmp($str1,$str2);

	 if($result1 == 0){
		 $sql=("SELECT doc_name FROM doctor WHERE doc_id='$myid' and doc_password='$mypassword'");
		 $result=mysqli_query($db,$sql);
		 $count=mysqli_num_rows($result);
		 //$prevPage = $_SERVER['HTTP_REFERER'];
		 $return_url = urlencode($_SERVER['REQUEST_URI']); 
		 // If result matched $myusername and $mypassword, table row must be 1 row
		 if($count==1) {  //count가 1이라는 것은 아이디와 패스워드가 일치하는 db가 하나 있음을 의미합니다.
			 $_SESSION['doc_id']=$myid;
			 header("location:doc_home.php");
		 }
		 else {
			 $error="Your Login Name or Password is invalid";
			 echo $error;
		 }
	 }
	 else{

	  $sql=("SELECT user_name FROM user WHERE user_id='$myid' and user_password='$mypassword'");
    $result=mysqli_query($db,$sql);
    
    $count=mysqli_num_rows($result);

	//$prevPage = $_SERVER['HTTP_REFERER'];
	$return_url = urlencode($_SERVER['REQUEST_URI']); 
 
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1)  //count가 1이라는 것은 아이디와 패스워드가 일치하는 db가 하나 있음을 의미합니다. 
    {
        $_SESSION['user_id']=$myid;
        header("location:home.php");
    }

    else 
    {
        $error="Your Login Name or Password is invalid";
		 echo $error;
    }
	 }

    }
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8"> <!--utf-8설정-->
<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="homeframe.css">
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
	      <a href="login.php" class="head-link" style="color:gray">로그인 </a>
		  <a href="signup.php" class="head-link" style="color:gray"> 회원가입</a>  
	   </ul>

	   <img src="dong.jpg" width="1150px" height="220px">
      </div> 

       <div id="nav-box">
           <ul>
               <li><a href="hospital_intro.php">병원소개</a></li>
               <li><a href="">의료진소개</a></li>
               <li><a href="QnAList.php">병원문의</a></li>
               <li><a href="healthinfo_list.php">건강정보</a></li>
               <li><a href="">자유게시판</a></li>
           </ul>
        </div>

<div style="position:absolute; left:320px; top:490px; font-size:35px;">아이디와 비밀번호를 입력해주세요

<form action="" method="post">
<div style="position:absolute; left:0px; top:90px; font-size:30px; font-weight:bold;">아 &nbsp이 &nbsp디 :</div>
<input type="text" name="id" class="box" style="position:absolute; left:145px; top:95px; width:400px; height:50px;"><br>

<div style="position:absolute; left:0px; top:170px; font-size:30px; font-weight:bold;">비밀번호 :</div>
<input type="password" name="password" class="box" style="position:absolute; left:145px; top:175px; width:400px; height:50px;"><br>

<input type="image" src="login.jpg" style="width:550px; height:70px; position:absolute; left:0px; top:255px;">

<div style="position:absolute; left:10px; top:400px; font-size:20px;">회원서비스를 이용하시려면 로그인이 필요합니다.</div>
<input type=button value="ID찾기" onclick="location.href='findID.php'" style="position:absolute; left:460px; top:400px;">
<input type=button value="PW찾기" onclick="location.href='findPW.php'" style="position:absolute; left:530px; top:400px;"><br>

<div style="position:absolute; left:80px; top:450px; font-size:20px;">아직 이지수 병원 회원이 아니신가요?</div>
<input type="button" value="회원가입"  onClick = "location.href ='signup.php'" style="position:absolute; left:430px; top:450px;">
</form></div>
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