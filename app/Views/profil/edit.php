<!-- Edit Profil -->
<div>
  <?php Flasher::flash(); ?>
</div>

<div class="box mt-3">
  <div class="title mb-4">Edit Profil</div>
  <form action="<?= PATH ?>/profil/update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="username" value="<?= $data['user']['username']; ?>" />
    <input type="hidden" name="jk" value="<?= $data['user']['jk']; ?>" />
    <input type="hidden" name="fpLama" value="<?= $data['user']['fp']; ?>" />
    <div class="text-center mb-3">
      <img src="<?= media_url($data['user']['fp'], 'img/logo'); ?>" class="pp-edit" alt="" />
    </div>
    <div class="was-validated form-floating mb-3">
      <input type="text" name="nama" class="form-control" id="floatingInput1" placeholder="Masukkan Nama Akun" value="<?= $data['user']['nama'] ?>" required />
      <label for="floatingInput1">Nama Akun</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput2" value="<?= $data['user']['username']; ?>" disabled />
      <label for="floatingInput2">Username</label>
    </div>
    <div class="was-validated form-floating mb-3">
      <select name="jk" class="form-select" required id="floatingSelect" aria-label="Jenis Kelamin">
        <option selected disabled>Pilih Jenis Kelamin (Default : <?= $data['user']['jk'] ?>)</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
      <label for="floatingSelect">Jenis Kelamin</label>
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Ganti Foto Profil</label>
      <input class="form-control" type="file" name="fp" id="formFile" />
    </div>
    <div class="text-center">
      <a class="btn btn-secondary clickk mb-1" href="<?= PATH; ?>/profil" role="button"><span class="jejer"><i class="bx bxs-left-arrow icon-left"></i>Kembali</span></a>
      <button type="submit" name="edit" class="btn btn-orz clickk mb-1">
        <span class="jejer"><i class="bx bxs-save icon-left"></i>Simpan Perubahan</span>
      </button>
    </div>
  </form>
</div>
<div class="clear"></div>
</div>
</div>
<div class="clear"></div>
<div class="mt-4"></div>
