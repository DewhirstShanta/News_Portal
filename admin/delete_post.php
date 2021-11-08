<?php include "header.php" ?>
<?php include  "../conn.php" ?>


<?php
  session_start();
  date_default_timezone_set("Asia/Dhaka");

  $id = '';
  $retrieve = '';
  $delete_time  = '';
  $user = '';

  $delete_time = date("Y-m-d h:i:s");
  $user = $_COOKIE['user'];

  if(isset($_GET['id']))
  {
    echo $id = $_GET['id'];  echo "<br/>"; 
    echo $retrieve = $_GET['retrieve'];  echo "<br/>"; 

    if($retrieve == 0)
    {
      $data = [
          'news_deletion_flag' => 1,
          'news_deletion_time' => $delete_time,
          'news_deletion_by' => $user,
          'id' => $id,
      ];
      $sql = "UPDATE news_main SET 
      news_deletion_flag = :news_deletion_flag, 
      news_deletion_time = :news_deletion_time, 
      news_deletion_by = :news_deletion_by WHERE id = :id";

      $stmt= $conn->quote($sql);
      $stmt= $conn->prepare($sql);
      $stmt->execute($data);
      if($stmt == true){
        header("location:admin_home.php");
      }

    }else{
           $data = [
          'news_deletion_flag' => 0,
          'id' => $id,
      ];
      $sql = "UPDATE news_main SET news_deletion_flag = :news_deletion_flag WHERE id = :id";

      $stmt= $conn->quote($sql);
      $stmt= $conn->prepare($sql);
      $stmt->execute($data); 
      if($stmt == true){
        header("location:admin_home.php");
      }



    }













  }

?>


<?php include "footer.php" ?>