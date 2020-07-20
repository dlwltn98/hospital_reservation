<? 
 session_start();
 $db_table="qna";
 
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

?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>이지수 병원(건강정보)</title>
   <link rel="stylesheet" type="text/css" href="health.css">
</head>
<?php
  require_once("./lib/MYDB.php");
  $pdo = db_connect();
  
  if(isset($_REQUEST["page"]) && $_REQUEST["page"] >=1) // $_REQUEST["page"]값이 없을 때에는 1로 지정 
    $page=$_REQUEST["page"];  // 페이지 번호
  else
    $page=1;

  $scale = 20;       // 한 페이지에 보여질 게시글 수
  $page_scale = 10;  // 한 페이지당 표시될 페이지 수
  $first_num = ($page-1) * $scale; // 리스트에 표시되는 게시글의 첫 순번.

  if (!$first_num || $first_num < 0 ) $first_num=0;
 
  if(isset($_REQUEST["mode"]))
    $mode=$_REQUEST["mode"];
  else  
    $mode="";
  
  if(isset($_REQUEST["search"]))
    $search=$_REQUEST["search"];
  else 
    $search="";
 
  if(isset($_REQUEST["find"]))
    $find=$_REQUEST["find"];
  else 
    $find="";
 
  if($mode=="search"){
	if(!$search){
   ?>
   <script>
     alert('검색할 단어를 입력해 주세요!');
   </script>
 <?php
     }
   $sql="select * from hospital.qna where $find like '%$search%' order by num desc";
  } 
  else {
   $sql="select * from hospital.qna order by group_num desc limit  $scale";  //$first_num,
   //limit를 사용해 레코드 개수를 한 페이지당 출력하는 수로 제한
  }
  //$stmh = $pdo->query($sql); 
  $stmh = mysqli_query($conn, $sql);
  $row=mysqli_fetch_array($stmh);
  $item_num = $row['num'];
      
  $sql = "select * from hospital.qna";  //전체 레코드수를 파악하기 위함.
  $stmh1 = $pdo->query($sql);
  
  $total_row = $stmh1->rowCount();     //전체 글수
  $total_page = ceil($total_row / $scale); // 전체 페이지 블록 수
  $current_page = ceil($page/$page_scale); //현재 페이지 블록 위치계산
   
 ?>
