<?php
class UserController extends Controller
{
    public function index($p)
    {
        $sesion = $_SESSION['username'];
        $data['user'] = $this->model('User_model')->getInfo($sesion);
        $data['usernameDetail'] = $p;
        if ($sesion === $data['usernameDetail']) {
            header("location: " . PATH . "/profil");
            exit;
        }
        if (empty($p)) {
            header("location: " . PATH . "/");
            exit;
        }
        $data['profil'] = $this->model('User_model')->getInfo($p);
        if ($p !== $data['profil']['username']) {
            header("location: " . PATH . "/");
            exit;
        }
        $data['judul'] = $data['profil']["nama"] . ' | ';
        $data['post'] = $this->model('Post_model')->personalPostingan($p);
        $data['detail'] = array();
        $this->view('logic/akses');
        $this->view('templates/metaTag', $data);
        $this->view('styles/style');
        $this->view('templates/header', $data);
        foreach ($data['post'] as $key) {
            $users = $key['username'];
            array_push($data['detail'], $this->model('User_model')->showData($users));
        }
        $this->view('profil/userDetail', $data);
        $this->view('modal/modalLogout');
        $this->view('templates/footer');
        $this->view('scripts/scriptDefault');
        $this->view('templates/penutup');
    }
}
