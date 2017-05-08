<?php
include 'connection.php';
session_start();

$action = $_POST['action'];
$param_code = $_POST['param_code'];
$param_endesc = $_POST['param_endesc'];
$param_thdesc = $_POST['param_thdesc'];

if("add" == $action){
  $addeq  = 'INSERT INTO parameterdetail (param_no,param_code, param_endesc, param_thdesc)
              VALUES (100, "'.$param_code.'", "'.$param_endesc.'", "'.$param_thdesc.'")';
  $conn->query($addeq);
}

if("edit" == $action){
  $updateaddeq = 'UPDATE parameterdetail SET param_code="'.$param_code.'",param_endesc="'.$param_endesc.'",
                  param_thdesc="'.$param_thdesc.'" WHERE param_no = 100 and param_code= "'.$param_code.'"';
  $conn->query($updateaddeq);
}

if("delete" == $action){
  $deleteaddeq = 'DELETE FROM parameterdetail WHERE param_code = "'.$param_code .'"';
  $conn->query($deleteaddeq);
  header("Location: addeq.php");

}





 ?>
