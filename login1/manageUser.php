<?php
include 'connection.php';
session_start();

$action = $_POST['action'];
$user_id = $_POST['user_id'];
$user_username = $_POST['user_username'];
$user_password = $_POST['user_password'];
$user_position = $_POST['user_position'];
$user_tel = $_POST['user_tel'];
$user_email = $_POST['user_email'];
$user_status = $_POST['user_status'];

if("add" == $action){
  $adduser  = 'INSERT INTO users (user_id, user_username, user_password, user_position, user_tel, user_email, user_status)
              VALUES ("'.$user_id.'","'.$user_username.'", "'.$user_password.'", "'.$user_position.'", "'.$user_tel.'",
                      "'.$user_email.'", "'.$user_status.'")';
  $conn->query($adduser);
}

if("edit" == $action){
  $updateadduser = 'UPDATE users SET user_username="'.$user_username.'",user_password="'.$user_password.'",
                   user_position="'.$user_position.'",user_tel="'.$user_tel.'",user_email="'.$user_email.'",user_status="'.$user_status.'"
                   WHERE user_id = "'.$user_id.'"';
  $conn->query($updateadduser);
}

if("delete" == $action){
  $deleteadduser = 'DELETE FROM users WHERE user_id = "'.$user_id.'"';
  $conn->query($deleteadduser);
  header("Location: adduser.php");

}





 ?>
