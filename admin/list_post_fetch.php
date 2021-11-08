<?php
     print_r("ouasdfasdfsdfsdfsdtput");


    $output = '<div class="row">
          <div class="col-12" style="float: none; margin:0 auto">
              <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <thead>
                          <tr>
                            <th>Post ID</th>
                            <th>Header</th>
                            <th>Post Date</th>
                            <th>Exp Date</th>
                          </tr>
                        </thead>
                        <tbody>'.
                         $postlist_qry = $conn->query("SELECT * FROM news_main")->fetchAll(); 
                         foreach($postlist_qry as $row) {
                          .'
                          <tr>
                            <td>'.$row[id].'</td>
                            <td>'.$row[news_header].'</td>
                            <td>'.$row[news_post_date].'</td>
                            <td>'.$row[news_expr_date].'</td>
                          </tr>'
                          .}.'
                        </tbody>
                      </table>
                </div>
              </div>
          </div>
        </div>';




?>