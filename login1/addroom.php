<?php
include("head.php");
 ?>

<!DOCTYPE html>
<html lang="en">

<body>

    <!-- Navigation -->


    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><a href="logout.php"><h5 align="left" style="padding-left:93%;color:black">
                  <i class="fa fa-sign-out" style="font-size:18px;color:black"></i> Log out</h5></a>
                  <a href="index.php">หน้าแรก </a>| ตั้งค่าห้อง </small>  &nbsp;
                <small>  </small>
              </h3>
            </div>
        </div>
        <br>

        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-info">
                 <div class="panel-heading"> เพิ่มห้อง</div>
                    <div class="panel-body">
                      <form id="formeq" action="" method="post">
                        <input type="hidden" name="_csrf" value="">
                          <div class="form-group field-devicetype-device_type">


                            <label class="control-label" for="devicetype-device_type">ชื่อห้อง</label>
                            <input type="text" id="room_num" class="form-control" name="room_num" maxlength="45">
                            <div class="help-block"></div>
                            <label class="control-label" for="devicetype-device_type">ชื่ออาคาร</label>
                            <input type="text" id="room_build" class="form-control" name="room_build" maxlength="45">
                            <div class="help-block"></div>
                            <label class="control-label" for="devicetype-device_type">ชั้น</label>
                            <input type="text" id="room_floor" class="form-control" name="room_floor" maxlength="45">
                            <div class="help-block"></div>
                            <label class="control-label" for="devicetype-device_type">ความสามารถในการจุคน</label>
                            <input type="text" id="room_capacity" class="form-control" name="room_capacity" maxlength="45">
                            <div class="help-block"></div>
                          </div>
                            <div class="form-group">
                              <button id="btnSave" type="button" class="btn btn-success">บันทึก</button>
                              <a class="btn btn-default" href="Setuproom.php">กลับ</a>
                            </div>
                         </form>
                      </div>
                </div>
          </div>
     </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="jqueryui/jquery-ui.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>



        <script>
        $('#btnSave').click(function(e){
            var num = $('#room_num').val();
            var build = $('#room_build').val();
            var floor = $('#room_floor').val();
            var capacity = $('#room_capacity').val();

          $.ajax({
            method: 'POST',
            data: {'action': 'add', 'room_num': num, 'room_build': build, 'room_floor': floor, 'room_capacity': capacity},
            url: 'manageroom.php',

            success: function(res){
                console.log(res);
                alert('บันทึกเรียบร้อยแล้ว.');
                window.location.href = 'Setuproom.php';
            }
          });
        });


        </script>


</body>

</html>
