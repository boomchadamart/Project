<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'newproject';

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

?>
