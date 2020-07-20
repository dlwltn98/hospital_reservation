
<?php
session_start();
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

	$email = $_GET['doc_email'];
	$kkey = sha1(mt_rand(10000,99999).time().$email);
	//$_SESSION['drop_key'] = md5($kkey);
	$comment = "안녕하세요.<br/>"."이지수병원 입니다.<br/>"."아래 인증 코드를 복사하여 탈퇴 창 인증키란에 넣어주십시오.<br/><br/>"."<b>인증키 : <span style=\"color: red\">$kkey</span></b><br/><br/>"."인증키를 타이핑하기 힘들때는 마우스로 코드를 더블클릭 후 Ctrl-C 를 눌러서 복사한후,<br/>"."인증키란에서 Ctrl-V를 눌러서 붙여 넣기 하시면됩니다.";
	
	/*$comment ='http://localhost/activation.php?email='.$email.'&key='.$key.'';*/

	mailer("이지수병원", "jisoo9898@naver.com", $email , "본인 인증 확인 ", $comment, 1); 

    $host = 'localhost';
    $username = 'root';
    $userpass = 'yull0131';
    $dbname = 'hospital';
 
    $conn = mysqli_connect($host,$username,$userpass,$dbname);
 
    if(mysqli_connect_errno($conn)){
        echo "DB 연결 실패".mysqli_connect_error();
    }else{
 
    }
    $db_table = "doctor";
    $d_id = $_SESSION['doc_id'];
    $email = $_GET['doc_email'];

    if(!$conn){
        echo 'not connet';
    }
    $sql = ("UPDATE $db_table
             SET drop_key = '$kkey'
             WHERE doc_id = '$d_id'");

    if(mysqli_query($conn,$sql)){
        echo "<script> alert('메일을 보냈습니다.'); 
            window.close();
         </script>";
    }else{
        echo "<script> alert('사이트에 문제가 발생했습니다.');
            window.close();
        </script>";
    }
    mysqli_close($conn);
?>


