<?
$mysql_hostname = "localhost";

$mysql_user = "root";

$mysql_password = "yull0131";

$mysql_database = "hospital";

 

$connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("db connect error");

mysqli_set_charset($connect, 'utf8');
?>