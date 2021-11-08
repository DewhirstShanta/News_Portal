<?php 

	//include "others/Include/all_message.php" ;
	//include "others/Include/session.php ";
?>


<?php

	$msg = "";
	$name = "";

	if(isset($_GET['msg1'])){
		$msg = '<div class="alert alert-danger">Username or Password is Empty</div>';
	}


	if(isset($_GET['msg2'])){
		$name = $_GET['msg2'];
		$msg = '<div class="alert alert-danger">Sorry '. $name .' is not admin user.</div>';
	}

	if(isset($_GET['msg4'])){
		$msg = '<div class="alert alert-danger">Please Login </div>';
	}


	if(isset($_GET['msg5'])){
		$msg = '<div class="alert alert-success">Thanks For Visit.</div>';
	}


	if(isset($_GET['msg6'])){
		$email = $_GET['msg6'];
		$msg = '<div class="alert alert-danger">'.$email.'Is not Registered Email Address</div>';
	}

	if(isset($_GET['msg7'])){
		$email = $_GET['msg7'];
		$msg = '<div class="alert alert-danger">Check Email </div>';
	}







?>




<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Dewhirst News Portal">
		<meta name="author" content="Mahbub Masum">
		<meta name="Create Date" content="28th Sep 2021">
		<title>Dewhirst Shanta  News Portal</title>
		<link rel="stylesheet" href="../bootstrap/style/bootstrap4.min.css">
		<link rel="stylesheet" href="../bootstrap/style/bootstrap-theme.min.css">
		<link rel="stylesheet" href="../bootstrap/style/dewhirst_own_style.css">
		<script src="../bootstrap/js/bootstrap4.min.js"></script>
		<script src="../bootstrap/js/popper4.min.js"></script>


	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>










	</head>


  <body style="background-color: black">
			<div class="container" style="margin-top:50px">
				<div class="row">
  				<div class="col-6" style="float: none; margin:0 auto">
              <div class="card">
                <div class="card-header">
                  <center><h6>Dewhirst News Admin Login</h6></center>
                </div>
                <div class="card-body">

									<form method='post' action='check_user.php'>
										<fieldset>

										<?php if(!empty($msg)){
												echo $msg;
										 } ?>

										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Username" name="username" value="" type="text" autofocus>
											</div>
										</div>

										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Password" name="password" value="" type="password">
											</div>
										</div>

										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block btn-sm" name="submit" value="Sign in">
										</div>

										</fieldset>
									</form>


										<div class="form-group form-check">
									    <label class="form-check-label">
									      <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Forgot Password</button>
									    </label>
									  </div>

                </div>

              </div>
          </div>
        </div>


    
		   
				<div class="modal" id="myModal">
				  <div class="modal-dialog">
				    <div class="modal-content">

				      <!-- Modal Header -->
				      <div class="modal-header">
				        <h4 class="modal-title">Dewhirst Network Email</h4>
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				      </div>

				      <!-- Modal body -->
				      <div class="modal-body">
				      			<form method="post" action="check_user.php">
        							<div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control input-sm answer" placeholder="Dewhirst Email" name="email" id="email" >
                      </div>    

					            <div class="form-group">
												<input type="submit" class="btn btn-lg btn-primary btn-block btn-sm" name="checkpass" value="Check">
											</div>
				      			</form>


				      </div>

				      <!-- Modal footer -->
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				      </div>

				    </div>
				  </div>
				</div>


</div>

<script type="text/javascript">

	alert(asdfasdf);
  window.setTimeout(function() {
    $(".alert").fadeTo(2000, 0).slideDown(500, function(){
        $(this).remove(); 
    });
}, 2000);
</script>




</body>
</html>

