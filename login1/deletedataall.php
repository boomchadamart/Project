<?php
    include 'connection.php';
$equipment_id = $_GET['id'];

$sql = "delete from equipment where equipment_id='$equipment_id'"; // กำหนดคำสั่ง SQL เพื่อลบข้อมูล กำหนดให้ลบตาม ID ที่เรากำหนด

$result = $conn->query($sql);

echo 'success';
?>
