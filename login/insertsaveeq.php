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
$equipment_year = $_POST['equipment_year'];
$user = 'admin';

if(empty($equipment_id)){

$insertEquipment = 'INSERT INTO equipment (equipment_type, equipment_num, equipment_brand, room_id, equipment_date, equipment_HWdetail, equipment_year,	equipment_create_date,equipment_update_date, 	equipment_create_user, 	 equipment_update_user)
                VALUES ("'.$equipment_type.'", "'.$equipment_num.'", "'.$equipment_brand.'" , "'.$room_id.'", "'.$equipment_date.'", "'.$equipment_HWdetail.'", "'.$equipment_year.'", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, "'.$user.'" , "'.$user.'")';
$conn->query($insertEquipment);
if($equipment_type=3){

$insertHub = 'INSERT INTO hub (equipment_type, hub_create_date, hub_update_date, hub_create_user, hub_update_user)
        VALUES ("'.$equipment_type.'", CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,"'.$user.'","'.$user.'")';
$conn->query($insertHub);
}
    echo 'success';

}else {
    $updateEquipment = 'UPDATE equipment SET equipment_num="'.$equipment_num.'",equipment_brand="'.$equipment_brand.'",
                        equipment_date="'.$equipment_date.'",equipment_HWdetail="'.$equipment_HWdetail.'",equipment_type="'.$equipment_type.'",
                        equipment_update_date=CURRENT_DATE,equipment_update_user="'.$user.'",equipment_year="'.$equipment_year.'",room_id="'.$room_id.'"
                        WHERE equipment_id='.$equipment_id;
    $conn->query($updateEquipment);

    if($equipment_type=3){
        $updateHub = 'UPDATE hub SET equipment_type="'.$equipment_type.'",
                      hub_update_date=CURRENT_DATE,hub_update_user="'.$user.'"
                      WHERE equipment_id='.$equipment_id;
        $conn->query($updateEquipment);


    echo 'update';
    }
}

 ?>
