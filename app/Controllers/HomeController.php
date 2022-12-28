<?php
class HomeController extends Controller
{

    public function index()
    {
        $user = isset($_SESSION["username"]) ? $_SESSION["username"] : null;
        $data['judul'] = 'Beranda | ';
        $data['user'] = $this->model('User_model')->getInfo($user);
        $data['post'] = $this->model('Post_model')->postingan();
        $data['detail'] = [];
        $data['like'] = array();
        $data['dataLike'] = array();
        $data['komen'] = array();
        $data['userKomen'] = array();
        $this->view('logic/cekLogin');
        $this->view('templates/metaTag', $data);
        $this->view('styles/style');
        $this->view('templates/header', $data);
        foreach ($data['post'] as $key) {
            $users = $key['username'];
            $postId = $key['id'];
            array_push($data['dataLike'], $this->model('Like_model')->rowsLike($postId, $user));
            array_push($data['like'], $this->model('Like_model')->like($postId));
            $data['detail'][] = $this->model('User_model')->getInfo($users);
            array_push($data['komen'], $this->model('Komen_model')->dataKomen($postId));
        }

        foreach ($data['komen'] as $innerArray) {
            foreach ($innerArray as $item) {
                array_push($data['userKomen'], $this->model('User_model')->getInfo($item['username']));
            }
        }

        // echo var_dump($data['detail']);
        // echo var_dump($data['post']);
        // echo var_dump($data['userKomen']);
        // return false;

        $this->view('home/home', $data);
        $this->view('modal/modalLogout');
        $this->view('templates/footer');
        $this->view('scripts/scriptDefault');
        $this->view('templates/penutup');
    }
}
