<?php
include 'connection.php';
session_start();

$equipment_id = $_POST['equipment_id'];
$equipment_type = $_POST['equipment_type'];
$equipment_num = $_POST['equipment_num'];
$equipment_brand = $_POST['equipment_brand'];
$room_id = $_POST['room_id'];
$equipment_date = $_POST['equipment_date'];
$equipment_HWdetail = $_POST['equipment_HWdetail'];
$computer_OS = $_POST['computer_OS'];
$computer_updateOS = $_POST['computer_updateOS'];
// $program_no = $_POST['program_no'];
$computer_start = $_POST['computer_start'];
$computer_end= $_POST['computer_end'];
$equipment_year = $_POST['equipment_year'];
$user = 'admin';

// echo $_SESSION['username']; die();
if(empty($equipment_id)){

$insertEquipment = 'INSERT INTO equipment (equipment_type, equipment_num, equipment_brand, room_id, equipment_date, equipment_HWdetail, equipment_year,	equipment_create_date,equipment_update_date, 	equipment_create_user, 	 equipment_update_user)
                VALUES ("'.$equipment_type.'", "'.$equipment_num.'", "'.$equipment_brand.'" , "'.$room_id.'", "'.$equipment_date.'", "'.$equipment_HWdetail.'", "'.$equipment_year.'", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, "'.$user.'" , "'.$user.'")';
$conn->query($insertEquipment);
if($equipment_type=1){

$insertCom = 'INSERT INTO computer (computer_OS, computer_updateOS, computer_start, computer_end, equipment_type, computer_create_date,computer_update_date,computer_create_user,computer_update_user)
        VALUES ("'.$computer_OS.'" , "'.$computer_updateOS.'", "'.$computer_start.'", "'.$computer_end.'", "'.$equipment_type.'", CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,"'.$user.'","'.$user.'")';
$conn->query($insertCom);
}
echo 'success';
}else {
    $updateEquipment = 'UPDATE equipment SET equipment_num="'.$equipment_num.'",equipment_brand="'.$equipment_brand.'",
                        equipment_date="'.$equipment_date.'",equipment_HWdetail="'.$equipment_HWdetail.'",equipment_type="'.$equipment_type.'",
                        equipment_update_date=CURRENT_DATE,equipment_update_user="'.$user.'",equipment_year="'.$equipment_year.'",room_id="'.$room_id.'"
                        WHERE equipment_id='.$equipment_id;
    $conn->query($updateEquipment);

    if($equipment_type=1){
        $updateCom = 'UPDATE computer SET equipment_type="'.$equipment_type.'",
        computer_OS="'.$computer_OS.'",computer_updateOS="'.$computer_updateOS.'",computer_start="'.$computer_start.'",computer_end="'.$computer_end.'",
        computer_update_date=CURRENT_DATE,computer_update_user="'.$user.'"
        WHERE equipment_id='.$equipment_id;
        $conn->query($updateEquipment);


    echo 'update';
    }
}
 ?>
