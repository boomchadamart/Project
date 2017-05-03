<?php
    include 'connection.php';


$equipment_type = $_POST['equipment_type'];


$sql = 'INSERT INTO equipment (equipment_type)
                VALUES ("'.$equipment_type.'")';


        $conn->query($sql);
        echo 'success';

 ?>
