    <div id="logo"><a href="./index.php"><img src="./img/logo.gif" border="0"></a></div>
	<div id="moto"><img src="./img/moto.gif"></div>
	<div id="top_login">
<?php
    if(!isset($_SESSION["user_id"]))
	{
?>
          <a href="./login.php">로그인</a> | <a href="./signup.php">회원가입</a>
<?php
	}
	else
	{
?>
		<?=$_SESSION["user_id"]?> | 
		<a href="./logout.php">로그아웃</a> | <a href="./member/updateForm.php?id=<?=$_SESSION["user_id"]?>">정보수정</a>
<?php
	}
?>
	 </div>
