<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>예약 - 시간 선택</title>
</head>
<body>
     
	  <div>
	   <img src="jisoo.png" width="420px" height="200px" style="position:absolute; top:0px;">
	   <img src="dong.jpg" width="1085px" height="220px">
	  </div>
	<div style="position:right; font-size:20px;"> <a href="home.php">Home</a> &gt; 진료예약 &gt; 의료진 선택 &gt; 예약 날짜 선택 &gt; <b>예약 시간 선택</b></div>
		<fieldset style="width:900px; height:690px; position:absolute; left:80px; top:280px; border:2px solid gray;">
<?php
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

$db_table = "reservation";
$day = $_POST['datepicker'];
$prof = $_POST['prof'];
$major = $_POST['major'];

	$time = array("10:00", "10:30", "11:00", "11:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00");

for ($i = 0; $i < sizeof($time); $i++) {
		
		$sql = "SELECT resv_no
				from $db_table
				where resv_date = '$day' and
					resv_time = '$time[$i]' and
					doc_no = (select doc_no from doctor where doc_name= '$prof')";

		$result = mysqli_query($conn,$sql);
		$row = mysqli_num_rows($result);

		if ($row == null) $reserv = "(예약가능)";
		else $reserv = "(예약완료)";	
		

if($row == null) {
			 ?>
			 <form name="db_insert_value" method="POST" action="resv_db_insert.php">
			 <div style="font-size:25px;"><input type = "radio" name="select_time" value= "<?=$time[$i]?>">&nbsp&nbsp<?=$time[$i].$reserv ?></div><br/><br/>
			 <?
			}
			else {
				echo "<font color=#D8D8D8>";
				echo $time[$i].$reserv."<br/>";
				echo "</font>";
			}
			
	}

mysqli_close($conn);	
?>
<input type="hidden" name="prof" value="<?=$prof ?>">
<input type="hidden" name="major" value="<?=$major?>">
<input type="hidden" name="select_day" value="<?=$day?>">
<input type="image" src="pick.jpg" style="width:140px; height:50px; position:absolute; top:630px; left:740px;">
</form>
</fieldset>
</body>
</html>

