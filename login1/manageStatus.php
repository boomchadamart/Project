<?php
include 'connection.php';
session_start();

$action = $_POST['action'];
$user_id = $_POST['equipment_update_date'];
$user_username = $_POST['param_endesc'];
$user_password = $_POST['equipment_num'];
$user_position = $_POST['room_num'];
$user_tel = $_POST['statuss_id'];
$user_tel = $_POST['statuss_th'];
$user_email = $_POST['statuss_detail'];


if("edit" == $action){
  $updatestatus = 'UPDATE statuss SET statuss_th="'.$statuss_th.'",statuss_detail="'.$statuss_detail.'"
                   WHERE statuss_id = "'.$statuss_id.'"';
  $conn->query($updatestatus);
}

if("delete" == $action){
  $deletestatus = 'DELETE FROM statuss WHERE statuss_id = "'.$statuss_id.'"';
  $conn->query($deletestatus);

}





 ?>
