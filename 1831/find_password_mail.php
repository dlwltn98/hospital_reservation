<?php

 	$host = 'localhost';
    $username = 'root';
    $userpass = 'yull0131';
    $dbname = 'hospital';
 
    $conn = mysqli_connect($host,$username,$userpass,$dbname);
 
    if(mysqli_connect_errno($conn)){
        echo "DB 연결 실패".mysqli_connect_error();
    }else{
 
    }
    $db_table = "user";
    $id=$_POST['user_id'];
    $email=$_POST['user_email'];

    $sql="SELECT user_password FROM user WHERE user_id='".$id."' AND user_email='".$email."'";

    $result1=mysqli_query($conn,$sql);

    $row=mysqli_fetch_array($result);

	if(!$result1 || mysqli_num_rows($result1) == 0){

  		echo "<script>alert('없는 PW입니다');history.back();</script>";

	}else{

    	echo "<script>alert('회원님의 비밀번호를 이메일로 보냈습니다.');history.back();</script>";
	}

	$query = "SELECT user_password FROM user WHERE user_id='".$id."'";
	$result2=mysqli_query($conn,$query);
	$roww=mysqli_fetch_array($result2);

    

include_once('phpmailer/PHPMailerAutoload.php');

function mailer($fname, $fmail, $to, $subject, $content, $type=0, $file="", $cc="", $bcc=""){
    if ($type != 1)
        $content = nl2br($content);

    $mail = new PHPMailer();
	
	$mail->IsSMTP(); 
	$mail->SMTPSecure = "ssl";
	$mail->SMTPAuth = true; 

	$mail->Host = "smtp.naver.com"; 
	$mail->Port = 465; 
	$mail->Username = "jisoo9898";
	$mail->Password = "LUoh05130!"; 

    $mail->CharSet = 'UTF-8';
    $mail->From = $fmail;
    $mail->FromName = $fname;
    $mail->Subject = $subject;
    $mail->AltBody = ""; 
    $mail->msgHTML($content);
    $mail->addAddress($to);
    if ($cc)
        $mail->addCC($cc);
    if ($bcc)
        $mail->addBCC($bcc);

    if ($file != "") {
        foreach ($file as $f) {
            $mail->addAttachment($f['path'], $f['name']);
        }
    }
    return $mail->send();
}

	$comment = "회원님의 비밀번호입니다.\n"."<b>비밀번호: <span style=\"color: red\">$roww[0]</span></b>\n\n"."로그인 창으로 돌아가 로그인을 해주세요.";
	
	mailer("이지수병원", "jisoo9898@naver.com", $email , "본인 인증 확인 ", $comment, 1); 

    

