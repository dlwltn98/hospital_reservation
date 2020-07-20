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
$db_table = "resv_test";

$arr = array("9:00", "9:30", "10:00", "10:30", "11:00", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30");

for($i=9 ; $i <=12 ; $i++)  {
	for($j=1; $j <=31; $j++) {
		for($x = 0 ; $x < 11; $x++) {
			$d_t = "2018"."."."$i"."."."$j"."-"."$arr[$x]";
			$sql = "INSERT INTO $db_table(resv_before)"."values('$d_t')";
			$result = mysqli_query($conn,$sql);
		}
	}
}

mysqli_close($conn);
?>
