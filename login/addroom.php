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
                <h3 class="page-header"><a href="logout.php"><h5 align="left" style="padding-left:93%;color:black">
                  <i class="fa fa-sign-out" style="font-size:18px;color:black"></i> Log out</i></h5></a><a href="index.php">หน้าแรก </a>| ตั้งค่าใช้ประจำที่ </small>  &nbsp;
                <small>  </small>
              </h3>
            </div>
        </div>
        <br>

        <div class="col-sm-offset-2 col-sm-8">

            <div class="panel panel-info">
                 <div class="panel-heading"> เพิ่มห้อง</div>
                    <div class="panel-body">

        			    <form id="" action="" method="post">
        <input type="hidden" name="_csrf" value="">
        			    <div class="form-group field-devicetype-device_type">
        <label class="control-label" for="devicetype-device_type">ใช้ประจำที่</label>
        <input type="text" id="addroo," class="form-control" name="addroom" maxlength="45">

        <div class="help-block"></div>
        </div>
        			    <div class="form-group">
        			        <button type="submit" class="btn btn-success">บันทึก</button>			    	<a class="btn btn-default" href="Setuproom.php">กลับ</a>			    </div>

        			    </form>			</div>
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
