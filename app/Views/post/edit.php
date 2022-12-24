<!-- Edit Postingan -->
<div class="box mt-3">
    <?php if ($data['post']["username"] !== $_SESSION["username"]) : ?>
        <div class="text-center">
            Anda akan dialihkan ke halaman beranda...
        </div>
        <meta http-equiv="refresh" content="2;url='<?= PATH; ?>'">
    <?php endif; ?>
    <?php if ($data['post']["username"] === $_SESSION["username"]) : ?>
        <div>
            <?php Flasher::flash(); ?>
        </div>
        <div class="title mb-4">Edit Postingan</div>
        <form action="<?= PATH ?>/post/saveEdit/<?= $data['post']['id']; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['post']['id']; ?>" />
            <input type="hidden" name="imgLama" value="<?= $data['post']["img"]; ?>" />
            <?php if (isset($_SESSION['successUpdate'])) : ?>
                <div id='preloader'>
                    <div id='loader' class='spinner'>
                        <div id='d1'></div>
                        <div id='d2'></div>
                        <div id='d3'></div>
                        <div id='d4'></div>
                        <div id='d5'></div>
                    </div>
                </div>
                <meta http-equiv="refresh" content="2;url='<?= PATH; ?>'">
            <?php endif; ?>
            <?php if (isset($_SESSION['successUpdate'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Gagal Menyimpan Perubahan.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <div>
                        <img src="<?= PATH; ?>/img/logo/<?= $data['detail']['fp']; ?>" class="pp-post" alt="<?= $data['detail']['nama']; ?>" />
                    </div>
                    <div class="ms-3">
                        <span class="namauser"><?= $data['detail']['nama']; ?></span><br />
                        <span class="tglpost"><?= $data['post']["time"]; ?></span>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <input id="teks" type="hidden" name="teks" value="<?= $data['post']["teks"]; ?>" autofocus>
                <trix-editor class="trix-editpost" input="teks" autofocus></trix-editor>
            </div>
            <?php if ($data['post']["img"]) : ?>
                <div class="mt-3 text-center">
                    <img src="<?= PATH; ?>/img/post/<?= $data['post']["img"]; ?>" class="img-post" alt="Images" />
                </div>
            <?php endif; ?>
            <div class="mt-2">
                <?php if (!$data['post']["img"]) : ?>
                    <label for="formFile" class="form-label">Upload Gambar (Opsional)</label>
                <?php endif; ?>
                <?php if ($data['post']["img"]) : ?>
                    <label for="formFile" class="form-label">Ganti Gambar (Opsional)</label>
                <?php endif; ?>
                <input class="form-control" type="file" name="img" id="formFile" />
            </div>
            <div class="text-center mt-3">
                <a class="btn btn-secondary clickk mb-1" href="<?= PATH; ?>" role="button"><span class="jejer"><i class="bx bxs-left-arrow icon-left"></i>Kembali</span></a>
                <button type="submit" name="edit" class="btn btn-orz clickk mb-1">
                    <span class="jejer"><i class="bx bxs-save icon-left"></i>Simpan Perubahan</span>
                </button>
            </div>
        </form>
    <?php endif; ?>
</div>
<div class="clear"></div>
</div>
</div>
<div class="clear"></div>
<div class="mt-4"></div>