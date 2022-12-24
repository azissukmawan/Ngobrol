<?php
class HomeController extends Controller
{

    public function index($user)
    {
        if (isset($_SESSION['username'])) {
            $user = $_SESSION["username"];
        }
        $data['judul'] = 'Beranda | ';
        $data['user'] = $this->model('User_model')->getInfo($user);
        $data['post'] = $this->model('Post_model')->postingan();
        $data['detail'] = array();
        $this->view('logic/cekLogin');
        $this->view('templates/metaTag', $data);
        $this->view('styles/style');
        $this->view('templates/header', $data);
        foreach ($data['post'] as $key) {
            $users = $key['username'];
            array_push($data['detail'], $this->model('User_model')->showData($users));
        }
        $this->view('home/home', $data);
        $this->view('modal/modalLogout');
        $this->view('templates/footer');
        $this->view('scripts/scriptDefault');
        $this->view('templates/penutup');
    }
}
