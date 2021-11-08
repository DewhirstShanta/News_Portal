<?php include "header.php" ?>
<?php include  "../conn.php" ?>

<?php
    // session_start();
    // $user_auth_type = $_COOKIE['user_auth_type']; 
    // $userfirstname = $_COOKIE['fname'];  
    // $userlastname = $_COOKIE['lname']; 
    // $username = $_COOKIE['user']; 
    // $password = $_COOKIE['pass']; 
    // $fullname = $userfirstname." ".$userlastname

    // $root_path= "http://sdlsap5.dewhirst.grp/";
    // $home =  basename($_SERVER['PHP_SELF']);
    // if(empty($username) || empty($password)){
    //   //header("location: $root_path"."admin/index.php?msg4");
    // }


?>


<?php
  
  $msg = '';

  if(isset($_POST['createuser']))
  {

    $fullname = "Mahbub Masum";
    $news_post_date = date("Y/m/d");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userfullname = $_POST['userfullname'];
    $usertype = $_POST['usertype'];
    $email = $_POST['email'];

    $passwordHashed = password_hash($password, PASSWORD_BCRYPT);


    $data = [
        'username' => $username,
        'password' => $passwordHashed,
        'user_fullname' => $userfullname,
        'user_type' => $usertype,
        'user_created_by' => $fullname,
        'create_date' => $news_post_date,
        'email' => $email,
    ];

    $sql = "INSERT INTO admin (username, password, user_fullname, user_type, user_created_by, create_date, email) VALUES (:username, :password, :user_fullname, :user_type, :user_created_by, :create_date, :email)";
    $stmt= $conn->prepare($sql);
    $stmt->execute($data);

    if (!$stmt){
    echo "\nPDO::errorInfo():\n";
    print_r($conn->errorInfo());
    }else{
      $msg = "User Created";
    }


  }

?>



<script type="text/javascript" src="../editor/ckeditor.js"></script>
		         

 <h3 style="color:#7386D5">Dewhirst Shanta News Admin - Create User</h3>

      <div class="container">

        <?php if(!empty($msg)){?>

          <div class="alert alert-success"><?php echo $msg; ?></div>

        <?php } ?>


        <div class="row">
          <div class="col-12" style="float: none; margin:0 auto">
              <div class="card">
                <div class="card-body">
                    <form action="#" method="post">
                      <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control input-sm" placeholder="Username" name="username">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="text" class="form-control input-sm" placeholder="Password" name="password">
                      </div>
                      <div class="form-group">
                        <label for="fullname">User Full Name:</label>
                        <input type="text" class="form-control input-sm" placeholder="User Full Name" name="userfullname">
                      </div>
                      <div class="form-group">
                        <label for="type">User Type:</label>
                            <select class="form-control" name="usertype">
                              <option value="Admin">Admin</option>
                              <option value="Editor">Editor</option>
                              <option value="Moderator">Moderator</option>
                            </select> 
                      </div>

                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control input-sm" placeholder="Dewhirst Email" name="email">
                      </div>




                      <br>
                      <input type="submit" class="btn btn-success btn-sm" name="createuser" value="Submit">
                    </form>
                </div>
              </div>
          </div>
        </div>

   


<script type="text/javascript">
  window.setTimeout(function() {
    $(".alert").fadeTo(2000, 0).slideDown(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>



</body>


<?php include "footer.php" ?>