<?php
session_start();
session_destroy();
echo "<script>window.location.href='../pages/Login.php';</script>";
exit;
?>