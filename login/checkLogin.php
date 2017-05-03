<?php
include 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];



 $sql ='SELECT count(*),user_status FROM users WHERE user_username = "'.$username.'" and  user_password = "' .$password.'" ';
 $query = $conn->query($sql);
 $result = $query->fetch_array();

$row = $result[0];

if($row == 1){
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['status'] = $result[1];
  
    echo 'success';
}else{
  echo 'fail';

}


 ?>
