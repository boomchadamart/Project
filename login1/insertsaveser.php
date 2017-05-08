<?php
include 'connection.php';
session_start();

$equipment_id = $_POST['equipment_id'];
$equipment_type = $_POST['equipment_type'];
$equipment_num = $_POST['equipment_num'];
$equipment_brand = $_POST['equipment_brand'];
$room_id = $_POST['room_id'];
$servers_ipAddress = $_POST['servers_ipAddress'];
$servers_conservator = $_POST['servers_conservator'];
$equipment_date = $_POST['equipment_date'];
$equipment_HWdetail = $_POST['equipment_HWdetail'];
$equipment_year = $_POST['equipment_year'];
$user = 'admin';

if(empty($equipment_id)){

    $insertEquipment = 'INSERT INTO equipment (equipment_type, equipment_num, equipment_brand, room_id, equipment_date, equipment_HWdetail, equipment_year,	equipment_create_date,equipment_update_date, 	equipment_create_user, 	 equipment_update_user)
                        VALUES ("'.$equipment_type.'", "'.$equipment_num.'", "'.$equipment_brand.'" , "'.$room_id.'", "'.$equipment_date.'", "'.$equipment_HWdetail.'", "'.$equipment_year.'", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, "'.$user.'" , "'.$user.'")';
    $conn->query($insertEquipment);

    $geteqid = 'SELECT equipment_id FROM equipment ORDER BY equipment_id DESC LIMIT 1';
    $rs = $conn->query($geteqid);
    $id = $rs->fetch_array();
    $eqId = $id['equipment_id'];

    $insertSer = 'INSERT INTO servers (servers_ipAddress, servers_conservator, equipment_type, equipment_id, servers_create_date, servers_update_date, servers_create_user, servers_update_user)
                  VALUES ("'.$servers_ipAddress.'" , "'.$servers_conservator.'", "'.$equipment_type.'","'.$eqId.'", CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,"'.$user.'","'.$user.'")';
    $conn->query($insertSer);
    echo 'success';
}else {
    $updateEquipment = 'UPDATE equipment SET equipment_num="'.$equipment_num.'",equipment_brand="'.$equipment_brand.'",
                        equipment_date="'.$equipment_date.'",equipment_HWdetail="'.$equipment_HWdetail.'",equipment_type="'.$equipment_type.'",
                        equipment_update_date=CURRENT_DATE,equipment_update_user="'.$user.'",equipment_year="'.$equipment_year.'",room_id="'.$room_id.'"
                        WHERE equipment_id='.$equipment_id;
    $conn->query($updateEquipment);

    $updateSer = 'UPDATE servers SET equipment_type="'.$equipment_type.'",
                  servers_ipAddress="'.$servers_ipAddress.'",servers_conservator="'.$servers_conservator.'",servers_update_date=CURRENT_DATE,servers_update_user="'.$user.'"
                  WHERE equipment_id='.$equipment_id;
    $conn->query($updateEquipment);

    echo 'update';

}


 ?>
