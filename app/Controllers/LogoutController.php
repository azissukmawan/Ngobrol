<?php
class LogoutController extends Controller
{
    public function index()
    {
        $data['judul'] = 'Logout | ';
        $data['user'] = $this->model('User_model')->getInfo($_SESSION['username']);
        $this->view('logic/akses');
        $this->view('logic/clearCookie');
        $this->view('templates/metaTag', $data);
        $this->view('styles/style');
        $this->view('templates/header', $data);
        $this->view('logout/logout');
        $this->view('scripts/scriptDefault');
        $this->view('templates/penutup');
    }
}
?>