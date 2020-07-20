<?php
 session_start(); 
 $db_table="qna";

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
  $doc_id = $_SESSION["doc_id"];
  $sql1 ="select doc_name from doctor where doc_id = '$doc_id'";
  $result1=mysqli_query($conn,$sql1);
  // $count1=mysqli_num_rows($result1);
  $row1=mysqli_fetch_array($result1);

  $item_name = $row1[0];
  

  if(isset($_REQUEST["page"]))  // 페이지 번호
   $page=$_REQUEST["page"];
  else
   $page=1;
  if(isset($_REQUEST["mode"]))  // 새로 쓰기, 수정, 답변 구분 
   $mode=$_REQUEST["mode"];
  else
   $mode="";
  
  if(isset($_REQUEST["num"]))  
   $num=$_REQUEST["num"];
  else
   $num="";
          
  //if ($mode=="modify" || $mode=="response"){
   require_once("./lib/MYDB.php");
   $pdo = db_connect();
      
    try{
      $sql = "select * from hospital.qna where num = ? ";
      $stmh = $pdo->prepare($sql); 
      $stmh->bindValue(1,$num,PDO::PARAM_STR); 
      $stmh->execute();
      $count = $stmh->rowCount();              
    if($count<1){  
     }else{
        $row = $stmh->fetch(PDO::FETCH_ASSOC);
        $item_subject = $row["subject"];
        $item_content = $row["content"];
      }
     
     if ($mode=="response")
     {
	$item_subject = "[re]".$item_subject;
	$item_content = ">".$item_content;
	$item_content = str_replace("\n", "\n>", $item_content);
	$item_content = "\n\n".$item_content;
     }
    }catch (PDOException $Exception) {
       print "오류: ".$Exception->getMessage();
    }
  //}
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>이지수 병원(건강정보 글작성)</title>
    <link rel="stylesheet" type="text/css" href="health_write.css">
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

   <?php
    if($mode=="modify") {
   ?>
    <form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>"> 
   <?php
    } else if ($mode=="response") {
   ?>
    <form  name="board_form" method="post" action="insert.php?mode=response&num=<?=$num?>&page=<?=$page?>"> 
   <?php
    } else {
   ?>
   <form action="insert.php" method="post" name="board_form"> 
   <?php
    } 
   ?>
    <div id="title">          
     <img src="title_hinfo.png" align="center" width="180" height="70" alt="건강정보"> 
    </div>
   <div class="contents">
     <table width=1120 border=0 cellpadding=3 cellspacing=2 bgcolor=darkgreen align=center>
				<tr>
					<td height=20 align=center bgcolor=#1AAB8A>
					<font color=white size=5px><b>건강정보 글 작성</b></font>
					</td>
				</tr>
				<tr>
					<td bgcolor=white>&nbsp;
						<table>
						    <tr>
								<td width=60 align=center ><b>이름</b></td>
								<td align=ce >
									<input type='text' name='name' size=100 maxlength=40>
								</td>
							</tr>
							<tr>
								<td width=60 align=center ><b>제목</b></td>
								<td align=ce >
									<input type='text' name='subject' size=100 maxlength=40>
								</td>
							</tr>
							<tr>
								<td width=60 align=center ><b>내용</b></td>
								<td align=left >
									<textarea name='content' cols=130 rows=30 ></textarea>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table> 
						<a href="healthinfo_list.php" class='btnList btn'><button>취소</button></a>&nbsp;&nbsp;
						<button type='submit' class="btnSubmit btn">등록</button>		
		</div>	
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
