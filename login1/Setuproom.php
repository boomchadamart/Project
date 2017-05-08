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
                  <a href="index.php">หน้าแรก </a>| ตั้งค่าห้อง </small>  &nbsp;
              </h3>
          </div>
      </div>
      <br>
      <div class="row">
          <p><a class="btn btn-success" href="addroom.php">เพิ่มห้อง</a></p>
      </div>
      <div class="row">
          <div id="" class="grid-view">
              <table id="editeq" class="table table-striped table-bordered">
                  <thead>
                      <tr>
                          <th>ลำดับ</th>
                          <th style="display: none;">ไอดีห้อง</th>
                          <th style="width: 30%">ชื่อห้อง</th>
                          <th style="width: 40%">ชื่ออาคาร</th>
                          <th>ชั้น</th>
                          <th>ความสามารถในการจุคน</th>
                      </tr>
                </thead>
                <tbody>
                      <?php
                       include 'connection.php';
                         $room = 'SELECT room_id, room_num, room_build, room_floor, room_capacity
                                    FROM room';
                         $setuproom = $conn->query($room);

                         $no = 1;
                         while ($row = $setuproom->fetch_array()) {
                            echo '<tr>';
                            echo '  <td>'.$no.'</td>';
                            echo '  <td style="display: none;">'.$row['room_id'].'</td>';
                            echo '  <td>'.$row['room_num'].'</td>';
                            echo '  <td>'.$row['room_build'].'</td>';
                            echo '  <td>'.$row['room_floor'].'</td>';
                            echo '  <td>'.$row['room_capacity'].'</td>';
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
          url: 'manageroom.php',
          columns: {
              identifier: [1, 'room_id'],
              editable: [ [2, 'room_num'], [3, 'room_build'],[4, 'room_floor'], [5, 'room_capacity']]
          },
          onAjax: function(action, serialize) {
              window.location.reload;
         }
      });
  });

  </script>


  </body>

  </html>
