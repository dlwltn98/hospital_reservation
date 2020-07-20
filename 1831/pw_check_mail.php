<?php
include_once('phpmailer/PHPMailerAutoload.php');

// 네이버 메일 전송
// 메일 -> 환경설정 -> POP3/IMAP 설정 -> POP3/SMTP & IMAP/SMTP 중에 IMAP/SMTP 사용
// type : text=0, html=1, text+html=2

function mailer($fname, $fmail, $to, $subject, $content, $type=0, $file="", $cc="", $bcc=""){
    if ($type != 1)
        $content = nl2br($content);

    $mail = new PHPMailer(); // defaults to using php "mail()"
	
	$mail->IsSMTP(); 
//	$mail->SMTPDebug = 2; 
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
    $mail->AltBody = ""; // optional, comment out and test
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

    $host = 'localhost';
    $username = 'root';
    $userpass = 'yull0131';
    $dbname = 'hospital';
 
    $conn = mysqli_connect($host,$username,$userpass,$dbname);
    mysqli_set_charset($conn, 'utf8');

    if(mysqli_connect_errno($conn)){
        echo "DB 연결 실패".mysqli_connect_error();
    }

    $db_table = "user";

    $id=$_POST['user_id'];
    $email=$_POST['user_email'];

    $sql="select user_password from user where user_id='$id'";

    $result=mysqli_query($conn,$sql);

    $row=mysqli_fetch_array($result);

    mailer("이지수병원", "jisoo9898@naver.com", $email ,"본인 인증 확인 ","회원님의 비밀번호는".$row[0]."입니다." , 1); 

?>

