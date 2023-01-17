<?php
$username = $_SESSION['username'];
$id = $_SESSION['id'];
// buat cookie
setcookie('port', $id, time() + (60 * 60 * 24), '/');
setcookie('key', hash('sha256', $username), time() + (60 * 60 * 24 ), '/');
header('location: ' . PATH . '/');
exit;
