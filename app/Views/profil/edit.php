<?php
foreach ($data['user']  as $row) {
  $username = $row['username'];
  $nama = $row['nama'];
  $fp =  $row['fp'];
  $jk =  $row['jk'];
}
?>
<!-- Edit Profil -->
<div>
  <?php Flasher::flash(); ?>
</div>
<div class="box mt-3">
  <div class="title mb-4">Edit Profil</div>
  <form action="<?= PATH ?>/profil/update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="username" value="<?= $username; ?>" />
    <input type="hidden" name="jk" value="<?= $jk; ?>" />
    <input type="hidden" name="fpLama" value="<?= $fp; ?>" />
    <div class="text-center mb-3">
      <img src="<?= PATH; ?>/img/logo/<?= $fp ?>" class="pp-edit" alt="" />
    </div>
    <div class="was-validated form-floating mb-3">
      <input type="text" name="nama" class="form-control" id="floatingInput1" placeholder="Masukkan Nama Akun" value="<?= $nama ?>" required />
      <label for="floatingInput1">Nama Akun</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput2" value="<?= $username; ?>" disabled />
      <label for="floatingInput2">Username</label>
    </div>
    <div class="was-validated form-floating mb-3">
      <select name="jk" class="form-select" required id="floatingSelect" aria-label="Jenis Kelamin">
        <option selected disabled>Pilih Jenis Kelamin (Default : <?= $jk ?>)</option>
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