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
$db_table = "user";
$id = $_POST['user_id'];
$pw = $_POST['user_password'];
$name = $_POST['user_name'];
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['days'];
$gender = $_POST['user_gender'];
$phonenum = $_POST['user_phonenum'];
$zonecode = $_POST['zonecode'];
$address = $_POST['address'];
$address_etc = $_POST['address_etc'];
$email = $_POST['user_email'];
 
    if(!$conn){
        echo 'not connet';
    }

    $sql = "INSERT INTO $db_table(user_id,user_password,user_name,year,month,days,user_gender,user_phonenum,zonecode,address,address_etc,user_email) ".
            "values('$id','$pw','$name','$year','$month','$day','$gender','$phonenum','$zonecode','$address','$address_etc','$email')";
            
    $result1 = mysqli_query($conn,$sql);
    
   //예외처리 or die(mysqli_error($conn));
   

   //이메일 인증 
    $query = "SELECT * FROM user WHERE user_email='".$email."' && kkey='".$kkkey."'";
    $result2 = mysqli_query($conn,$query);

    if($result1 && $result2){
        echo "<script> alert('회원가입을 축하드립니다.'); window.location.href='login.php' </script>";
    }else{
        echo "<script> alert('사이트에 문제가 발생했습니다.');
		window.location.href='login.php'</script>";
    }

mysqli_close($conn);


?>