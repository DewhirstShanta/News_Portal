<script src="../bootstrap/js/bootstrap4.min.js"></script>
<script src="../bootstrap/js/popper4.min.js"></script>


<?php

include "../conn.php";

session_start();



    if(isset($_POST['checkpass']))
    {

            $email = $_POST['email'];
            $checkuser = $conn->prepare("SELECT * FROM `admin` WHERE email=? LIMIT 1");
            $checkuser->execute([$email]); 
            $checkinfo = $checkuser->fetch();

            if($checkinfo == TRUE)
            {   


                $user_name = $checkinfo["username"];

                $pass_word = "Today".date("dm");
                $passwordHashed = password_hash($pass_word, PASSWORD_BCRYPT);


                $data = [
                    'username' => $user_name,
                    'password' => $passwordHashed,
                    'email' => $email,
                ];


                $sql = "UPDATE admin SET password = :password WHERE username = :username AND email = :email";

                $stmt= $conn->quote($sql);
                $stmt= $conn->prepare($sql);
                $stmt->execute($data);




                $email_to = $email;
                $email_from = "DBITS <sdl.workflow@dewhirst.com>";
                $email_subject = "Portal Email Address";
                $email_message = "
                <html>
                <body style='width: 100%'>
                <div style='margin: 15px; float: left;'>
                <div style='margin: 45px;float: left;'>
                <p style='color:black; text-align: Left; font-size: 20px; line-height: 15px; '>SHANTA <wbr> DENIMS <wbr> LIMITED</p>
                <p style='color:black; text-align: left; font-size: 15px; line-height: 5px; '>Shanta News Portal</p>
                <table style='text-align: left; overflow-x:auto; border-collapse: collapse; width: 50%;' frame='box'>
                <tr>
                <td style='border: 1px solid #ddd; text-align: left; padding: 10px;'>User Name</td>
                <td style='border: 1px solid #ddd; text-align: left; padding: 10px; color:blue;'>$user_name </td>
                </tr>
                <tr>
                <td style='border: 1px solid #ddd; text-align: left; padding: 10px;'>Password</td>
                <td style='border: 1px solid #ddd; text-align: left; padding: 10px; color:blue;'>$pass_word</td>
                </tr>                         
                </table>
                </div>
                </div>
                </body>
                </html>.\n\n";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: '.$email_from."\r\n";
                'X-Mailer: PHP/' . phpversion();
                if (@mail($email_to, $email_subject, $email_message, $headers)) {
                header("location:index.php?msg7=".$email);
                }


            }else{
                 header("location:index.php?msg6=".$email);
            }
        
    }









if(isset($_POST['submit']))
{

    echo $username = $_POST['username']; 
    echo $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username=? LIMIT 1");
    $stmt->execute([$username]); 
    $post_details = $stmt->fetch();






    if($post_details == TRUE)
    {
        //Compare the password attempt with the password we have stored.
        echo $validPassword = password_verify($password, $post_details["password"]);
        if($validPassword){

        echo $log_count = ($post_details["login_count"]+1);
        date_default_timezone_set("Asia/Dhaka");
        $last_login = date("Y-m-d h:i:s");

        $data = [
            'login_count' => $log_count,
            'last_login' => $last_login,
            'login_now' => 1,
            'username' => $username,
        ];

        var_dump($data);

        $sql = "UPDATE admin SET login_count = :login_count , last_login = :last_login, login_now = :login_now  WHERE username = :username";
        $stmt= $conn->prepare($sql);
        $stmt->execute($data);


        if($stmt == true){
            echo "yes";
        }

        setcookie('user',$post_details["username"],0,'/');
        setcookie('fname',$post_details["user_fullname"],0,'/');
        setcookie('lastlogin',$post_details["last_login"],0,'/'); 
        setcookie('lastlogout',$post_details["logout_time"],0,'/'); 
        setcookie('user_type',$post_details["user_type"],0,'/'); 

        header("location:admin_home.php");

        }else{
            //header("location:index.php?msg2=".$username);
        }
    }else{
        //header("location:index.php?msg2=".$username);
        echo $stmt->error;
    }
}
?>



<script type="text/javascript">
  window.setTimeout(function() {
    $(".alert").fadeTo(2000, 0).slideDown(500, function(){
        $(this).remove(); 
    });
}, 3000);
</script>



