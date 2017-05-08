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
        <div id="" class="grid-view">
      <table id="edituser" class="table table-striped table-bordered"><colgroup><col>
        <col style="width:15%">
        <col style="width:15%">
        <col style="width:18%">
        <col style="width:15%">
        <col style="width:20%">
        <col style="width:12%;"></colgroup>
        <thead>
        <tr>
          <th>ลำดับ</th>
          <th style="display: none;">ไอดีผู้ใช้งาน</th>
          <th>ชื่อผู้ใช้</th>
          <th>รหัสผู้ใช้</th>
          <th>ตำแหน่ง</th>
          <th>เบอร์โทรศัพท์</th>
          <th>อีเมลล์</th>
          <th>สิทธิ์การใช้งานระบบ</th>
        </tr>
        </thead>
        <tbody>
          <?php
           include 'connection.php';
             $users = 'SELECT user_id, user_username, user_password, user_position, user_tel, user_email, user_status
                        FROM users';
             $setupusers = $conn->query($users);

             $no = 1;
             while ($row = $setupusers->fetch_array()) {
                echo '<tr>';
                echo '  <td>'.$no.'</td>';
                echo '  <td style="display: none;">'.$row['user_id'].'</td>';
                echo '  <td>'.$row['user_username'].'</td>';
                echo '  <td>'.$row['user_password'].'</td>';
                echo '  <td>'.$row['user_position'].'</td>';
                echo '  <td>'.$row['user_tel'].'</td>';
                echo '  <td>'.$row['user_email'].'</td>';
                echo '  <td>'.$row['user_status'].'</td>';
                echo '</tr>';
                $no++;
             }
          ?>
        </tbody></table>
        </div>
        </div>
   </div>




    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="jqueryui/jquery-ui.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="js/jquery.tabledit.js"></script>

    <script>

      $(document).ready(function() {
        //XXX Setting company table
        $('#edituser').Tabledit({
            url: 'manageUser.php',
            columns: {
                identifier: [1, 'user_id'],
                editable: [ [2, 'user_username'], [3, 'user_password'], [4, 'user_position'],
                          [5, 'user_tel'], [6, 'user_email'], [7, 'user_status','{"admin": "admin","user": "user"}'] ]
            },
            onAjax: function(action, serialize) {
                window.location.reload;
           }
        });
    });

    </script>



</script>


</body>

</html>
