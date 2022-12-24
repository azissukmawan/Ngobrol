<div>
    <?php Flasher::flash(); ?>
</div>
<!-- Welcome -->
<?php if (!isset($_SESSION['islogin'])) : ?>
    <div class="box text-center mt-3">
        <span class="welcome">
            Selamat datang di Ngobrol<br />
            Silahkan <a class="underline" data-bs-toggle="modal" data-bs-target="#modalLogin" role="button">Login</a> untuk menyampaikan keluh kesah kalian 😈
        </span>
    </div>
    <div class="clear"></div>
<?php endif; ?>

<?php if (isset($_SESSION['successPosting'])) : ?>
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
    <?php unset($_SESSION['successPosting']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['success'])) : ?>
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
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (!isset($_SESSION['islogin'])) : ?>
    <!-- Property Buat Status -->
    <div class="box box-update mt-4">
        <div class="d-flex">
            <div class="flex-shrink-0">
                <img src="<?= PATH; ?>/img/logo/bahan.jpg" class="pp-status" alt="null" />
            </div>
            <div class="flex-grow-1 ms-3">
                <div>
                    <input id="teks" type="hidden">
                    <trix-editor class="trix-beranda" input="teks"></trix-editor>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        <label class="btn btn-upload-foto mb-1">
                            <span class="jejer"><i class="bx bx-image-add icon-left" style="font-size: 21px"></i><span class="txt-image-add">Foto/Gambar</span></span><input type="file" style="display: none">
                        </label>
                    </div>
                    <div class="ms-2">
                        <button type="button" class="btn btn-orz mb-1">
                            <span class="jejer">Publikasi<i class="bx bx-send icon-right"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
<?php endif; ?>

<?php if (isset($_SESSION['islogin'])) : ?>
    <div class="box mt-3">
        <form action="<?= PATH ?>/post/posting" method="post" enctype="multipart/form-data">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img src="<?= PATH; ?>/img/logo/<?= $data['user']['fp'] ?>" class="pp-status" alt="<?= $data['user']['nama']; ?>" />
                </div>
                <div class="flex-grow-1 ms-3">
                    <input type="hidden" name="userUsername" value="<?= $data['user']['username'] ?>">
                    <div>
                        <input id="teks" type="hidden" name="teks" autofocus>
                        <trix-editor class="trix-beranda" input="teks" autofocus></trix-editor>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <label class="btn btn-upload-foto clickk mb-1">
                                <span class="jejer"><i class="bx bx-image-add icon-left" style="font-size: 21px"></i><span class="txt-image-add">Foto/Gambar</span></span><input type="file" name="img" style="display: none">
                            </label>
                        </div>
                        <div class="ms-2">
                            <button type="submit" name="post" class="btn btn-orz clickk mb-1">
                                <span class="jejer">Publikasi<i class="bx bx-send icon-right"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="clear"></div>
<?php endif; ?>

<!-- Status -->
<div class="postingan">
    <?php $post = $data['post']; ?>
    <?php $users = $data['detail']; ?>
    <?php for ($i = 0; $i < count($post); $i++) { ?>
        <div class="box module mt-4" id="<?= $post[$i]["id"]; ?>">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div>
                        <img src="<?= PATH; ?>/img/logo/<?= $users[$i][0]['fp']; ?>" class="pp-post" alt="<?= $users[$i][0]['nama']; ?>" />
                    </div>
                    <div class="ms-3">
                        <span class="namauser"><a href="<?= PATH ?>/user/<?= $post[$i]["username"]; ?>"><?= $users[$i][0]['nama']; ?></a></span><br />
                        <span class="tglpost"><?= $post[$i]["time"]; ?></span>
                    </div>
                </div>
                <?php if (isset($_SESSION['username'])) : ?>
                    <?php if ($post[$i]["username"] === $_SESSION["username"]) : ?>
                        <div>
                            <div class="dropdown dropdown-orz">
                                <button class="btn-option dropdown-toggle clickk" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item clickk" href="<?= PATH; ?>/post/edit/<?= $post[$i]["id"]; ?>"><span class="jejer"><i class="bx bx-edit"></i>&nbsp;Edit Post</span></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item clickk" href="<?= PATH; ?>/post/hapus/<?= $post[$i]["id"]; ?>" onclick="return confirm('Yakin ingin menghapus data ?');"><span class="jejer"><i class="bx bx-trash"></i>&nbsp;Hapus Post</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php if ($post[$i]["teks"]) : ?>
                <div class="mt-2">
                    <?= $post[$i]["teks"]; ?>
                </div>
            <?php endif; ?>
            <?php if ($post[$i]["img"]) : ?>
                <div class="mt-3 text-center">
                    <img data-src="<?= PATH; ?>/img/post/<?= $post[$i]["img"]; ?>" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="img-post lazy" alt="Images" />
                </div>
            <?php endif; ?>
            <div class="post-action d-flex mt-2 gap-2">
                <?php
                if (!isset($_SESSION['username'])) {
                    $username = "null";
                }
                // $dataLike = mysqli_query($koneksi, "SELECT id FROM like_tb WHERE id_post='$postId' AND username = '$username'");
                ?>
                <button class="btn btn-post-action btn-post-like clickk" data-bs-toggle="modal" data-bs-target="#modalLogin"><span class="jejer"><i class='bx bx-heart icon-left'></i>5</span></button>
                <button class="btn btn-post-action btn-post-comment clickk" data-bs-toggle="modal" data-bs-target="#modalLogin"><span class="jejer"><i class='bx bx-message-square-dots icon-left'></i>Comment</span></button>
            </div>
        </div>
        <div class="clear"></div>
    <?php } ?>
