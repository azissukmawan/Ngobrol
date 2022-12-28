<?php
$jumlahPost = count($data['post']);
?>

<!-- Profil -->
<div class="box mt-3">
    <div class="row row-cols-1 row-cols-md-3">
        <div class="col col1">
            <img src="<?= PATH; ?>/img/logo/<?= $data['profil']['fp']; ?>" class="img-profil" alt="<?= $data['profil']['nama']; ?>" />
        </div>
        <div class="col deskripsi-profil">
            <p class="b1">Nama Akun</p>
            <p class="b2"><?= $data['profil']['nama']; ?></p>
            <p class="b1 mt-2">Username</p>
            <p class="b2"><?= $data['usernameDetail']; ?></p>
            <p class="b1 mt-2">Jenis Kelamin</p>
            <p class="b2"><?= $data['profil']['jk']; ?></p>
        </div>
    </div>
</div>
<div class="clear"></div>
<!-- Status -->
<div class="box-clear d-flex align-items-center mt-4">
    <span class="jumlah-post jejer justify-content-center"><i class="bx bx-file icon-left"></i><?= $jumlahPost; ?> Postingan</span>
</div>
<div class="clear"></div>
<!-- Status -->
<div class="postingan">
    <?php $comments = is_array($data['komen']) ? $data['komen'] : null; ?>
    <?php $likes = $data['like']; ?>
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
                        <span class="namauser"><?= $users[$i][0]['nama']; ?></span><br />
                        <span class="tglpost"><?= $post[$i]["time"]; ?></span>
                    </div>
                </div>
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
                ?>
                <?php if (isset($_SESSION['islogin'])) : ?>
                    <?php if ($data['dataLike'][$i] > 0) : ?>
                        <button class="btn btn-post-action btn-post-like clickk"><span class="jejer"><i class='bx bxs-heart icon-left'></i><?= count($likes[$i]); ?></span></button>
                    <?php else : ?>
                        <form action="<?= PATH ?>/like/likeUser" method="POST">
                            <input type="hidden" name="id_post" value="<?= $post[$i]["id"]; ?>">
                            <input type="hidden" name="userName" value="<?= $post[$i]["username"]; ?>">
                            <button type="submit" name="like" class="btn btn-post-action btn-post-like clickk"><span class="jejer"><i class='bx bx-heart icon-left'></i><?= count($likes[$i]); ?></span></button>
                        </form>
                    <?php endif; ?>
                    <a class="btn btn-post-action btn-post-comment clickk" onClick="komen_modal('<?= $post[$i]["id"]; ?>');"><span class="jejer"><i class='bx bx-message-square-dots icon-left'></i>Comment</span></a>
                <?php else : ?>
                    <button class="btn btn-post-action btn-post-like clickk" data-bs-toggle="modal" data-bs-target="#modalLogin"><span class="jejer"><i class='bx bx-heart icon-left'></i><?= count($likes[$i]); ?></span></button>
                    <button class="btn btn-post-action btn-post-comment clickk" data-bs-toggle="modal" data-bs-target="#modalLogin"><span class="jejer"><i class='bx bx-message-square-dots icon-left'></i>Comment</span></button>
                <?php endif; ?>
            </div>
        </div>
        <div class="clear"></div>
        <div class="box-comment-wrapper align-items-end float-end module">
            <?php for ($j = 0; $j < count($comments[$i]); $j++) { ?>
                <div class="box box-comment module mt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div>
                                <img src="<?= PATH; ?>/img/logo/<?= $data['userKomen'][$i]['fp'] ?? null; ?>" class="pp-post" alt="<?= $data['userKomen'][$i]['nama'] ?? null; ?>" />
                            </div>
                            <div class="ms-3">
                                <span class="namauser"><a href="<?= PATH; ?>/user/<?= $comments[$i][$j]['username'] ?? null; ?>"><?= $data['userKomen'][$i]['nama'] ?? null; ?></a></span><br />
                                <span class="tglpost"><?= $comments[$i][$j]['time'] ?? null; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <?= $comments[$i][$j]['komen'] ?? null; ?>
                    </div>
                </div>
            <?php } ?>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    <?php } ?>
</div>
<div class="clear"></div>
<div class="mt-4"></div>

<!-- Modal Komen -->
<?php if (isset($_SESSION['islogin'])) : ?>
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
<?php endif; ?>