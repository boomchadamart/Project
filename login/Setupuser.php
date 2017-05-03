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
                  <i class="fa fa-sign-out" style="font-size:18px;color:black"></i> Log out</i></h5></a><a href="index.php">หน้าแรก </a>| ตั้งค่าบัญชีผู้ใช้งาน</small>  &nbsp;
                <small>  </small>
              </h3>
            </div>
        </div>
        <br>

        <p><a class="btn btn-success" href="adduser.php">เพิ่มผู้ใช้งานระบบ</a></p>

        <div id="" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
        <div id="" class="grid-view"><table class="table table-striped table-bordered"><colgroup><col>
        <col style="width:15%">
        <col style="width:15%">
        <col style="width:20%">
        <col style="width:20%">
        <col style="width:15%">
        <col style="width:10%;"></colgroup>
        <thead>
        <tr><th>#</th><th>
          <a href="">ชื่อผู้ใช้</a></th>
          <th><a href="">ตำแหน่ง</a></th>
          <th><a href="">เบอร์โทรศัพท์</a></th>
          <th><a href="">อีเมลล์</a></th>
          <th><a href="">สิทธิ์การใช้งานระบบ</a></th>
          <th class="action-column">แก้ไข/ลบ</th></tr>
        </thead>
        <tbody>

        </tbody></table>
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
