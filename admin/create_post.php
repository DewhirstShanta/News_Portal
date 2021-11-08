<?php include "header.php" ?>
<?php include  "../conn.php" ?>


<?php
  
    $msg = '';
    date_default_timezone_set("Asia/Dhaka");
    $micro = preg_replace('/[^A-Za-z0-9\-]/', '', microtime());

  if(isset($_POST['createpost']))
  {

    //$fullname = "Mahbub Masum";
    $news_post_date = date("Y/m/d");
    $news_header = $_POST['news_head'];
    $news_details = $_POST['news_details'];
    $publish_date = $_POST['publish_date'];
    $news_exp_date = $_POST['news_exp_date'];
    $trans_news_header = $_POST['news_head_trans'];
    $trans_news_details = $_POST['news_details_translated'];   
    $news_sms = $_POST['news_sms'];   
    $filename = $_FILES['files']['name']; 



    $extension=end(explode(".", $filename));
    $newfilename=$micro .".".$extension;

    $target_file = 'upload/'.$newfilename;
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    $valid_extension = array("png","jpeg","jpg");
    if(in_array($file_extension, $valid_extension))
    {
      if(move_uploaded_file($_FILES['files']['tmp_name'], $target_file)) 
      {
          $imgdata = [
            'image_link' => $newfilename,
            'post_id' => $micro,
          ];
          $sqlimg = "INSERT INTO image (image_link, post_id) VALUES (:image_link, :post_id)";
          $stmtimg= $conn->prepare($sqlimg);
          $stmtimg->execute($imgdata);
      }
    }

    if($development == 1 )
    {
      echo "news_header :".$news_header; echo "<br/>";
      echo "news_header_trans :".$news_head_trans; echo "<br/>";
      echo "news_details :".$news_details; echo "<br/>";
      echo "news_details_translated :".$news_details_translated; echo "<br/>";
      echo "publish_date :".$publish_date; echo "<br/>";
      echo "news_exp_date :".$news_exp_date; echo "<br/>";
      echo "news_sms :".$news_sms; echo "<br/>";
    }

    $data = [
        'news_header' => $news_header,
        'trans_news_header' => $trans_news_header,
        'news_details' => $news_details,
        'trans_news_details' => $trans_news_details,
        'news_submitted_by' => $fname,//session
        'news_publish_date' => $publish_date,
        'news_post_date' => $news_post_date,
        'news_expr_date' => $news_exp_date,
        'news_sms' => $news_sms,
        'news_type' => '1',
        'post_id' => $micro,
    ];

    $sql = "INSERT INTO news_main (news_header, trans_news_header, news_details, trans_news_details, news_sms, news_submitted_by, news_publish_date, news_post_date, news_expr_date, news_type, post_id) VALUES (:news_header, :trans_news_header, :news_details, :trans_news_details, :news_sms, :news_submitted_by, :news_publish_date, :news_post_date, :news_expr_date, :news_type, :post_id)";

    $stmt= $conn->quote($sql);
    $stmt= $conn->prepare($sql);
    $stmt->execute($data);



    if (!$stmt){
      $msg = $conn->errorInfo();
    }else{
      $msg = "Post Created";
    }


  }

?>



<script type="text/javascript" src="../editor/ckeditor.js"></script>
		         

 <h3 style="color:#7386D5">Dewhirst Shanta News Admin - Create Post</h3>

      <div class="container">

        <?php if(!empty($msg)){?>

          <div class="alert alert-success"><?php echo $msg; ?></div>

        <?php } ?>


        <div class="row">
          <div class="col-12" style="float: none; margin:0 auto">
              <div class="card">
                <div class="card-body">
                    <form action="#" method="post" enctype='multipart/form-data'>

                      <div class="form-group">
                        <label for="email">News Header Main Language: (Max 290 Ch)</label>
                        <input type="text" class="form-control" placeholder="News Header" name="news_head">
                      </div>

                      <div class="form-group">
                        <label for="email">News Header Translated Language:(Optional)(Max 290 Ch)</label>
                        <input type="text" class="form-control" placeholder="News Header" name="news_head_trans">
                      </div>


                      <div class="form-group">
                        <label for="pwd">News Details Main Language:</label>
                        <textarea class="ckeditor" name="news_details"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="pwd">News Details Translated Language:(Optional)</label>
                        <textarea class="ckeditor" name="news_details_translated"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="pwd">News Summery for  SMS:(Optional- 160 Char)</label>
                        <textarea class="form-control" name="news_sms" maxlength="159"></textarea>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Max Char 160</div>

                      </div>

                    <div class="form-row">
                      <div class="col">
                        <label for="email">News Publish Date:</label>
                        <input type="date" class="form-control" id="publish_date" name="publish_date" required="required">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>


                      </div>

                      <div class="col">
                        <label for="email">News Expiry Date:</label>
                        <input type="date" class="form-control" id="news_exp_date" name="news_exp_date" required="required">
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                      </div>
                      
                      <div class="col">
                        <label for="file" id="filelabel">Select Image (Optional):</label>
                        <input type='file' class="form-control" id="files" name='files' multiple />
                      </div>

                   </div>

                      <br>

                      <input type="submit" class="btn btn-success btn-sm" name="createpost" value="Submit">
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
<script>
// Add the following code if you want the name of the file appear on select
$("#imageup").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings("#filelabel").addClass("selected").html(fileName);
  alert(fileName);
});
</script>


</body>


<?php include "footer.php" ?>