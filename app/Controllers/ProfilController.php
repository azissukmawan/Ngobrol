<?php
class ProfilController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['username'])) {
            $user = $_SESSION['username'];
        }
        $data['judul'] = 'Profil | ';
        $data['username'] = $_SESSION["username"];
        $data['user'] = $this->model('User_model')->getInfo($_SESSION["username"]);
        $data['post'] = $this->model('Post_model')->personalPostingan($_SESSION["username"]);
        $data['detail'] = array();
        $data['like'] = array();
        $data['dataLike'] = array();
        $data['komen'] = array();
        $data['userKomen'] = array();
        $this->view('logic/akses');
        $this->view('templates/metaTag', $data);
        $this->view('styles/style');
        $this->view('templates/header', $data);
        foreach ($data['post'] as $key) {
            $users = $key['username'];
            $postId = $key['id'];
            array_push($data['detail'], $this->model('User_model')->showData($users));
            array_push($data['dataLike'], $this->model('Like_model')->rowsLike($postId, $user));
            array_push($data['like'], $this->model('Like_model')->like($postId));
            array_push($data['komen'], $this->model('Komen_model')->dataKomen($postId));
        }

        foreach ($data['komen'] as $innerArray) {
            foreach ($innerArray as $item) {
                array_push($data['userKomen'], $this->model('User_model')->getInfo($item['username']));
            }
        }
        $this->view('profil/profil', $data);
        $this->view('modal/modalLogout');
        $this->view('templates/footer');
        $this->view('scripts/scriptDefault');
        $this->view('templates/penutup');
    }
    public function edit()
    {
        $data['judul'] = 'Edit Profil | ';
        $data['user'] = $this->model('User_model')->getInfo($_SESSION["username"]);
        $this->view('logic/akses');
        $this->view('templates/metaTag', $data);
        $this->view('styles/style');
        $this->view('templates/header', $data);
        $this->view('profil/edit', $data);
        $this->view('modal/modalLogout');
        $this->view('scripts/scriptDefault');
        $this->view('templates/penutup');
    }
    public function password()
    {
        $data['user'] = $this->model('User_model')->getInfo($_SESSION["username"]);
        $data['judul'] = 'Ganti Password | ';
        $this->view('logic/akses');
        $this->view('templates/metaTag', $data);
        $this->view('styles/style');
        $this->view('templates/header',  $data);
        $this->view('profil/password', $data);
        $this->view('modal/modalLogout');
        $this->view('scripts/scriptDefault');
        $this->view('templates/penutup');
    }

    public function updatePw()
    {
        if ($_POST['pwBaru1'] == $_POST['pwBaru2']) {
            $row = $this->model('User_model')->getInfo($_POST['username']);
            if (password_verify($_POST['pwLama'], $row['password'])) {
                if ($this->model('User_model')->pwUpdate($_POST) > 0) {
                    Flasher::setFlash('Password Berhasil diupdate', 'success');
                    header('location: ' . PATH . '/profil/password');
                    exit;
                }
            } else {
                Flasher::setFlash('Password lama tidak valid', 'danger');
                header('location: ' . PATH . '/profil/password');
                exit;
            }
        } else {
            Flasher::setFlash('Gagal password tidak sama.', 'danger');
            header('location: ' . PATH . '/profil/password');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('User_model')->updateData($_POST) > 0) {
            Flasher::setFlash('Berhasil diupdate', 'success');
            header('location: ' . PATH . '/');
            exit;
        } else {
            Flasher::setFlash('Gagal diupdate', 'danger');
            header('location: ' . PATH . '/');
            exit;
        }
    }
}
