<div>
  <?php Flasher::flash(); ?>
</div>
<!-- Edit Password -->
<div class="box mt-3">
  <div class="title mb-4">Ganti Password</div>
  <form action="<?= PATH ?>/profil/updatePw" method="post">
    <input type="hidden" name="username" value="<?= $data['user']['username']; ?>" />
    <div class="form-floating mb-3">
      <input type="password" name="pwLama" class="form-control" id="floatingPassword1" placeholder="Masukkan Password Lama" required />
      <label for="floatingPassword1">Password Lama</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="pwBaru1" class="form-control" id="floatingPassword2" placeholder="Masukkan Password Baru" required />
      <label for="floatingPassword2">Password Baru</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="pwBaru2" class="form-control" id="floatingPassword3" placeholder="Konfirmasi Password Baru" required />
      <label for="floatingPassword3">Konfirmasi Password Baru</label>
    </div>
    <div class="text-center">
      <a class="btn btn-secondary clickk mb-1" href="<?= PATH; ?>/profil" role="button"><span class="jejer"><i class="bx bxs-left-arrow icon-left"></i>Kembali</span></a>
      <button type="submit" name="edit" class="btn btn-orz clickk mb-1">
        <span class="jejer"><i class="bx bxs-save icon-left"></i>Simpan</span>
      </button>
    </div>
  </form>
</div>
<div class="clear"></div>
</div>
</div>
<div class="clear"></div>
<div class="mt-4"></div>