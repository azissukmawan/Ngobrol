<?php
if (!isset($_SESSION['islogin'])) {
    Flasher::setFlash('Gagal', 'Harus login terlebih dahulu', 'danger');
    header('location: ' . PATH . '/');
    exit;
}
