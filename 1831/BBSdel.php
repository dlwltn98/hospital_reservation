<?php
    session_start();

	require_once("./dbconfig.php");

	$bno = $_GET['no'];
	$bid = $_GET['bbs_id'];
	$btitle = $_GET['bsub'];

	echo "<script> var message = confirm('삭제 하시겠습니까?');
	if(message == true){
		location.href='BBS_delete.php?bbs_id=<?echo $bid;?>&no=<?echo $bno;?>&bsub=<?echo $btitle;?>';
		}
	else{

	}</script>";

?>