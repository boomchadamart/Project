<?php
include("head.php");
 ?>
<!DOCTYPE html>
<html lang="en">

<body>

    <!-- Navigation -->


    <!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">  <a href="logout.php"><h5 align="left" style="padding-left:93%;color:black"><i class="fa fa-sign-out" style="font-size:18px;color:black"></i> Log out</i></h5><a href="index.php">หน้าแรก </a>| สถานะการใช้งาน</small>  &nbsp;
                <small>  </small>
              </h3>
            </div>
        </div>

<!-- <h4>เลือกข้อมูล</h4>
<br><p>ใช้ประจำที่:
   <select class="selectpicker show-tick" >
    <option>FMS 3303</option>
    <option>FMS 3304</option>
    <option>FMS 3305</option>
    <option>FMS 3306</option>
  </select>
   &nbsp; &nbsp;    หมวดหมู่อุปกรณ์:
     <select class="selectpicker show-tick" >
      <option>Computer</option>
      <option>Server</option>
      <option>Hub</option>
      <option>XXXXXXXXXXXXX</option>
    </select> </p> -->
    <br>
    <form>
    <?php
    include 'connection.php';
    $sql = 'SELECT room_id,room_num FROM room';
    $result = $conn->query($sql);
    ?>
    &nbsp;&nbsp;&nbsp;&nbsp;<font size="3">ใช้ประจำที่ :
      <select class="selectpicker show-tick" id="room_id">
      <?php
        while ($room = $result->fetch_array()) {
          echo '  <option value="" disabled selected hidden></option>';
          echo '  <option value="'.$room['room_id'].'">'.$room['room_num'].'</option>';
        }
       ?>
      </select>

      <?php
        $sql2 = 'SELECT param_code,param_endesc FROM parameterdetail where param_no =100 order by param_code';
        $result2 = $conn->query($sql2);
      ?>
      หมวดหมู่อุปกรณ์ :
         <select class="selectpicker show-tick" id="equipment_type">
          <?php
          while ($type = $result2->fetch_array()) {
            echo '  <option value="" disabled selected hidden></option>';
            echo '  <option value="'.$type['param_code'].'">'.$type['param_endesc'].'</option>';
          }
          ?>
        </select>

          &nbsp;&nbsp;วันที่: <input id="date" class="date-picker" type="text" name="statuss_date" >
          <i class="fa fa-calendar" style="font-size:24px"></i></font>

      &nbsp;&nbsp;<font size="3">
         <?php
            $sql2 = 'SELECT statuss_code,statuss_th FROM statuss  order by statuss_code';
            $result2 = $conn->query($sql2);
          ?>
          สถานะ : </font>
             <td><font size="3 " ><select class="selectpicker show-tick" name="statuss_id" id="statuss">
              <?php
              while ($type = $result2->fetch_array()) {
                echo '  <option value="" disabled selected hidden></option>';
                echo '  <option value="'.$type['statuss_code'].'">'.$type['statuss_th'].'</option>';
              }
              ?>
            </select>  </font>
            &nbsp;
            <button style="font-size:16px;color:green" id="btnSerch" type="button">ค้นหา <i class="fa fa-search"></i></button>
</form>

<br>
        <div class="container" style="text-align:center">
            <table class="table table-striped table-bordered"  id="editstatus" >
                <thead>
                     <tr>
                         <th>ลำดับ</th>
                         <th>วันที่</th>
                         <th>หมวดหมู่อุปกรณ์</th>
                         <th>หมายเลขอุปกรณ์</th>
                         <th>ใช้ประจำที่</th>
                         <th style="display: none;">ไอดีสถานะ</th>
                         <th>สถานะ</th>
                         <th>รายละเอียด</th>

                     </tr>
                </thead>
                <tbody>
                  <?php
                     $search = 'SELECT equipment.equipment_id AS "equipment_id",
                                       equipment.equipment_update_date,
                                       type.param_endesc,
                                       equipment.equipment_num,
                                       room.room_num,
                                       equipment.statuss_id,
                                       statuss.statuss_th,
                                       statuss.statuss_detail
                                 FROM equipment
                                 left JOIN computer ON equipment.equipment_id = computer.equipment_id
                                 left JOIN servers ON equipment.equipment_id =servers.equipment_id
                                 left JOIN hub ON  hub.equipment_id = equipment.equipment_id
                                 left JOIN statuss ON equipment.statuss_id = statuss.statuss_code
                                 JOIN parameterdetail type ON type.param_code = equipment.equipment_type AND type.param_no = 100
                                 JOIN room ON room.room_id = equipment.room_id';
                     $status = $conn->query($search);

                    $no = 1;
                     while ($row = $status->fetch_array()) {
                        echo '<tr>';
                        echo '  <td>'.$no.'</td>';
                        echo '  <td>'.$row['equipment_update_date'].'</td>';
                        echo '  <td>'.$row['param_endesc'].'</td>';
                        echo '  <td>'.$row['equipment_num'].'</td>';
                        echo '  <td>'.$row['room_num'].'</td>';
                        echo '  <td style="display: none;">'.$row['statuss_id'].'</td>';
                        echo '  <td>'.$row['statuss_th'].'</td>';
                        echo '  <td>'.$row['statuss_detail'].'</td>';

                        echo '</tr>';
                    $no++;

                     }
                  ?>
                </tbody>
            </table>
        </div>
        <br><br>




    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="jqueryui/jquery-ui.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.tabledit.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
      $(".date-picker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat:  'yy-mm-dd'
      });

      $('#editstatus').Tabledit({
          url: 'manageStatus.php',
          columns: {
              identifier: [[1, 'equipment_update_date'],[2, 'param_endesc'],[3, 'equipment_num'],[4, 'room_num'],[5, 'statuss_id']],
              editable: [ [6, 'statuss_th','{"ปกติ": "ปกติ","ชำรุด": "ชำรุด"}'], [7, 'statuss_detail']]
          },
          onAjax: function(action, serialize) {
              window.location.reload;
         }
      });
  });

  </script>


</body>

</html>
