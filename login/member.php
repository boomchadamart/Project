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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Signup / Registration form using Material Design - Demo by W3lessons</title>
    <!-- CORE CSS-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

    <style type="text/css">
    html,
    body {
      height: 100%;
    }
    html {
      display: table;
      margin: auto;
    }
    body {
      display: table-cell;
      vertical-align: middle;
    }
    .margin {
    margin: 0 !important;
    }
    </style>

</head>
<body>
  <br>

    <div class="brand"><center>Information Support System <br>For System Administration Management
    </center></div>

    <!-- Navigation -->


    <div id="login-page" class="row">
      <div class="col s12 z-depth-6 card-panel">
        <form class="login-form" id="formDataLogin" method="post">
          <div class="row">
            <div class="input-field col s12 center">
              <img src="img/2.jpg"  width="150" height="150" alt="" class="responsive-img valign profile-image-login">
              <h5 class="center login-form-text"><b>Sign Up </b></h5>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <label class="sr-only" for="username">Username</label>
              <input type="text" name="user_username" placeholder="Username..." class="form-username form-control" id="user_username" required="true">
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-communication-email prefix"></i>
              <label class="sr-only" for="email">Email</label>
              <input type="text" name="user_email" placeholder="Email..." class="form-email form-control" id="user_email">
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-communication-phone prefix"></i>
              <label class="sr-only" for="tel">Tel</label>
              <input type="tel" name="user_tel" placeholder="Tel..." class="form-email form-control" id="user_tel">
            </div>
          </div>
          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-lock-outline prefix"></i>
              <label class="sr-only" for="password">Password</label>
              <input type="password" name="user_password" placeholder="Password..." class="form-password form-control" id="user_password">
            </div>
          </div>

          <div class="row margin">
            <div class="input-field col s12">
              <i class="mdi-action-lock-outline prefix"></i>
              <label class="sr-only" for="user_confirm">Confirm Password</label>
              <input type="password" name="user_confirm" placeholder="Confirm Password..." class="form-password form-control" id="user_confirm">
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <button type="submit" id="btnSave" class="btn waves-effect waves-light col s12">Register Now</button>
              <!-- <a id="btnSave" class="btn waves-effect waves-light col s12">Register Now</a> -->
            </div>
            <div class="input-field col s12">
              <p class="margin center medium-small sign-up">Already have an account? <a href="login.php">Login</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.validate.min.js"></script>

    <script type="text/javascript">

    $('#btnSave').click(function(e){
      console.log("click save")
      $("#formDataLogin").validate({
        rules: {
          user_username: "required",
          user_password: {
            required: true,
            minlength: 6
          },
          user_confirm: {
            required: true,
            minlength: 6,
            equalTo: "#user_password"
          },
          user_tel: {
            required: true,
            number: true,
            minlength:10
          },
          user_email: {
            required: true,
            email: true
          }
        },
        messages: {
          user_username: "กรุณากรอกชื่อผู้ใช้",
          user_password: {
              required: "กรุณากรอกรหัสผ่าน",
              minlength: "รหัสผ่านควรมีอย่างน้อย 6 ตัวอักษร"
          },
        user_confirm: {
          required: "กรุณากรอกรหัสผ่านอีกครั้ง",
          minlength: "รหัสผ่านควรมีอย่างน้อย 6 ตัวอักษร",
          equalTo: "กรุณากรอกรหัสผ่านอีกครั้ง รหัสผ่านไม่ตรงกัน"
      },
      user_tel: {
          required: "กรุณากรอกเบอร์โทรศัพท์",
          matches: "รูปแบบเบอร์โทรศัพท์ไม่ถูกต้อง",
          minlength: "เบอร์โทรศัพท์ควรมีอย่างน้อย 10 ตัวเลข"

      },
      user_email: {
          required:"กรุณากรอกอีเมลของคุณ",
          email: "รูปแบบอีเมลไม่ถูกต้อง กรุณากรอกใหม่อีกครั้ง"
      }
    },

				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
				},

    submitHandler: function(e){
      var data =  $('#formDataLogin').serialize();
      console.log("this is: "+data);
      $.ajax({
        method: 'POST',
        datatype: 'String',
        data: data,
        url: 'insertmember.php',

        success: function(res){
            console.log(res);
            if(res=='success'){
              window.location.href = 'index.php';
              alert('บันทึกข้อมูลเรียบร้อยแล้ว.');
            }else if (res === "fail"){
                alert('มีชื่อผู้ใช้นี้แล้ว.');
            }
          },error    : function(err){
              alert('กรุณาลองอีกครั้ง.');
          }
        });
    }

  });
});

    </script>


</body>

</html>
