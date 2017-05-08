<?php
include("head.php");
?>


<body>
  <div class="row">
    <div class="col-4"> <p align = right><font size = "2"><a href="logout.php"> log out</a></p></font ></div>

<ul class="breadcrumb">
<li>หน้าแรก</li>
<li><a href="index.php">Admin</a></li>
<li>ข้อมูลนักเรียน</li>
<li>เพิ่มข้อมูลนักเรียน</li>
</ul>
  <div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading">
     <div class="col-8">

              <h3 class="page-header"> <i class="material-icons" style="font-size:36px">person_add </i> เพิ่มข้อมูลนักเรียน </h3>
            </div>
            </div>
            <div class="panel-body">
        <div class="container">

						<form id="formDataStudents">   <!--ล้างข้อมูล-->
<table>
 <br>
          <tr><td> <h4>รหัสนักเรียน :&nbsp; &nbsp;&nbsp;</td>
        <td colspan="2"><h4><input type="text" name="id_student" value="" size="20" maxlength="10"/></h4></h4></td></tr>
<td><br></td>


                  <tr><td><h4>  คำนำหน้า : &nbsp;  &nbsp; &nbsp;&nbsp; </h4></td>
                    <td><div class="col-xs-13">
											<select class="form-control" name="tname" id="tname" data-width="fit">
<option value="">--- เลือกคำนำหน้า --- </option>
<option value="เด็กชาย">เด็กชาย</option>
<option value="เด็กหญิง">เด็กหญิง</option>
<option value="นาย">นาย</option>
<option value="นางสาว">นางสาว</option>
</select></td>

<td><h4>&nbsp; &nbsp;  &nbsp;  ชื่อ : &nbsp;  <input type="text" name="fname" value="" size="20" maxlength="15"/>
  &nbsp; นามสกุล : &nbsp;<input type="text" name="lname" value="" size="20" maxlength="15"/></td></tr></table>

  <td><br></td>

  <table>
      <tr><td><h4>  ระดับชั้น : &nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </h4></td>
            <td>
                <div class="col-xs-13">
                  <select class="form-control" name="level" id="level" data-width="fit">
                    <option value="">--- เลือกระดับชั้น --- </option>
                    <option value="ประถมศึกษา">ประถมศึกษา</option>
                    <option value="มัธยมศึกษา">มัธยมศึกษา</option>
                  </select>
                </div>
            </td>

      <td><h4>&nbsp; &nbsp; &nbsp; &nbsp;  ปีที่ : &nbsp;  </h4></td>
            <td>
                <div class="col-xs-15">
                  <select class="form-control" name="class" id="class" data-width="fit">
                    <option value="">--- เลือกปี --- </option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select></td></tr>
                </div>
            </td>
    </table>


<table>
<td><br></td>
<tr>
        <td><h4>วันเกิด :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h4></td>
        <td colspan="2">
            <div class="form-group"><input type="date" id="birthday" name="birthday" class="form-control"></div></td>


        <td><h4> &nbsp; &nbsp; &nbsp; หมู่เลือด : &nbsp; &nbsp; &nbsp;&nbsp; </h4></td>
          <td>
            <div class="col-xs-13">
              <select class="form-control" name="bloodtype" id="bloodtype" data-width="fit">
                <option value="">--- เลือกหมู่เลือด --- </option>
                <option value="O">O</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="อื่นๆ">อื่นๆ</option>
              </select>
          </td>
        </tr>


<tr><td><td></td><td></td></td></tr>
</table>

<table>
  <td><br></td>
<tr>
    <td valign="top"><h4>โรคประจำตัว :&nbsp;&nbsp;</h4></td>
    <td><textarea name="disease" rows="7" cols="40" wrap="physical"></textarea></td>
    <td valign="top"><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;แพ้ยา :&nbsp;&nbsp;</h4></td>
    <td><textarea name="intolerance" rows="7" cols="40" wrap="physical"></textarea></td>
</tr>
</table>
        </div>

        <br><br><br><br><br><br>

    </center>
<br><br>

<script language="javascript"></script>
<center>
<button id="btnSave" type="button" class="btn btn-success btn-sm" name="save" value="save"><span class = "glyphicon glyphicon-ok"></span> บันทึก</button> &nbsp;
<button type="reset" class="btn btn-danger btn-sm" name="reset" value="Reset"><span class = "glyphicon glyphicon-remove"></span> ล้าง</button> &nbsp;
<a href="index.php"><button type="button" class="btn btn-warning" name="back" value="back">ย้อนกลับ</button></a>

</form>




        </center>
        <br><br>
          </div>
  </div>
  </div>
</div>
</div>
    </div>
    <!--  <style>
            table,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
            }

            th,
            td {
                padding: 5px;
                text-align: left;
            }
        </style> -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!-- Bootstrap Core JavaScript -->
<script>
$('#btnSave').click(function(e){

	var data =  $('#formDataStudents').serialize();
	console.log("this is: "+data);
	$.ajax({
		method: 'POST',
		datatype: 'String',
		data: data,
		url: 'insertstudent.php',

		success: function(res){
				console.log(res);
				if(res=='success'){window.location.href = 'addtreatstudents.php';
					alert('Save Successfully.');
				}
		}
	});
});


</script>


</body>

</html>
