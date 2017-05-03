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
                <h3 class="page-header"><a href="logout.php"><h5 align="left" style="padding-left:93%;color:black"><i class="fa fa-sign-out" style="font-size:18px;color:black"></i> Log out</i></h5></a>รายงานด้าน Desktop Management  <br><br><a href="index.php">หน้าแรก </a>| ข้อมูลสถานะการใช้งาน</small>  &nbsp;
                <small>  </small>
              </h3>
            </div>
        </div>
<br>
<form method="post" action="printReportStatus.php">
        <font size="3">&nbsp;&nbsp;
          จากวันที่: <input type="text" class="date-picker" name="startdate" value="">&nbsp;
          ถึงวันที่: <input type="text" class="date-picker" name="startdate" value="">&nbsp;

          <?php
          include 'connection.php';
            $sql2 = 'SELECT param_code,param_endesc FROM parameterdetail where param_no =100 order by param_code';
            $result2 = $conn->query($sql2);
          ?>
          หมวดหมู่อุปกรณ์ :
             <select class="selectpicker show-tick">
              <?php
              while ($type = $result2->fetch_array()) {
                echo '  <option value="" disabled selected hidden></option>';
                echo '  <option value="'.$type['param_code'].'">'.$type['param_endesc'].'</option>';
              }
              ?>
            </select>

              <?php
                include 'connection.php';
                $sql = 'SELECT room_id,room_num FROM room';
                $result = $conn->query($sql);
                ?>

                <font size="3">ใช้ประจำที่ :
                  <select class="selectpicker show-tick" >
                  <?php
                    while ($room = $result->fetch_array()) {
                      echo '  <option value="" disabled selected hidden></option>';
                      echo '  <option value="'.$room['room_id'].'">'.$room['room_num'].'</option>';
                    }
                   ?>
                  </select>  <button style="font-size:16px;color:green">ค้นหา <i class="fa fa-search"></i></button>
</font>
      <br><br>


    <div class="container" style="text-align:center">
        <table class="table table-striped table-bordered table table-hover"  id="seachData" >

    <thead>
     <tr>
       		<th>ลำดับ</th>
       <th>วันที่รับเข้ามา</th>
       <th>หมวดหมู่อุปกรณ์</th>
       <th>หมายเลขอุปกรณ์</th>
       <th>สถานะ</th>
       <th>รายละเอียด</th>
       <th>ซอฟต์แวร์ระบบ</th>
       <th>อัพเดทล่าสุด</th>
       <th>ใช้ประจำที่</th>
       </tr>
    </thead>
    <tbody>
      <?php
         $search = 'SELECT equipment.equipment_id AS "equipment_id",
                           equipment.equipment_date,
                           type.param_endesc,
                           equipment.equipment_num,
                           equipment.statuss_id,
                           statuss.statuss_th,
                           statuss.statuss_detail,
                           computer.computer_OS,
                           computer.computer_updateOS,
                           room.room_num
                     FROM equipment
                     left JOIN computer ON equipment.equipment_id = computer.equipment_id
                     left JOIN servers ON equipment.equipment_id =servers.equipment_id
                     left JOIN hub ON  hub.equipment_id = equipment.equipment_id
                     left JOIN statuss ON equipment.statuss_id = statuss.statuss_code
                     JOIN parameterdetail type ON type.param_code = equipment.equipment_type AND type.param_no = 100
                     JOIN room ON room.room_id = equipment.room_id';
         $status = $conn->query($search);

         while ($row = $status->fetch_array()) {
            echo '<tr>';
            echo '  <td>'.$row['equipment_id'].'</td>';
            echo '  <td>'.$row['equipment_date'].'</td>';
            echo '  <td>'.$row['param_endesc'].'</td>';
            echo '  <td>'.$row['equipment_num'].'</td>';
            echo '  <td>'.$row['statuss_th'].'</td>';
            echo '  <td>'.$row['statuss_detail'].'</td>';
            echo '  <td>'.$row['computer_OS'].'</td>';
            echo '  <td>'.$row['computer_updateOS'].'</td>';
            echo '  <td>'.$row['room_num'].'</td>';
            echo '</tr>';
         }
      ?>
    </tbody>
   </table>
 </div>

         <br>
             <center><button id="btnPrintReport" type="submit" style="font-size:16px;color:green">พิมพ์รายงาน</button>
</form>
             <br><br>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="jqueryui/jquery-ui.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="DataTables/media/js/jquery.dataTables.min.js"> </script>

    <script>
    $(document).ready(function(){
      $(".date-picker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat:  'yy-mm-dd'
      });

      var table = $('#seachData').DataTable({
        "bLengthChange": false,
        "pageLength":  10
      });



    });


    </script>



</body>

</html>
