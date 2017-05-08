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
                <h3 class="page-header"><a href="logout.php"><h5 align="left" style="padding-left:93%;color:black"><i class="fa fa-sign-out" style="font-size:18px;color:black"></i> Log out</i></h5></a><a href="index.php">หน้าแรก </a>| ตั้งค่าบัญชีผู้ดูแลระบบ </small>  &nbsp;
                <small>  </small>
              </h3>
            </div>
        </div>
        <br>

<div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading"> เพิ่มผู้ใช้งานระบบ</div>
            <div class="panel-body">
              <form id="" class="form-horizontal">
                <input type="hidden" name="_csrf" value="">

                <div class="form-group field-user-fullname required">
                  <label class="control-label col-sm-3" for="user">ชื่อผู้ใช้</label>
                    <div class="col-sm-9">
                      <input type="text" id="user_username" class="form-control" name="user_username" maxlength="255">
                      <div class="help-block help-block-error "></div>
                    </div>
                </div>

                <div class="form-group field-user-password required">
                  <label class="control-label col-sm-3" for="password">รหัสผ่าน</label>
                    <div class="col-sm-9">
                    <input type="password" id="user_password" class="form-control" name="user_password">
                    <div class="help-block help-block-error "></div>
                    </div>
                </div>

                <div class="form-group field-user-position required">
                  <label class="control-label col-sm-3" for="user-position">ตำแหน่ง</label>
                    <div class="col-sm-9">
                    <input type="text" id="user_position" class="form-control" name="user_position" maxlength="255">
                    <div class="help-block help-block-error "></div>
                    </div>
                </div>

                <div class="form-group field-user-email">
                  <label class="control-label col-sm-3" for="user-email">เบอร์โทรศัพท์</label>
                    <div class="col-sm-9">
                    <input type="text" id="user_tel" class="form-control" name="user_tel" maxlength="255">
                    <div class="help-block help-block-error "></div>
                    </div>
                </div>

                <div class="form-group field-user-email">
                  <label class="control-label col-sm-3" for="user-email">อีเมลล์</label>
                    <div class="col-sm-9">
                    <input type="text" id="user_email" class="form-control" name="user_email" maxlength="255">
                    <div class="help-block help-block-error "></div>
                    </div>
                </div>

                <div class="form-group field-user-role required">
                  <label class="control-label col-sm-3" for="user-role">สิทธิ์การใช้งานระบบ</label>
                    <div class="col-sm-9">
                    <input type="hidden" name="user_status" value="">
                    <div id="user-role">
                      <div class="radio"><label>
                        <input type="radio" id="user_status" name="user_status" value="admin"> ผู้ดูแลระบบ </label>
                      </div>
                      <div class="radio"><label>
                        <input type="radio" id="user_status" name="user_status" value="user"> ผู้ใช้งานระบบ</label>
                      </div>
                    </div>
                    <div class="help-block help-block-error "></div>
                    </div>
                </div>

                <div class="form-group">
                  <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button id="btnSave" type="button" class="btn btn-success">บันทึก</button>
                  <a class="btn btn-default" href="Setupuser.php">กลับ</a></center>
                </div>


            </form>
          </div>
        </div>
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
        var username = $('#user_username').val();
        var password = $('#user_password').val();
        var position = $('#user_position').val();
        var tel = $('#user_tel').val();
        var email = $('#user_email').val();
        var status = $('#user_status').val();

      $.ajax({
        method: 'POST',
        data: {'action': 'add', 'user_username': username, 'user_password': password, 'user_position': position,
              'user_tel': tel, 'user_email': email, 'user_status': status},
        url: 'manageUser.php',

        success: function(res){
            console.log(res);
            alert('บันทึกเรียบร้อยแล้ว.');
            window.location.href = 'Setupuser.php';
        }
      });
    });


    </script>





</script>


</body>

</html>
