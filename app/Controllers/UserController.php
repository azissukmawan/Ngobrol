<?php
class UserController extends Controller
{
    public function index($p)
    {
        $data['username'] = $p;
        $data['judul'] = 'Amawan' . ' | ';
        $this->view('logic/akses');
        $this->view('templates/metaTag', $data);
        $this->view('styles/style');
        $this->view('templates/header');
        $this->view('profil/user', $data);
        $this->view('modal/modalLogout');
        $this->view('templates/footer');
        $this->view('scripts/scriptDefault');
        $this->view('templates/penutup');
    }
}
