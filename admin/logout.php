
<?php

	include "../conn.php";

	session_start();
	date_default_timezone_set("Asia/Dhaka");
	$logout_time = date("Y-m-d h:i:s");
	echo $user = $_COOKIE['user'];

	$data = [
	'logout_time' => $logout_time,
	'login_now' => 0,
	'username' => $user,
	];


    $sql = "UPDATE admin SET  logout_time = :logout_time, login_now = :login_now WHERE username = :username";
    $stmt= $conn->prepare($sql);
    $stmt->execute($data);

    if($stmt == true){

    	session_destroy();  
		setcookie("user_type" , '' , time()-1000, '/');
		setcookie("fname" , '' , time()-1000, '/');
		setcookie("lastlogin" , '' , time()-1000, '/');
		setcookie("user" , '' , time()-1000, '/');
		header("location:index.php?msg5");
		exit;
    }










?>
