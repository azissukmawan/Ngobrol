<?php
class HomeController extends Controller
{
    
    public function index($row)
    {
        $_SESSION['username'] = $row;
        $data['judul'] = 'Beranda | ';
        $data['user'] = $this->model('User_model')->showData($row);
        $this->view('templates/metaTag', $data);
        $this->view('styles/style');
        $this->view('templates/header', $data);
        $this->view('home/home', $data);
        $this->view('modal/modalLogout');
        $this->view('templates/footer');
        $this->view('scripts/scriptDefault');
        $this->view('templates/penutup');
    }
}
