<?php 
        $host = 'localhost';
		$username = 'root';
		$userpass = 'yull0131';
		$dbname = 'hospital';
 
		$conn = mysqli_connect($host,$username,$userpass,$dbname);
 
		if(mysqli_connect_errno($conn)){
		    echo "DB 연결 실패".mysqli_connect_error();
		}
        else{
 
		}
		$db_table = "user";
 
		if(!$conn){
 		   echo "not connect DB";
		}

		session_start();

		if($_SERVER["REQUEST_METHOD"] == "POST"){

		$email = $_POST['user_email'];
	    $key = sha1(mt_rand(10000,99999).time().$email);

        $sql=("SELECT * FROM user WHERE user_email='$email' AND activation_key='$key'");
		$query=mysqli_query($conn,$sql);

         
        $fetch=mysqli_fetch_array($query);
        if($fetch['activation_status'] == 'Active'){
            $output='Your Email has already been verified.';
        }
        else{
            $cnt=mysqli_num_rows($query);
            if($cnt=='1'){
                $updateQ=mysql_query("UPDATE user SET activation_status='Active' WHERE user_email='$email' AND activation_key='$key'");
                if($updateQ){
                    $output='Email Verified';
                }else{
                    $output='System Faced an error while updating your status.';
                }
            }else{
                $output='Unable to verify your email address.';
            }
        }
		
        mysqli_close($conn);
        return $output;
    }
?>