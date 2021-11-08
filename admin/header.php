<?php
  session_start();
  $user = $_COOKIE['user']; 
  $fname = $_COOKIE['fname'];  
  $lastlogin = $_COOKIE['lastlogin']; 
  $user_type = $_COOKIE['user_type']; 
  $home =  basename($_SERVER['PHP_SELF']);
  if(empty($user) || empty($fname)){
    header("location: index.php?msg4");
  }
?>








<!DOCTYPE html>
<html>
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
        <link rel="stylesheet" href="../bootstrap/style/dewhirst.custom.css">
        <link rel="stylesheet" href="style.css">
        <script src="../bootstrap/js/bootstrap4.min.js"></script>
        <script src="../bootstrap/js/popper4.min.js"></script>
    </head>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h5>News Admin</h5>
                <h6 style="font-size: 10px;color: #fff;"><?php echo $fname ?></h6>
            </div>

            <ul class="list-unstyled components">

                <li >
                    <a href="#homepage" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle active">Home</a>
                    <ul class="collapse list-unstyled" id="homepage">
                        <li><a href="admin_home.php">Admin Home</a></li>
                        <li><a href="../index.html">Portal Home</a></li> 
                    </ul>
                </li>

                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Post</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li><a href="create_post.php">Create Post</a></li>
                        <!-- <li><a href="edit_post.php">Edit Post</a></li> -->
                        <li><a href="list_post.php">Post List</a></li> 
                        
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Admin</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li><a href="create_user.php">Create Admin User</a></li>
                        <li><a href="list_user.php">List of Admin User</a> </li>
                    </ul>
                </li>

               <li>
                    <a href="logout.php">Log Out</a>
                </li>

            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">
