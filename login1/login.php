<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Information Support System For System Administration Management</title>

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Kanit|Pridi" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
          body,html{
            font-family: 'Kanit', sans-serif;
            font-family: 'Pridi', serif;
          }
        </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Favicon and touch icons -->

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>
    <!-- Top content -->
    <br><br><div class="top-content">

            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1><strong>Information Support System </strong> <br>For System Administration Management</h1>
                        <div class="description">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6  col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3><strong>Faculty of Management Science <br>Prince of Songkla University</strong></h3>

                            </div>
                            <div class="form-top-right">
                              <img src="img/login.png" width="100" height="100">
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="login.php" method="post" class="login-form">
                                <div class="form-group">
                                    <label class="sr-only" for="username">Username</label>
                                    <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="username">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password">
                                </div>
                                <button type="button" class="btn" id="btnLogin"><i class="fa fa-sign-in" style="font-size:18px"></i> Log in</button>
                                <br><a href="member.php"><center><u>Sign Up</u></center></a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

    </div>

    </div>
    

    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
    <script>
        $('#btnLogin').click(function(e){
          var username = $('#username').val();
          var password = $('#password').val();

          $.ajax({
            method: 'POST',
            datatype: 'String',
            data: {username:username, password:password},
            url: 'checkLogin.php',
            success: function(res){
                console.log(res);
                if(res == 'success'){
                  window.location.href = 'index.php';
                }else {
                  alert('username หรือ password ไม่ถูกต้อง');
                }
            }
          });
        });
    </script>


</body>

</html>
