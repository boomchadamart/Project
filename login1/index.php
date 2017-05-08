<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <title>Information Support System For System Administration Managemen</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>


    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Kanit|Pridi" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body >
  <br>
    <a href="logout.php"><h5 align="left" style="padding-left:90%;color:white"><i class="fa fa-sign-out" style="font-size:18px;color:white"></i> Log out</i></h5></a>

  <div class="row" style="margin: 0px;">
    <div class="col-sm-3" align="right"><img src="img/logopsu.gif" width="110" height="150"></div>
    <div class="col-sm-8">
          <div class="brand" align="left">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Information Support System <br>For System Administration Management</div>
    </div>
  </div>




    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation"  style="  height: 86px;">
        <div class="container" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Information Support System For System Administration Management</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class="dropdown "><a href="#" id="drop1" data-toggle="dropdown" class="dropdown-toggle" role="button">ตั้งค่า <b class="caret"></b></a>
                      <ul role="menu" class="dropdown-menu" aria-labelledby="drop1">
                          <li role="presentation"><a href="SetupEq.php" role="menuitem"><i class="fa fa-gears" style="font-size:18px"></i> ตั้งค่าหมวดหมู่อุปกรณ์</a></li>
                          <li role="presentation"><a href="Setupuser.php" role="menuitem"><i class="fa fa-group" style="font-size:18px"></i> ตั้งค่าบัญชีผู้ดูแลระบบ</a></li>
                          <li role="presentation"><a href="Setuproom.php" role="menuitem"><i class="fa fa-desktop" style="font-size:18px"></i> ตั้งค่าห้อง</a></li>
                          <!-- <li role="presentation"><a href="SetupSW.php" role="menuitem"><i class="fa fa-desktop" style="font-size:18px"></i> ตั้งค่าซอฟต์แวร์ประยุกต์</a></li> -->
                  </li>
                  </ul>

                    <li class="dropdown "><a href="#" id="drop1" data-toggle="dropdown" class="dropdown-toggle" role="button">ข้อมูลคอมพิวเตอร์ <b class="caret"></b></a>
                        <ul role="menu" class="dropdown-menu" aria-labelledby="drop1">
                            <li role="presentation"><a href="savecom.php" role="menuitem"><i class="material-icons" style="font-size:16px">add_to_queue</i> บันทึกข้อมูลคอมพิวเตอร์</a></li>
                            <li role="presentation"><a href="status.php" role="menuitem"><i class="material-icons" style="font-size:16px">playlist_add_check </i> สถานะการใช้งาน</a></li>
                            <li role="presentation"><a href="dataall.php" role="menuitem"><i class="material-icons" style="font-size:16px">library_books</i> ข้อมูลคอมพิวเตอร์ทั้งหมด</a></li>
                    </li>
                    </ul>

                    <li class="dropdown "><a href="#" id="drop1" data-toggle="dropdown" class="dropdown-toggle" role="button">รายงาน <b class="caret"></b></a>
                        <ul role="menu" class="dropdown-menu" aria-labelledby="drop1">
                          <li role="presentation"><a href="reportSum.php">รายงานสรุป</a></li>
                            <li role="presentation"><a ="menuitem">รายงานด้านClient/Server management</a></li>
                          &nbsp;&nbsp;&nbsp;&nbsp;<a href="reportall.php">-ข้อมูลอุปกรณ์คอมพิวเตอร์</a><br>
                          &nbsp;&nbsp;&nbsp;&nbsp;<a href="reportserver.php">-ข้อมูลเซิร์ฟเวอร์</a>
                            <li role="presentation"><a ="menuitem">รายงานด้านConfiguration Management</a></li>
                          <!-- &nbsp;&nbsp;&nbsp;&nbsp;<a href="reportsoftware.php">-ข้อมูลซอฟต์แวร์</a><br> -->
                          &nbsp;&nbsp;&nbsp;&nbsp;<a href="reportHW.php">-ข้อมูลฮาร์ดแวร์</a><br>
                          &nbsp;&nbsp;&nbsp;&nbsp;<a href="reportborrow.php">-ข้อมูลการเช่า</a>
                            <li role="presentation"><a ="menuitem">รายงานด้านDesktop Management</a></li>
                          &nbsp;&nbsp;&nbsp;&nbsp;<a href="reportstatus.php">-ข้อมูลสถานะการใช้งาน</a>
                    </li>
                    </ul>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container" style="margin-top: 3%;">
    <div class="col-md-6 col-md-offset-3">
    <div class="row">
    <!-- <div id="logo" class="text-center">
    <h4>หมายเลขอุปกรณ์</h4>
    </div> -->
    <form role="form" id="form-buscar">
    <h4 style="color:white"> ค้นหา :</h4>
    <div class="form-group">
    <div class="input-group">
    <input id="1" class="form-control" type="text" name="search" placeholder="Search..." required/>
    <span class="input-group-btn">
    <button class="btn btn-success" type="submit">
  <i class="material-icons" style="font-size:10px">search</i> Search
    </button>
    </span>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
<br><br><br>
    <div class="row" style="margin: 0px;">
                <div class="col-lg-12">

                    <center>
                      <div class="intro-message">
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                          <h4><font COLOR=white>ติดต่อเรา</font></h4>
                            <li>
                                <a href="https://www.facebook.com/PSUuniversityTH"  target="_blank" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/PSU_Thailand"  target="_blank" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/user/bbrjiw/videos"  target="_blank" class="btn btn-default btn-lg"><i class="fa fa-youtube fa-fw"></i> <span class="network-name">Youtube</span></a>
                            </li>
                        </ul>
                          </center>

                    </div>
                </div>
  </div>

  <!-- <footer style="height:60px">
  <center>
    <br>Contact information: <a href="mailto:someone@example.com">someone@example.com</a>.</center>
  </footer> -->

</body>

</html>
