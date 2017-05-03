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
            $sql2 = 'SELECT param_code,param_thdesc FROM parameterdetail where param_no =102  order by param_code';
            $result2 = $conn->query($sql2);
          ?>
          สถานะ : </font>
             <td><font size="3 " ><select class="selectpicker show-tick" name="statuss_id" id="statuss">
              <?php
              while ($type = $result2->fetch_array()) {
                echo '  <option value="" disabled selected hidden></option>';
                echo '  <option value="'.$type['param_code'].'">'.$type['param_thdesc'].'</option>';
              }
              ?>
            </select>  </font>
            &nbsp;
            <button style="font-size:16px;color:green" id="btnSerch" type="button">ค้นหา <i class="fa fa-search"></i></button>
</form>


        <div class="container" style="text-align:center">
            <table class="table table-striped table-bordered table table-hover"  id="seachData" >
                <thead>
                     <tr>
                         <th>ลำดับ</th>
                         <th>วันที่</th>
                         <th>หมวดหมู่อุปกรณ์</th>
                         <th>หมายเลขอุปกรณ์</th>
                         <th>ใช้ประจำที่</th>
                         <th>สถานะ</th>
                         <th>รายละเอียด</th>
                         <th>Edit</th>
                         <th>Delete</th>
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
                        echo '  <td>'.$row['statuss_th'].'</td>';
                        echo '  <td>'.$row['statuss_detail'].'</td>';
                        echo '  <td><button type="button" class="btn btn-primary btn-xs" style="float: none;" onclick="doView('.$row['equipment_id'].')"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                        echo '  <td><button type="button" class="btn btn-danger btn-xs" style="float: none;" onclick="doView('.$row['equipment_id'].')"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
                        echo '</tr>';
                    $no++;

                     }
                  ?>
                </tbody>
            </table>
        </div>
        <br><br><br>




    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="jqueryui/jquery-ui.min.js"></script>
    <script src="js/jquery.tabledit.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="DataTables/media/js/jquery.dataTables.min.js"> </script>

    <script type="text/javascript">
    $(document).ready(function() {

      $(".date-picker").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat:  'yy-mm-dd'
      });


    var table = $('#seachData').DataTable({
      "bLengthChange": false,
      "pageLength":  10

    });

      $('#btnSerch').click(function(e){
        console.log("click search");
            var room_id = $('#room_id').val();
            var equipment_type = $('#equipment_type').val();
            var date = $('#date').val();
            var statuss = $('#statuss').val();

            $.ajax({
                method: 'POST',
                datatype: 'json',
                url: 'insertstatus.php',
                data: {
                    "room_id": room_id==null?"%":room_id,
                    "equipment_type": equipment_type==null?"%":equipment_type,
                    "statuss_date": date==""?"%":date,
                    "statuss_id": statuss==null?"%":statuss
                },
                success: function(res) {
                    var count = Object.keys(res).length;
                    console.log(count);
                    if(count > 0){
                        // table.clear();
                        $.each(JSON.parse(res), function(i, item){
                          console.log(res);
                            var edit = '<button type="button" class="tabledit-edit-button btn btn-sm btn-default" style="float: none;" onclick="doView('+item.equipment_id+')"><span class="glyphicon glyphicon-pencil"></span></button>';
                            var deleteData = '<button type="button" class="tabledit-edit-button btn btn-sm btn-default" style="float: none;" onclick="deleteData('+item.equipment_id+')"><span class="glyphicon glyphicon-trash"></span></button>';
                            table.row.add([item.equipment_id,item.statuss_date,item.equipment_type,item.equipment_num,item.room_id,item.statuss_th,item.statuss_detail,edit,deleteData]);
                            table.draw();
                        });
                    }else{
                        alert('ไม่มีข้อมูลแสดง.');
                    }
                }
            });
          });

    });
 </script>
</body>

</html>
