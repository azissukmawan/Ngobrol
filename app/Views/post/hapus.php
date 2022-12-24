        <!-- Edit Postingan -->
        <div class="box mt-3">
            <meta http-equiv="refresh" content="2;url='<?= PATH; ?>'">
            <?php if ($data['post']["username"] !== $_SESSION["username"]) : ?>
                <div class="text-center">
                    Anda akan dialihkan ke halaman beranda...
                </div>
            <?php endif; ?>
            <?php if ($data['post']["username"] === $_SESSION["username"]) : ?>
                <?php if ($data['delete'] > 0) : ?>

                <?php endif; ?>
            <?php endif; ?>
            <div class="text-center">
                Menghapus postingan...
            </div>
        </div>
        <div class="clear"></div>
        </div>
        </div>
        <div class="clear"></div>
        <div class="mt-4"></div>