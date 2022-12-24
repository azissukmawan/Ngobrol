<?php
class PostController extends Controller
{
    public function posting()
    {
        date_default_timezone_set("Asia/Jakarta");
        $time = date('d F Y H:i');

        $userUsername = $_POST['userUsername'];
        $teks = $_POST['teks'];
        $timePosting = $time;

        if (strlen($teks) > 1021) {
            Flasher::setFlash('Gagal posting, teks tidak boleh lebih dari 1000 kata', 'danger');
            header('Location: ' . PATH . '/');
            exit;
        } else if (!$teks) {
            Flasher::setFlash('Gagal posting, postingan tidak boleh kosong', 'danger');
            header('Location: ' . PATH . '/');
            exit;
        }

        if ($this->model('Post_model')->posting($userUsername, $teks, $timePosting) > 0) {
            $_SESSION['successPosting'] = true;
            header('Location: ' . PATH . '/');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Postingan | ';
        $data['user'] = $this->model('User_model')->getInfo($_SESSION['username']);
        $data['post'] = $this->model('Post_model')->getPost($id);
        $users = $data['post']['username'];
        $data['detail'] = $this->model('User_model')->getInfo($users);
        $this->view('logic/akses');
        $this->view('templates/metaTag', $data);
        $this->view('styles/style');
        $this->view('templates/header', $data);
        $this->view('post/edit', $data);
        $this->view('modal/modalLogout');
        $this->view('scripts/scriptDefault');
        $this->view('templates/penutup');
    }

    public function hapus($id)
    {
        $data['post'] = $this->model('Post_model')->getPost($id);
        $data['delete'] = $this->model('Post_model')->deletePost($id);
        $data['judul'] = 'Hapus Postingan | ';
        $data['user'] = $this->model('User_model')->getInfo($_SESSION['username']);
        $this->view('logic/akses');
        $this->view('templates/metaTag', $data);
        $this->view('styles/style');
        $this->view('templates/header', $data);
        $this->view('post/hapus', $data);
        $this->view('modal/modalLogout');
        $this->view('scripts/scriptDefault');
        $this->view('templates/penutup');
    }

    public function saveEdit($id)
    {
        if (strlen($_POST['teks']) > 1021) {
            Flasher::setFlash('Gagal update, teks tidak boleh lebih dari 1000 kata', 'danger');
            header('Location: ' . PATH . '/post/edit/' . $id . '');
            exit;
        } else if (!$_POST['teks']) {
            Flasher::setFlash('Gagal update, postingan tidak boleh kosong', 'danger');
            header('Location: ' . PATH . '/post/edit/' . $id . '');
            exit;
        }

        if ($this->model('Post_model')->updatePost($_POST) > 0) {
            $_SESSION['successPosting'] = true;
            header('Location: ' . PATH . '/');
            exit;
        }
    }
}
