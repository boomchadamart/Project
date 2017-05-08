<?php
include 'connection.php';
session_start();

$action = $_POST['action'];
$room_id = $_POST['room_id'];
$room_num = $_POST['room_num'];
$room_build = $_POST['room_build'];
$room_floor = $_POST['room_floor'];
$room_capacity = $_POST['room_capacity'];

if("add" == $action){
  $addroom  = 'INSERT INTO room (room_id,room_num, room_build, room_floor, room_capacity)
              VALUES ("'.$room_id.'","'.$room_num.'", "'.$room_build.'", "'.$room_floor.'", "'.$room_capacity.'")';
  $conn->query($addroom);
}

if("edit" == $action){
  $updateaddroom = 'UPDATE room SET room_num="'.$room_num.'",room_build="'.$room_build.'",
                   room_floor="'.$room_floor.'",room_capacity="'.$room_capacity.'"
                   WHERE room_id = "'.$room_id.'"';
  $conn->query($updateaddroom);
}

if("delete" == $action){
  $deleteaddroom = 'DELETE FROM room WHERE room_id = "'.$room_id.'"';
  $conn->query($deleteaddroom);
  header("Location: addroom.php");

}





 ?>
