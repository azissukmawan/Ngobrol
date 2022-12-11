</head>
<?php
  foreach($data['user']  as $row){
    $username = $row['username'];
    $nama = $row['nama'];
    $fp =  $row['fp'];
  }
?>

<body>
  <div class="wrapper mx-auto">
    <div class="container">
      <!-- Header -->
      <header class="d-flex justify-content-between align-items-center mt-3">
        <div>
          <a href="<?= PATH; ?>"><img src="<?= PATH ?>/img/logo/logo.png" class="logo-img" alt="ngobrol" /></a>
        </div>
        <?php if (!isset($_SESSION['islogin'])) : ?>
          <div class="btn-top">
            <button type="button" class="btn btn-orz clickk" data-bs-toggle="modal" data-bs-target="#modalLogin">
              <span class="jejer"><i class="bx bx-log-in-circle icon-left"></i>Login</span>
            </button>
            <button type="button" class="btn btn-orz clickk" data-bs-toggle="modal" data-bs-target="#modalDaftar">
              <span class="jejer"><i class="bx bx-edit-alt icon-left"></i>Daftar</span>
            </button>
          </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['islogin'])) : ?>
          <!-- Sudah Login -->
          <div class="btn-top menu-mobile">
            <a class="btn btn-orz clickk" href="<?= PATH; ?>" role="button"><span class="jejer"><i class="bx bx-home icon-left"></i>Beranda</span></a>
          </div>
          <div class="btn-top">
            <div class="dropdown">
              <button class="btn-profil dropdown-toggle clickk" type="button" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                <img src="<?= PATH; ?>/img/logo/<?= $fp ?>" class="profilku" alt="<?= $nama; ?>" />
                <span class="namaku"><?= $nama; ?></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-orz dropdown-menu-end text-center">
                <li class="mt-3">
                  <img src="<?= PATH; ?>/img/logo/<?= $fp ?>" class="dropdown-img" alt="<?= $nama ?>" />
                </li>
                <li class="mt-3">
                  <span class="dropdown-nama jejer justify-content-center"><?= $nama; ?></span>
                </li>
                <li class="mb-3"><span class="dropdown-username">@<?= $username; ?></span></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item clickk" href="<?= PATH; ?>/profil/">Lihat Profil</a></li>
                <li><a class="dropdown-item clickk" href="<?= PATH; ?>/profil/password">Ganti Password</a></li>
                <li><a class="dropdown-item dropdown-item-logout clickk" data-bs-toggle="modal" data-bs-target="#modalLogout" role="button">Logout</a></li>
              </ul>
            </div>
          </div>
        <?php endif; ?>
      </header>
      <div class="clear"></div>