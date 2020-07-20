<?php
$kkkey = $_POST['email_veri'];

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
$id = $_POST['doc_id'];
$pw = $_POST['doc_password'];
$name = $_POST['doc_name'];
$major = $_POST['major'];
$major2 = "과";
$name2 = " 교수";
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['days'];
$phonenum = $_POST['doc_phone'];
$email = $_POST['doc_email'];
$birth = $year.$month.$day ;
 
    if(!$conn){
        echo 'not connet';
    }

    $sql = "INSERT INTO $db_table(doc_name,major,doc_email,doc_phone,doc_birth,doc_id,doc_password) ".
            "values('$name$name2','$major$major2','$email','$phonenum','$birth','$id','$pw')";
            
    $result1 = mysqli_query($conn,$sql) or die(mysqli_error($conn));
   

   //이메일 인증 
    $query = "SELECT * FROM doctor WHERE doc_email='".$email."' && doc_kkey='".$kkkey."'";
    $result2 = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if($result1 && $result2){
        echo "<script> alert('회원가입을 축하드립니다.'); window.location.href='login.php' </script>";
    }else{
        echo "<script> alert('사이트에 문제가 발생했습니다.');
		window.location.href='login.php'</script>";
    }

mysqli_close($conn);

?>