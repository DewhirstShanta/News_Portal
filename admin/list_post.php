<?php include "header.php" ?>
<?php include  "../conn.php" ?>
   

<style type="text/css">
  .btn-group-sm>.btn, .btn-sm {
    padding: 3px 5px;
    font-size: 12px;
    line-height: 0.90;
    border-radius: 0px;
    box-shadow: 0px 2px 2px #888888;
}
</style>

<style type="text/css">
        
  div.pager {
      text-align: left; 
  }

  div.pager span {
      display: inline-block;
      width: 1.8em;
      height: 1.8em;
      line-height: 1.8;
      text-align: center;
      cursor: pointer;
      background: #191919;
      color: #ccc;
      margin-right: 0.5em;
  }

  div.pager span.active {
      background: #fff;
      color:#191919;
      font-weight:bold;
      text-align:center;
  }

</style>




<h3 style="color:#7386D5">Dewhirst Shanta News Admin - List of User</h3>

        <div class="row">
          <div class="col-12" style="float: none; margin:0 auto">
              <div class="card">
                <div class="card-body">
                    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
                    <table class="table table-bordered table-sm paginated">
                        <thead>
                          <tr>
                            <th colspan="4"><a href="create_post.php" class="btn btn-secondary btn-sm">Create</a></th>
                          </tr>
                          <tr>
                            <th>Header</th>
                            <th>Post Date</th>
                            <th>Exp Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $postlist_qry = $conn->query('SELECT * FROM news_main')->fetchAll(); foreach($postlist_qry as $row) { ?>
                          <?php
                              if($row['news_deletion_flag'] == 1){
                                $bgcolor = '#DAD7D6';
                              }else{
                                $bgcolor = '#ffffff';
                              }
                          ?>
                          <tr style="background-color: <?php echo $bgcolor; ?>;">
                            <td><?php echo $row['news_header']; ?></td>
                            <td><?php echo $row['news_post_date']; ?></td>
                            <td><?php echo $row['news_expr_date']; ?></td>
                            <td>
                              <!-- <a href="create_post.php" class="btn btn-secondary btn-sm">Create</a> -->
                          <?php if($row['news_deletion_flag'] == 1){ ?>
                                <a href="delete_post.php?retrieve=1&&id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm">Retrieve</a>
                          <?php }else{ ?>
                                <a href="edit_post.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="delete_post.php?retrieve=0&&id=<?php echo $row['id'] ?>" class="btn btn-secondary btn-sm">Delete</a>
                          <?php } ?>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                </div>
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


            <script type="text/javascript">
                $('table.paginated').each(function () {
                    var currentPage = 0;
                    var numPerPage = 20; // number of items 
                    var $table = $(this);
                    //var $tableBd = $(this).find("tbody");

                    $table.bind('repaginate', function () {
                        $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
                    });
                    $table.trigger('repaginate');
                    var numRows = $table.find('tbody tr').length;
                    var numPages = Math.ceil(numRows / numPerPage);
                    var $pager = $('<div class="pager"></div>');
                    for (var page = 0; page < numPages; page++) {
                        $('<span class="page-number"></span>').text(page + 1).bind('click', {
                            newPage: page
                        }, function (event) {
                            currentPage = event.data['newPage'];
                            $table.trigger('repaginate');
                            $(this).addClass('active').siblings().removeClass('active');
                        }).appendTo($pager).addClass('clickable');
                    }
                    if (numRows > numPerPage) {
                        $pager.insertAfter($table).find('span.page-number:first').addClass('active');
                    }
                });
            </script>