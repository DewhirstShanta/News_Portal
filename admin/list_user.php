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



         

 <h3 style="color:#7386D5">Dewhirst Shanta News Admin - List of User</h3>

      <div class="container">

        <div class="row">
          <div class="col-12" style="float: none; margin:0 auto">
              <div class="card">
                <div class="card-body">



                    <table class="table table-bordered table-sm">
                        <thead>
                          <tr>
                            <th>User Name</th>
                            <th>Full Name</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>User Created By</th>
                            <th>Created Date</th>
                            <th>Total Login</th>
                          </tr>
                        </thead>

                        <tbody>
<?php $adminuser_qry = $conn->query('SELECT * FROM admin')->fetchAll(); foreach($adminuser_qry as $row) { ?>

                          <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['user_fullname']; ?></td>
                            <td>

                              <?php if($row['active'] == 1)
                                    {echo "Active";}
                                    else{echo "Inactive";} 
                              ?>
                                
                            </td>
                            <td><?php echo $row['user_type']; ?></td>
                            <td><?php echo $row['user_created_by']; ?></td>
                            <td><?php echo $row['create_date']; ?></td>
                            <td><?php echo $row['login_count']; ?></td>

                          </tr>

<?php } ?>

                        </tbody>
                      </table>




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