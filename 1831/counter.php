<?
//session_start();

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
$sum=0;
$todayc = date("Y-m-d");
$s_id = session_id();  
$sql="select * from counter where date='$todayc'";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);

if($s_id !== session_id()) {
if(!$row){
	$sql="insert into counter(date, count) values('$todayc', 1)";
	mysqli_query($conn, $sql);
}else{
	$sql="update counter set count=count+1 where date='$todayc'";
	mysqli_query($conn, $sql);
}

$sql="select * from counter where date='$todayc'";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
$count=$row['count'];

$sql="select * from counter";
$resultt=mysqli_query($conn, $sql);
while($rowt=mysqli_fetch_array($resultt)){
	$sum+=$rowt['count'];
}
?>
오늘 방문 : <?=number_format($count)?><br>
전체 방문 : <?=number_format($sum)?>
<? }
else {
	$sql="select * from counter where date='$todayc'";
	$result=mysqli_query($conn, $sql);
	$row=mysqli_fetch_array($result);
	$count=$row['count'];

	$sql="select * from counter";
	$resultt=mysqli_query($conn, $sql);
	while($rowt=mysqli_fetch_array($resultt)){
		$sum+=$rowt['count'];
	}
	?>
	오늘 방문 : <?=number_format($count)?><br>
	전체 방문 : <?=number_format($sum)?>
	<?
}