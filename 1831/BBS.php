<?
	session_start();
	$db_table = "bbs";

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
	#list설정

	if(isset($_REQUEST["page"]) && $_REQUEST["page"] >=1) // $_REQUEST["page"]값이 없을 때에는 1로 지정 
    $page=$_REQUEST["page"];  // 페이지 번호
  else
    $page=1;

	#페이지에 보여질 게시물의 수
	$page_size=20;

	#페이지 나누기에 표시될 페이지 수
	$page_list_size=10;

	$no = ($page-1) * $page_size;  // 리스트에 표시되는 게시글의 첫 순번.
	
	if (!$no || $no < 0 ) $no=0;

	//DB의 첫번째 글부터
	//$page_size만큼의 글을 가져온다.
	$query = "SELECT * FROM bbs ORDER BY bbs_id DESC LIMIT $no,$page_size";

	$result = mysqli_query($conn, $query);
	$row=mysqli_fetch_array($result);
	$bno = $row['bbs_no'];

	

	// 총 게시물 수를 구한다.
	$result_count=mysqli_query($conn, "SELECT count(*) FROM bbs");
	$result_row=mysqli_fetch_row($result_count);
	$total_row = $result_row[0];
	//결과의 첫 번째 열이 count(*)의 결과

	# 총 페이지 계산
	if ($total_row <= 0) $total_row = 0;
	$total_page = ceil($total_row / $page_size);

	# 현재 페이지 계산
	$current_page = ceil(($no+1)/$page_size);

?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>이지수 병원(자유게시판)</title>
   <link rel="stylesheet" type="text/css" href="BBSCSS.css">
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
            
			<!--병원 소개정보-->
			<div class="articles">
			    <img src="free_board.jpg" width="250" height="80">
				<br/>
				<table width=1120 border=0 cellpadding=2 cellspacing=1 bgcolor=#1AAB8A>
						<!--리스트 타이틀-->
						<thead>
						<tr height="40" bgcolor=#1AAB8A>
							<td width=30 align=center style="border-right:1px solid white">
								<font color=white>번호</font>
							</td>
							<td width=320 align=center style="border-right:1px solid white">
								<font color=white>제 목</font>
							</td>
							<td width=50 align=center style="border-right:1px solid white">
								<font color=white>글쓴이</font>
							</td>
							<td width=90 align=center style="border-right:1px solid white">
								<font color=white>날 짜</font>
							</td>
							<td width=40 align=center>
								<font color=white>조회수</font>
							</td>
						</tr>
						<!--리스트 타이틀 끝-->
						</thead>
						<!--리스트 내용-->
						<?
						for($bno = 1; $bno <= $total_row; $bno++)
						{
							$sqli = "SELECT * FROM bbs WHERE bbs_no = '$bno'";
	                        $result = mysqli_query($conn, $sqli) or die(mysqli_error($conn));
	                        $row1=mysqli_fetch_array($result);
	                        $bid = $row1['bbs_id'];
	                        $btitle = $row1['bbs_title'];
	                        $bname = $row1['bbs_name'];
	                        $bwdate = $row1['bbs_wdate'];
	                        $bview = $row1['bbs_view'];
						?>
						<!--행 시작-->
						<tbody>
						<tr>
							<!--번호-->
							<td height=30 bgcolor=white align=center>
								<a href="BBSread.php?bbs_id=<?echo $bid;?>&no=<?echo $bno;?>&bsub=<?echo $btitle;?>"> <?=$bno?></a>
							</td>
							<!--제목-->
							<td height=30 bgcolor=white align=center>
								<a href="BBSread.php?bbs_id=<?echo $bid;?>&no=<?echo $bno;?>&bsub=<?echo $btitle;?>"> <?=$btitle?></a>
							</td>
							<!--글쓴이-->
							<td height=30 bgcolor=white align=center>
								<font color=black><?=$bid?></font>
							</td>
							<!--날짜-->
							<td height=30 bgcolor=white align=center>
								<font color=black><?=$bwdate?></font>
							</td>
							<!--조회수-->
							<td height=30 bgcolor=white align=center>
								<font color=black><?=$bview?></font>
							</td>
						</tr>
						</tbody>
						<!--행 끝-->
						<?
						} //end while
						//데이터베이스와 Disconnect
						mysqli_close($conn);
						?>
						</table>
                        
						<div style="position:absolute; left:700px; top:700px;">
					<!--페이지 표시 테이블-->
						<table border=0>
							<tr>
								<td width=600 height=20 align=center rowspan=4>
								<font color=gray>
								&nbsp;
							<?
							$start_page = floor(($current_page - 1) / $page_list_size)
									* $page_list_size + 1;

									# 페이지 리스트의 마지막 페이지가 몇 번째 페이지인지 구함
									$end_page = $start_page + $page_list_size - 1;

									if ($total_page < $end_page) $end_page = $total_page;
									if ($start_page >= $page_list_size) {
										# 이전 페이지 리스트값은 첫 번째 페이지에서 한 페이지 감소하면 됨.
										# $page_size를 곱해주는 이유는 글 번호로 표시하기 위함.
										
										
										$prev_list = ($start_page - 2)*$page_size;
										echo "<a href=\"BBS.php?no=$prev_list\">◀</a>\n";
									}
							
							#페이지 리스트 출력
							for ($i=$start_page;$i <= $end_page;$i++) {
								$page= ($i-1) * $page_size; // 페이지값을 no 값으로 변경
								if ($no!=$page) {
									echo "<a href=\"BBS.php?no=$page\">";
								}
								
								echo " $i "; //페이지 표사
								
								if ($no!=$page) {
									echo "</a>";
								}
							}
							
							#더 보여줄 페이지가 있을때 다음버튼 출력
							if($total_page > $end_page)
							{
								$next_list = $end_page * $page_size;
								echo "<a href=BBS.php?no=$next_list>▶</a><p>";
							}
							?>
								</font>
								</td>
							</tr>
						</table> -->
						<a href="BBS.php"><button>목록보기</button></a>
						<?php
							if(isset($_SESSION["user_id"]) || isset($_SESSION["doc_id"])){
						?>
							<a href="BBSwrite.php"><button>글쓰기</button></a>
						<?php
							}
						?>
						</div>						
			</div>

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