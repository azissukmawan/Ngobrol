        <!-- Profil -->
        <div class="box mt-3">
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col col1">
                    <img src="<?= PATH; ?>/img/logo/bahan.jpg" class="img-profil" alt="" />
                </div>
                <div class="col deskripsi-profil">
                    <p class="b1">Nama Akun</p>
                    <p class="b2">Azis Sukmawan</p>
                    <p class="b1 mt-2">Username</p>
                    <p class="b2">Amawan</p>
                    <p class="b1 mt-2">Jenis Kelamin</p>
                    <p class="b2">Laki laki</p>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <!-- Status -->
        <div class="box-clear d-flex align-items-center mt-4">
            <span class="jumlah-post jejer justify-content-center"><i class="bx bx-file icon-left"></i>3 Postingan</span>
        </div>
        <div class="clear"></div>
        <div class="box module mt-4" id="">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div>
                        <img data-src="<?= PATH; ?>/img/logo/bahan.jpg" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="pp-post lazy" alt="" />
                    </div>
                    <div class="ms-3">
                        <span class="namauser">Amawan<i class="bx bxs-badge-check icon-right" style="color: #3897f0"></i></span><br />
                        <span class="tglpost">15 November 2002 13:03</span>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum laudantium possimus cumque sint iusto illo in odit suscipit alias? At facere asperiores inventore, exercitationem ullam quo impedit dolore velit nesciunt?
            </div>
            <div class="post-action d-flex mt-2 gap-2">
                <button class="btn btn-post-action btn-post-like clickk"><span class="jejer"><i class='bx bxs-heart icon-left'></i>5</span></button>
                <form action="" method="POST">
                    <input type="hidden" name="id_post" value="">
                    <button type="submit" name="like" class="btn btn-post-action btn-post-like clickk"><span class="jejer"><i class='bx bx-heart icon-left'></i>5</span></button>
                </form>
                <a class="btn btn-post-action btn-post-comment clickk" onClick="komen_modal('1');"><span class="jejer"><i class='bx bx-message-square-dots icon-left'></i>Comment</span></a>
            </div>
        </div>
        <div class="clear"></div>
        <div class="box-comment-wrapper align-items-end float-end module">
            <div class="box box-comment module mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div>
                            <img data-src="<?= PATH; ?>/img/logo/bahan.jpg" src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="pp-post lazy" alt="" />
                        </div>
                        <div class="ms-3">
                            <span class="namauser"><a href="">Bot</a><i class='bx bxs-bot bx-tada icon-right' style='color:#dc3545'></i></span><br />
                            <span class="tglpost">16 November 2022 18:00</span>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit, laudantium labore dicta totam voluptatem inventore cor
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        </div>
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