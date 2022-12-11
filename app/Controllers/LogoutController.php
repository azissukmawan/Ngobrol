<?php
class LogoutController
{
    public function index()
    {
        session_destroy();
        header('location: ' . PATH . '/');
    }
}
?>

<!-- Logout -->
<div class="box mt-3">
    <meta http-equiv="refresh" content="2;url='<?= PATH; ?>'">
    <div class="text-center">
        Berhasil logout...
    </div>
</div>
<div class="clear"></div>
</div>
</div>
<div class="clear"></div>
<div class="mt-4"></div>