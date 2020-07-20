<?php
  $prof=$_GET['professor'];
  $d_major=$_GET['major'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>예약 - 날짜 선택</title>
	<link rel="stylesheet" type="text/css" href="doctor.css">
   	<link rel="stylesheet" type="text/css" href="reservation_c.css">
   	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  	<link rel="stylesheet" href="/resources/demos/style.css">
  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      dateFormat: 'yy.mm.dd',
      prevText: '이전 달',
      nextText: '다음 달',
      monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
      monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
      dayNames: ['일','월','화','수','목','금','토'],
      dayNamesShort: ['일','월','화','수','목','금','토'],
      dayNamesMin: ['일','월','화','수','목','금','토'],
      showMonthAfterYear: true,
      yearSuffix: '년',
      minDate: 0,
      showButtonPanel: true
    });
  } );
</script>
<body>
    
	  <div>
	   <img src="jisoo.png" width="420px" height="200px" style="position:absolute; top:0px;">
	   <img src="dong.jpg" width="1085px" height="220px">
	  </div>

    <div style="position:absolute; left:50px; top:250px; font-size:20px;"> <a href="home.php">Home</a> &gt; 진료예약 &gt; 의료진 선택 &gt; <b>예약 날짜 선택</b></div>

	<form id=form name=freserve method="POST" action="resv_select_time.php">
		<div style="margin-left:27px; position:absolute; left:250px; top:450px;">
    	<table width="647" border="0" cellspacing="0" cellpadding="0">
      		<tr>
      			<td valign="top" bgcolor="#f7f7f7" style="padding:8px 0 0 13px; font-size:30px;">
      				<p>날짜: <input type="text" name ="datepicker" id="datepicker" style="width:250px; height:30px;">
      						 <input type="hidden" name="prof" value="<?=$prof?>">
                   <input type="hidden" name="major" value="<?=$d_major?>">
      				<input type="submit" value="확인" style="width:80px; height:40px;"></p>
      			</td>
      		</tr>       		
    	</table>
    	</div>
    </form> 
 
</body>
</html>