</div>
<div class="clear"></div>
<div class="mt-4"></div>

<!-- Modal Komen -->
<div class="modal fade" id="modalKomen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalKomenLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-login">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalKomenLabel">Comment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="idpost" id="ambil_id" value="#">
                    <div>
                        <input id="komen" type="hidden" name="komen">
                        <trix-editor class="trix-editpost" input="komen"></trix-editor>
                    </div>
                    <div class="d-grid mt-3">
                        <button class="btn btn-orz clickk" type="submit" name="kirimkomen">
                            <span class="jejer justify-content-center">Kirim<i class="bx bx-send icon-right"></i></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Login -->
<div class="modal fade" id="modalLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-login">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLoginLabel">Login Ngobrol</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= PATH ?>/auth/loginKuy" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control" id="floatingInput1" placeholder="Masukkan Username" required />
                        <label for="floatingInput1">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword1" placeholder="Masukkan Password" required />
                        <label for="floatingPassword1">Password</label>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-orz clickk" type="submit">
                            <span class="jejer justify-content-center"><i class="bx bx-log-in-circle icon-left"></i>Login</span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer text-center">
                <span class="disable-link"><a href="#" role="button">Lupa Password?</a>(Coming Soon)</span>
                <br />
                Belum punya akun?<a class="underline" data-bs-toggle="modal" data-bs-target="#modalDaftar" role="button">Daftar</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Daftar -->
<div class="modal fade" id="modalDaftar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDaftarLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-login">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalDaftarLabel">Daftar Ngobrol</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= PATH ?>/auth/register" method="post" enctype="multipart/form-data">
                    <div class="was-validated form-floating mb-3">
                        <input type="text" name="nama" maxlength="100" class="form-control" id="floatingInput2" placeholder="Masukkan Nama Akun" required />
                        <label for="floatingInput2">Nama Akun</label>
                    </div>
                    <div class="was-validated form-floating mb-3">
                        <input type="text" name="username" minlength="4" maxlength="20" class="form-control" id="floatingInput3" placeholder="Masukkan Username" required />
                        <label for="floatingInput3">Username</label>
                    </div>
                    <div class="was-validated form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword2" placeholder="Masukkan Password" required />
                        <label for="floatingPassword2">Password</label>
                    </div>
                    <div class="was-validated form-floating mb-3">
                        <input type="password" name="password2" class="form-control" id="floatingPassword3" placeholder="Masukkan Konfirmasi Password" required />
                        <label for="floatingPassword3">Konfirmasi Password</label>
                    </div>
                    <div class="was-validated form-floating mb-3">
                        <select name="jk" class="form-select" required id="floatingSelect" aria-label="Jenis Kelamin">
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <label for="floatingSelect">Jenis Kelamin</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFileDaftar" class="form-label">Upload Foto Profil (Opsional)</label>
                        <input class="form-control" type="file" name="fp" id="formFileDaftar" />
                    </div>
                    <div class="was-validated form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="validationFormCheck1" required />
                        <label class="form-check-label" for="validationFormCheck1">Saya setuju mendaftar dan data yang saya masukkan sudah benar</label>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-orz clickk" type="submit">
                            <span class="jejer justify-content-center"><i class="bx bx-edit-alt icon-left"></i>Daftar</span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer text-center">Sudah punya akun?<a class="underline" data-bs-toggle="modal" data-bs-target="#modalLogin" role="button">Login</a></div>
        </div>
    </div>
</div>