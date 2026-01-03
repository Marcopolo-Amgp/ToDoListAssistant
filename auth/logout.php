<?php
require_once __DIR__ . '/../config/configuration.php';
require_once __DIR__ . '/../class/user.php';



/* Hapus semua data session */
$_SESSION = [];
session_unset();
session_destroy();


/* Redirect ke login */
header("Location: login.php");
exit;
?>