<body>
 <div class="frame">
      <div class="header-box">
	   <a href="home.php" class="header-link">
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

     <div id="title">                                   
       <img src="title_hinfo.png" align="center" width="180" height="70" alt="건강정보"> 
     </div>

     <form name="board_form" method="post" action="healthinfo_list.php?mode=search">
       <div id="list_search">
         <div id="list_search1">▷ 총 <?=$total_row ?> 개의 게시물이 있습니다.</div>
         <div id="list_search2">
           <select name="find"> 
             <option value='subject'>제목</option>
             <option value='content'>내용</option>
             <option value='name'>이름</option>
           </select>
         </div>
         <div id="list_search3"><input type="text" name="search">
		 </div>
         <div id="list_search4"><input type="image" src="list_search_button.png" onclick="check_input()" width="60" height="25" alt="검색">
		 </div>
       </div>
     </form>

     <div id="articles">
       <table width=1120 border=0 cellpadding=2 cellspacing=1 bgcolor=#1AAB8A>
	     <!--리스트 타이틀-->
			<thead>
			  <tr height bgcolor=#1AAB8A>
			    <td width=30 align=center>
				  <font color=white>번호</font>
				</td>
				<td width=370 align=center>
				  <font color=white>제 목</font>
				</td>
				<td width=50 align=center>
				  <font color=white>글쓴이</font>
				</td>
				<td width=60 align=center>
				  <font color=white>날 짜</font>
				</td>
				<td width=40 align=center>
				  <font color=white>조회수</font>
				</td>
			  </tr>
			<!--리스트 타이틀 끝-->
	        </thead>
            <?php  // 글 목록 출력
              if ($page==1)  
                $start_num=$total_row;    // 페이지당 표시되는 첫번째 글순번
              else 
                $start_num=$total_row-($page-1) * $scale;

		        for($item_num = 1; $item_num <= $total_row; $item_num++){
				   $sqli = "SELECT * FROM qna WHERE num = '$item_num'";
				   $result = mysqli_query($conn, $sqli) or die(mysqli_error($conn));
				   $row1=mysqli_fetch_array($result);

				   $item_id = $row1['id'];
				   $item_subject = $row1['subject'];
				   $item_name = $row1['name'];
				   $item_date = $row1['regist_day'];
				   $item_date=substr($item_date, 0, 10);
				   $item_hit = $row1['hit'];
            ?>
            <tbody>
	          <tr>
	           <!--번호-->
		       <td height=20 bgcolor=white align=center>
			     <a href="healthinfo_view.php?id=<?echo $item_id;?>&no=<?echo $item_num;?>"><?=$item_num?></a>
		       </td>
		       <!--제목-->
		       <td height=20 bgcolor=white align=center>
			     <a href="healthinfo_view.php?id=<?echo $item_id;?>&no=<?echo $item_num;?>"><?=$item_subject?></a>
		       </td>
		       <!--글쓴이-->
		       <td height=20 bgcolor=white align=center>
			     <font color=black><?=$item_name?></font>
		       </td>
		       <!--날짜-->
		       <td height=20 bgcolor=white align=center>
			     <font color=black><?=$item_date?></font>
		       </td>
		       <!--조회수-->
		       <td height=20 bgcolor=white align=center>
			     <font color=black><?=$item_hit?></font>
		       </td>
	         </tr>
           </tbody>
		 
	       <!--행 끝-->
	       <?
	         } //end while
	         //데이터베이스와 Disconnect
		     mysqli_close($conn);
	       ?>
           <br></div>
     <?  
       // 페이지 구분 블럭의 첫 페이지 수 계산 ($start_page)
       $start_page = ($current_page - 1) * $page_scale + 1;
       // 페이지 구분 블럭의 마지막 페이지 수 계산 ($end_page)
       $end_page = $start_page + $page_scale - 1;
     ?>
       <div id="page_button">
         <div id="page_num">
           <?
             if($page!=1 && $page>$page_scale)
             {
               $prev_page = $page - $page_scale;    
               // 이전 페이지값은 해당 페이지 수에서 리스트에 표시될 페이지수 만큼 감소
               if($prev_page < 0) 
                 $prev_page = 1;  // 만약 감소한 값이 0보다 작거나 같으면 1로 고정
               print "<a href=healtinfo_list.php?page=$prev_page>◀ </a>";
             }
 
             for($i=$start_page; $i<=$end_page && $i<= $total_page; $i++) 
             {        // [1][2][3] 페이지 번호 목록 출력
               if($page==$i) // 현재 위치한 페이지는 링크 출력을 하지 않도록 설정.
                 print "<font color=red><b>[$i]</b></font>"; 
               else 
                 print "<a href=healtinfo_list.php?page=$i>[$i]</a>";
             }

             if($page<$total_page)
             {
	           $next_page = 0;
               $next_page = $page+$page_scale;
               if($next_page > $total_page) 
                 $next_page = $total_page;
                 // netx_page 값이 전체 페이지수 보다 크면 맨 뒤 페이지로 이동시킴
               print "<a href=healtinfo_list.php?page=$next_page> ▶</a><p>";
             }
           ?>			
         </div>
         <div id="button1">
           <a href="healthinfo_list.php?table=<?=$db_table?>&page=<?=$page?>">
           <img src="list.png" width="110" height="50"></a>&nbsp;
         </div>
         <div id="button2">
           <?php
             if(isset($_SESSION["doc_id"])){
           ?>
             <a href="healthinfo_write.php?table=<?$db_table?>">
             <img src="write.png" width="110" height="50"></a>
           <?php
             }
           ?>
		 </div>
       </div>  <!-- end of page_button -->
     </div>  <!-- end of list content -->
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