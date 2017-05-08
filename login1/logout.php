<?php
session_start();
unset ( $_SESSION['session_id'] );
unset ( $_SESSION['username'] );
unset ( $_SESSION['status'] );
session_destroy();
echo "<meta http-equiv='refresh' content='1;URL=login.php'>";
?>
