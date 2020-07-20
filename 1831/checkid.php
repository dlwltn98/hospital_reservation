<?php
$host = 'localhost';
$username = 'root';
$userpass = 'yull0131';
$dbname = 'hospital';
 
$conn = mysqli_connect($host,$username,$userpass,$dbname);

mysqli_set_charset($conn, 'utf8');

if(mysqli_connect_errno($conn)){
    echo "DB 연결 실패".mysqli_connect_error();
}else{
 
}
$db_table = "user";
 
$idch = $_GET['user_id'];
 
if(!$conn){
    echo "not connect DB";
}
 
$sql = "SELECT * FROM user WHERE user_id='".$idch."'";
$result = mysqli_query($conn,$sql);
 
if($idch == ''){
    ?>
<div>아이디를 입력하세요.</div>
<?php
}else{
    if(!(strlen($idch) == mb_strlen($idch))) {
    ?>
    <div style="color:red">
    <?=$idch?>와 같은아이디는 사용할 수 없습니다ㅏ. 아이디는 영어나 숫자만 사용 가능합니다.
    
    <form action="checkid.php" method="get">
        <div><input type="text" name="user_id" value="<?=$idch?>"></div>
        <div><input type="submit" value="중복확인"></div>
    </form>
    
    </div>
    <?php
    }else{

    if(!$result || mysqli_num_rows($result) == 0){
    ?>
    <div style="color:green">
        <div>
            <?=$idch?>는 사용가능한 아이디입니다. 
            <input type="button" value="사용하기" onclick="parent('<?=$idch?>')">
        </div>
    </div>
    
    <form action="checkid.php" method="get">
        <div>다른아이디 검색하시려면 ▼</div>
        <div><input type="text" name="user_id" value="" placeholder="아이디를 입력해주세요."></div>
        <div><input type="submit" value="중복확인" onclick=""></div>
    </form>
    
    <?php
    }else{
    ?>
    <div style="color:red">
    <?=$idch?>와 같은아이디가 존재합니다.
    
    <form action="checkid.php" method="get">
        <div><input type="text" name="user_id" value="<?=$idch?>"></div>
        <div><input type="submit" value="중복확인"></div>
    </form>
    
    </div>
    <?php
    }
}
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<script>
    function parent(user_id){
        var du = window.opener;
        var num = '1';
        
        du.document.userinput.use.value = num;
        du.user_id.value = user_id;
        
        self.close();
    }
</script>
</body>
</html>
