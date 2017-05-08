<?php
include("head.php");
 ?>
<!DOCTYPE html>
<html lang="en">


<body>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><a href="logout.php"><h5 align="left" style="padding-left:93%;color:black"><i class="fa fa-sign-out" style="font-size:18px;color:black"></i> Log out</i></h5></a><a href="index.php">หน้าแรก </a>| บันทึกข้อมูลคอมพิวเตอร์ </small>  &nbsp;
            </div>
        </div>
        <div class="row"> <font size="3">
    <ul class="nav nav-tabs">
    <li class="active"><a href="savecom.php">เพิ่มข้อมูลคอมพิวเตอร์</a></li>
    <li><a href="saveser.php">เพิ่มข้อมูลเซิร์ฟเวอร์</a></li>
    <li><a href="saveeq.php">เพิ่มข้อมูลอุปกรณ์คอมพิวเตอร์</a></li>
    </ul>
        </font></div>
<div class="panel panel-info">
  <div class="panel-body">
    <div class="container">
      <form id="formData">
        <?php
            if(!empty($_GET['id'])){
                  include 'connection.php';
                  $sql3 = 'SELECT equipment.equipment_id,
                             type.param_code,
                             type.param_endesc,
                             equipment.equipment_num,
                             equipment.equipment_brand,
                             room.room_id,
                             room.room_num,
                             equipment.equipment_date,
                             equipment.equipment_HWdetail,
                             computer.computer_OS,
                             computer.computer_updateOS,
                             computer.computer_start,
                             computer.computer_end,
                             equipment.equipment_year
                       FROM equipment
                       left JOIN computer
                       ON equipment.equipment_id =computer.equipment_id
                       JOIN parameterdetail type
                       ON type.param_code = equipment.equipment_type AND type.param_no = 100 AND type.param_code=1
                       JOIN room ON room.room_id = equipment.room_id
                       WHERE equipment.equipment_id = '.$_GET['id'].' order by type.param_code';
                       $queryy = $conn->query($sql3);
              while ($data = $queryy->fetch_array()) {
        ?>

        <center style="padding-right:4%;">
          <input type="hidden" value="<?php echo $data['equipment_id'] ?>" name="equipment_id"/>
        <table>&nbsp;
               <tr><td><font size="3 "align="left" >
                  <?php
                     $sql2 = 'SELECT param_code,param_endesc FROM parameterdetail where param_no =100 and param_code =1  order by param_code';
                     $result2 = $conn->query($sql2);
                   ?>
                   หมวดหมู่อุปกรณ์ <font COLOR=red>*</font> : </td></font>
                      <td><font size="3 " align="left" ><select class="selectpicker show-tick" name="equipment_type">
                       <?php
                       while ($type = $result2->fetch_array()) {
                          if($type['param_code'] == $data['param_code']){
                              echo '  <option value="'.$type['param_code'].'" selected>'.$type['param_endesc'].'</option>';
                          }
                          echo '  <option value="'.$type['param_code'].'">'.$type['param_endesc'].'</option>';
                       }
                       ?>
                     </select>  </font></tr></td>
                     <td><br></td>


          <tr><td><font size="3 "align="left">หมายเลขอุปกรณ์ <font COLOR=red>*</font> : </font></td><td><font size="3 "align="left">
            <input type="text" name="equipment_num" value="<?php echo $data['equipment_num']; ?>"/></font> &nbsp;<font size="3 "align="left">
            ยี่ห้อ-รุ่น <font COLOR=red>*</font> : <input type="text" name="equipment_brand" value="<?php echo $data['equipment_brand'] ?>" /></font> &nbsp;
            <?php
            $sql = 'SELECT room_id,room_num FROM room';
            $result = $conn->query($sql);
            ?>

            <font size="3">ใช้ประจำที่  :
                <select class="selectpicker show-tick" name="room_id">
                <?php
                  while ($room = $result->fetch_array()) {
                    if($room['room_id'] == $data['room_id']){
                      echo '  <option value="'.$room['room_id'].'" selected>'.$room['room_num'].'</option>';
                    }
                    echo '  <option value="'.$room['room_id'].'">'.$room['room_num'].'</option>';
                  }
                 ?>
                </select>
            </font></td></tr>

            <td><br></td>


             <tr><td><font size="3 "align="left"> วันที่รับเข้ามา <font COLOR=red>*</font> : </font></td><td>
             <font size="3 "align="left"><input id="datepicker" class="date-picker" type="text" name="equipment_date" value="<?php echo $data['equipment_date'] ?>">
             &nbsp;<i class="fa fa-calendar" style="font-size:24px"></i></font></td></tr>


            <td><br></td>

            <tr><td valign="top"><font size="3 "align="left" >รายละเอียดฮาร์ดแวร์ <font COLOR=red>*</font> : </td></font>
                  <td colspan="3"><font size="3 " align="left" ><textarea rows="4" cols="70" name="equipment_HWdetail"><?php echo $data['equipment_HWdetail'] ?></textarea></font></td>
            </tr><font>

            <td><br></td>

            <tr>
                <td>
                    <font size="3"align="left" >ซอฟต์แวร์ระบบ: </font>
                </td>
                <td>
                    <font size="3 " align="left" >
                        <input type="text" name="computer_OS"  value="<?php echo $data['computer_OS']?>"/>
                    </font>&nbsp;
                    <font size="3 " align="left" >อัพเดทล่าสุด: </font>
                        <input type="text" class="date-picker" name="computer_updateOS" value="<?php echo $data['computer_updateOS']?>">
                    </font>
                </td>
            </tr>

        <td><br></td>

      <tr><td><font size="3 "align="left">
          อุปกรณ์เช่า &nbsp;&nbsp;เริ่มเช่า: <font></td> <td><font size="3 "align="left"><input type="text" class="date-picker" name="computer_start" value="<?php echo $data['computer_start'] ?>"></font>
            <font size="3 "align="left">สิ้นสุด: <input class="date-picker" type="text" name="computer_end" value="<?php echo $data['computer_end'] ?>"></td>
          </tr></font>

      <td><br></td>


            <tr><td><font size="3 "align="left">ปีงบประมาณ <font COLOR=red>*</font> : </font></td><td><font size="3 "align="left">
              <input type="text" name="equipment_year" value="<?php echo $data['equipment_year']?>">
            </tr></td></font>
          </table>
        <br>

        <center><button id="btnSave" type="submit" style="font-size:16px;color:green">บันทึก<i class="fa fa-check-square-o"></i></button>
         <button type="reset" style="font-size:16px;color:red">ยกเลิก <i class="fa fa-close"></i></button></center>
            <br>
     </form>

        <?php
              }
            }else{
        ?>

        <center style="padding-right:4%;">
          <input type="hidden" name="equipment_id" value=""/>
            <table>
              <tr><td><font size="3 " align="left" font-size="14 px">
               <?php
                 include 'connection.php';
                 $sql2 = 'SELECT param_code,param_endesc FROM parameterdetail where param_no =100 and param_code=1 order by param_code';
                 $result2 = $conn->query($sql2);
               ?>
               หมวดหมู่อุปกรณ์ <font COLOR=red>*</font> :</font></td>
                  <td><font size="3 " align="left" >
                    <select class="selectpicker show-tick" name="equipment_type" required="required">
                   <?php
                   while ($type = $result2->fetch_array()) {
                     echo '  <option value="'.$type['param_code'].'">'.$type['param_endesc'].'</option>';
                   }
                   ?>
                 </select></td> </font></tr>

                <td><br></td>

                       <tr><td><font size="3 " align="left" >หมายเลขอุปกรณ์ <font COLOR=red>*</font> : </font></td><td><font size="3 " align="left" ><input type="text" name="equipment_num" /></font>
                        &nbsp;<font size="3 " align="left" >ยี่ห้อ-รุ่น <font COLOR=red>*</font> : <input type="text" name="equipment_brand" /></td>
                        &nbsp; </font></tr>

                <td><br></td>

                         <tr><td><font size="3 "align="left">
                           <?php
                             $sql = 'SELECT room_id,room_num FROM room';
                             $result = $conn->query($sql);
                             ?>

                ใช้ประจำที่ :</font></td>
                  <td> <font size="3 " align="left" ><select class="selectpicker show-tick" name="room_id">
                   <?php
                     while ($room = $result->fetch_array()) {
                       echo '  <option value="" disabled selected hidden></option>';
                       echo '  <option value="'.$room['room_id'].'">'.$room['room_num'].'</option>';
                     }
                    ?>
                  </font></select>
              &nbsp;<font size="3 " align="left" >วันที่รับเข้ามา <font COLOR=red>*</font> : <input id="datepicker" class="date-picker" type="text" name="equipment_date" ></font>
              &nbsp;<i class="fa fa-calendar" style="font-size:24px"></i></td></tr><font>
              <td><br></td>

              <tr><td valign="top"><font size="3 "align="left" >รายละเอียดฮาร์ดแวร์ <font COLOR=red>*</font> : </td></font>
                    <td colspan="3"><font size="3 " align="left" ><textarea rows="4" cols="70" name="equipment_HWdetail"></textarea></font></td>
                  </tr><font>

              <td><br></td>

                  <tr><td><font size="3"align="left" >ซอฟต์แวร์ระบบ: </font></td><td><font size="3 " align="left" ><input type="text" name="computer_OS" /></font>
                    &nbsp;<font size="3 " align="left" >อัพเดทล่าสุด: <input type="text" class="date-picker" name="computer_updateOS"></td></tr></front>

              <td><br></td>

            <tr><td><font size="3 "align="left">
                อุปกรณ์เช่า &nbsp;&nbsp;เริ่มเช่า: <font></td> <td><font size="3 "align="left"><input type="text" class="date-picker" name="computer_start" value=""></font>
                  <font size="3 "align="left">สิ้นสุด: <input class="date-picker" type="text" name="computer_end" value=""></td>
                </tr></font>

            <td><br></td>

                <tr><td><font size="3 "align="left" >ปีงบประมาณ <font COLOR=red>*</font> : </font></td><td><font size="3 "align="left"><input type="text" name="equipment_year"></td>
                </tr></font>

            <td><br></td>


      </table>
      </center>
      <center><button id="btnSave" type="submit" style="font-size:16px;color:green">บันทึก<i class="fa fa-check-square-o"></i></button>
       <button type="reset" style="font-size:16px;color:red">ยกเลิก <i class="fa fa-close"></i></button></center>
       <br>
       </form>
         <?php } ?>
     </div>
   </div>
</div>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="jqueryui/jquery-ui.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <script src="jquery-validation/jquery-validate.bootstrap-tooltip.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".date-picker").datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat:  'yy-mm-dd'
        });
      });

        $("#formData").validate({
            rules: {
              equipment_type: "required",
              equipment_num: "required",
              equipment_brand: "required",
              equipment_date: "required",
              equipment_HWdetail: "required",
              equipment_year: "required"
            },

            submitHandler: function(e){
              console.log("submit!");
              var data =  $('#formData').serialize();
              console.log("this is: " +data);
              $.ajax({
                  method: 'POST',
                  datatype: 'String',
                  data: data,
                  url: 'insertsavecom.php',

                  success: function(res){
                      console.log(res);
                      if(res=='success'){
                        alert('บันทึกข้อมูลเรียบร้อยแล้ว.');
                        window.location.reload();
                      }else {
                        alert('บันทึกข้อมูลที่เปลี่ยนแปลงแล้ว');
                        window.location.href="dataall.php";
                      }
                  },error    : function(err){
                      alert('กรุณาลองอีกครั้ง.');
                  }
                 });
                 }
                 });
                 </script>
</body>

</html>
