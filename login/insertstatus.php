<?php
include 'connection.php';
session_start();

$room_id = $_POST['room_id'];
$equipment_type = $_POST['equipment_type'];
$statuss_date = $_POST['statuss_date'];
$statuss = $_POST['statuss_id'];

$sql = 'SELECT  equipment.equipment_id AS "equipment_id",
                statuss.statuss_date,
                equipment.equipment_type,
                equipment.equipment_num,
                equipment.room_id,
                equipment.statuss_id,
                statuss.statuss_th,
                statuss.statuss_detail
                    FROM equipment
                    left JOIN computer ON equipment.equipment_id = computer.equipment_id
                    left JOIN servers ON equipment.equipment_id =servers.equipment_id
                    left JOIN hub ON  hub.equipment_id = equipment.equipment_id
                    left JOIN statuss ON equipment.statuss_id = statuss.statuss_code
           WHERE equipment.room_id = "'.$room_id.'"';

$result = $conn->query($sql);
$search = $result->fetch_array();

//       $arr = array();
//       $arr['statuss_date'] = $search['statuss_date'];
//       $arr['equipment_id'] = $search['equipment_id'];
//       $arr['equipment_num'] = $search['equipment_num'];
//       $arr['room_id'] = $search['room_id'];
//       $arr['statuss_id'] = $search['statuss_id'];
//       $arr['statuss_detail'] = $search['statuss_detail'];
// print_r($arr);
echo json_encode($search);
 ?>
