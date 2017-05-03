<?php
include("head.php");
 ?>
<!DOCTYPE html>
<html lang="en">

<head>


<body>

    <!-- Navigation -->


    <!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><a href="logout.php"><h5 align="left" style="padding-left:93%;color:black"><i class="fa fa-sign-out" style="font-size:18px;color:black"></i> Log out</i></h5></a><a href="index.php">หน้าแรก&nbsp;</a>| ข้อมูลคอมพิวเตอร์ทั้งหมด</small>  &nbsp;
                <small>  </small>
              </h3>
            </div>
        </div>

<br>

<form>
    <p>  <?php
      include 'connection.php';
      $sql = 'SELECT room_id,room_num FROM room';
      $result = $conn->query($sql);
      ?>

        &nbsp;&nbsp;&nbsp;&nbsp;<font size="3">ใช้ประจำที่ :
        <select class="selectpicker show-tick" >
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
           <select class="selectpicker show-tick">
            <?php
            while ($type = $result2->fetch_array()) {
              echo '  <option value="" disabled selected hidden></option>';
              echo '  <option value="'.$type['param_code'].'">'.$type['param_endesc'].'</option>';
            }
            ?>
          </select>  <button style="font-size:16px;color:green" id="btnSerch" type="button">ค้นหา <i class="fa fa-search"></i></button></p><br>
</form>



  <!-- <table id="seachData" border="2" style="text-align:center" cellpadding="10" cellspacing="6" width="100%" > -->
  <div class="container" style="text-align:center">
    <table class="table table-striped table-bordered table table-hover" cellspacing= 0 id="seachData" >
      <thead>
        <tr>
       	<th>ลำดับ</th>
       <th>วันที่รับเข้ามา</th>
       <th>หมวดหมู่อุปกรณ์</th>
       <th>หมายเลขอุปกรณ์</th>
       <th>ยี่ห้อรุ่น</th>
       <th>ใช้ประจำที่</th>
       <th>Edit</th>
       <th>Delete</th>
       </tr>
    </thead>
    <tbody>
      <?php
         $search = 'SELECT equipment.equipment_id AS "equipment_id",
                           equipment.equipment_date,
                           equipment.equipment_type,
                           type.param_endesc,
                           equipment.equipment_num,
                           equipment.equipment_brand,
                           room.room_num
                     FROM equipment
                     left JOIN computer ON equipment.equipment_id = computer.equipment_id
                     left JOIN servers ON equipment.equipment_id =servers.equipment_id
                     left JOIN hub ON  hub.equipment_id = equipment.equipment_id
                     JOIN parameterdetail type ON type.param_code = equipment.equipment_type AND type.param_no = 100
                     JOIN room ON room.room_id = equipment.room_id';
         $status = $conn->query($search);

         $no = 1;
         while ($row = $status->fetch_array()) {
            echo '<tr>';
            echo '  <td>'.$no.'</td>';
            echo '  <td>'.$row['equipment_date'].'</td>';
            echo '  <td>'.$row['param_endesc'].'</td>';
            echo '  <td>'.$row['equipment_num'].'</td>';
            echo '  <td>'.$row['equipment_brand'].'</td>';
            echo '  <td>'.$row['room_num'].'</td>';
            echo '  <td><button type="button" class="btn btn-primary btn-xs" style="float: none;" onclick="doView('.$row['equipment_id'].','.$row['equipment_type'].')"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
            echo '  <td><button type="button" class="btn btn-danger btn-xs" style="float: none;" onclick="deletedata('.$row['equipment_id'].')"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
            echo '</tr>';
            $no++;
         }
      ?>
     <tbody>
  </table>
</div>
<br><br><br>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="DataTables/media/js/jquery.dataTables.min.js"> </script>

    <script>
    $(document).ready(function() {
      var table = $('#seachData').DataTable({
        "bLengthChange": false,
        "pageLength":  10
      });
    });

    function doView(id,type){
      //if type = 'computer'
      if(type == '1'){
        window.location.href="savecom.php?id="+id;
      }else if (type == '2') { // type = 'server'
        window.location.href="saveser.php?id="+id;
      }else{
        window.location.href="saveeq.php?id="+id;
      }
    }

    function deletedata(id){
      $.ajax({
        method: 'get',
        data: {id: id},
        type: 'String',
        url: 'deletedataall.php',
        success: function(res){
          console.log(res);
          alert("ลบข้อมูลเรียบร้อยแล้ว.");
          window.location.reload();
        }
      });
    }

    </script>



</body>

</html>
