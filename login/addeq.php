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
                <h3 class="page-header"><a href="logout.php"><h5 align="left" style="padding-left:93%;color:black"><i class="fa fa-sign-out" style="font-size:18px;color:black"></i> Log out</i></h5></a><a href="index.php">หน้าแรก </a>| ตั้งค่าหมวดหมู่อุปกรณ์ </small>  &nbsp;
                <small>  </small>
              </h3>
            </div>
        </div>
        <br>

        <div class="col-sm-offset-2 col-sm-8">

            <div class="panel panel-info">
                 <div class="panel-heading"> เพิ่มหมวดหมู่อุปกรณ์</div>
                    <div class="panel-body">

        			    <form id="formeq" action="" method="post">
        <input type="hidden" name="_csrf" value="">
        			    <div class="form-group field-devicetype-device_type">
        <label class="control-label" for="devicetype-device_type">หมวดหมู่อุปกรณ์</label>
        <input type="text" id="equipment_type" class="form-control" name="equipment_type" maxlength="45">

        <div class="help-block"></div>
        </div>
        			    <div class="form-group">
        			        <button id="btnSave" type="button" class="btn btn-success">บันทึก</button>			    	<a class="btn btn-default" href="SetupEq.php">กลับ</a>			    </div>

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



        <script>
        $('#btnSave').click(function(e){

        	var data =  $('#formeq').serialize();
        	console.log("this is: "+data);
        	$.ajax({
        		method: 'POST',
        		datatype: 'String',
        		data: data,
        		url: 'insertaddeq.php',

        		success: function(res){
        				console.log(res);
        				if(res=='success'){
        					alert('Save Successfully.');
        				}
        		}
        	});
        });


        </script>



</script>


</body>

</html>
