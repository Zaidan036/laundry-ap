<?php
session_start();
session_unset();
session_destroy();

//redirect ke halaman login
header('location:./index.php');
exit;

?>