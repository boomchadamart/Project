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
    <input type="text" id="" class="form-control" name="User" maxlength="255">
    <div class="help-block help-block-error "></div>
    </div>

    </div><div class="form-group field-user-password required">
    <label class="control-label col-sm-3" for="password">รหัสผ่าน</label>
    <div class="col-sm-9">
    <input type="password" id="password" class="form-control" name="password">
    <div class="help-block help-block-error "></div>
    </div>

    </div><div class="form-group field-user-position required">
    <label class="control-label col-sm-3" for="user-position">ตำแหน่ง</label>
    <div class="col-sm-9">
    <input type="text" id="user-position" class="form-control" name="User[position]" maxlength="255">
    <div class="help-block help-block-error "></div>
    </div>

    </div><div class="form-group field-user-email">
    <label class="control-label col-sm-3" for="user-email">เบอร์โทรศัพท์</label>
    <div class="col-sm-9">
    <input type="text" id="tel" class="form-control" name="tel" maxlength="255">
    <div class="help-block help-block-error "></div>
    </div>

    </div><div class="form-group field-user-email">
    <label class="control-label col-sm-3" for="user-email">อีเมลล์</label>
    <div class="col-sm-9">
    <input type="text" id="user-email" class="form-control" name="User[email]" maxlength="255">
    <div class="help-block help-block-error "></div>
    </div>



    </div><div class="form-group field-user-role required">
    <label class="control-label col-sm-3" for="user-role">สิทธิ์การใช้งานระบบ</label>
    <div class="col-sm-9">
    <input type="hidden" name="User[role]" value=""><div id="user-role"><div class="radio"><label><input type="radio" name="User[role]" value="1"> ผู้ดูแลระบบ </label></div>
    <div class="radio"><label><input type="radio" name="User[role]" value="0"> ผู้ใช้งานระบบ</label></div></div>
    <div class="help-block help-block-error "></div>
    </div>

    </div>

    						<div class="row">
    							<div class="col-md-12">
    								<div class="pull-right">
    								<button type="submit" class="btn btn-success">บันทึก</a></button>								<a class="btn btn-default" href="Setupuser.php">ยกเลิก</a>							</div>
    						</div>
    					</div>


                    </form>            </div>
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





</script>


</body>

</html>
