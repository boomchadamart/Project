<?php
    include 'connection.php';

    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_tel = $_POST['user_tel'];
    $user_password = $_POST['user_password'];
    // echo $user_username.' '.$user_email.' '.$user_tel.' '.$user_password;


    //Check username in database

    // $chkUser = mysqli_query($conn,"SELECT user_username FROM users WHERE user_username = .'$user_username'.");
    // $count = mysqli_num_rows($result);
    // echo $count; die();


    $chkuser = 'SELECT count(1) FROM users WHERE user_username = "'.$user_username.'"';
    $query = $conn->query($chkuser);
    $result = $query->fetch_array();

    $row = $result[0];
    if($row < 1){
      $sql = 'INSERT INTO users (user_username, user_email, user_tel, user_password)
              VALUES ("'.$user_username.'", "'.$user_email.'", "'.$user_tel.'", "'.$user_password.'")';

      $conn->query($sql);
      echo 'success';
    }else{
      echo 'fail';
    }



 ?>
