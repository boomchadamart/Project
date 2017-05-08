<?php
include("head.php");
 ?>
<body>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    <a href="logout.php"><h5 align="left" style="padding-left:93%;color:black">
                      <i class="fa fa-sign-out" style="font-size:18px;color:black"></i> Log out</h5>
                    </a>
                    <a href="index.php">หน้าแรก </a>| ตั้งค่าหมวดหมู่อุปกรณ์ </small>  &nbsp;
                </h3>
            </div>
        </div>
        <br>
        <div class="row">
            <p><a class="btn btn-success" href="addeq.php">เพิ่มหมวดหมู่อุปกรณ์</a></p>
        </div>
        <div class="row">
            <div id="" class="grid-view">
                <table id="editeq" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th style="display: none;">หมายเลขตาราง</th>
                            <th>รหัส</th>
                            <th>ชื่อหมวดหมู่อุปกรณ์ (Eng.)</th>
                            <th>ชื่อหมวดหมู่อุปกรณ์ (ไทย)</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php
                         include 'connection.php';
                           $search = 'SELECT param_no,param_code, param_endesc, param_thdesc
                                      FROM parameterdetail
                                      WHERE param_no = 100';
                           $status = $conn->query($search);

                           $no = 1;
                           while ($row = $status->fetch_array()) {
                              echo '<tr>';
                              echo '  <td>'.$no.'</td>';
                              echo '  <td style="display: none;">'.$row['param_no'].'</td>';
                              echo '  <td>'.$row['param_code'].'</td>';
                              echo '  <td>'.$row['param_endesc'].'</td>';
                              echo '  <td>'.$row['param_thdesc'].'</td>';
                              echo '</tr>';
                              $no++;
                           }
                        ?>
                  </tbody>
              </table>
          </div>
       </div>
    </div>







    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="jqueryui/jquery-ui.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.tabledit.js"></script>
    <script>

      $(document).ready(function() {
        //XXX Setting company table
        $('#editeq').Tabledit({
            url: 'manageEq.php',
            columns: {
                identifier: [2, 'param_code'],
                editable: [ [3, 'param_endesc'], [4, 'param_thdesc']]
            },
            onAjax: function(action, serialize) {
                window.location.reload;
           }
        });
    });

    </script>


</body>

</html>
