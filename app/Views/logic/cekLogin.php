<?php
// Cek cookie
class cekLogin extends Controller{
    public function index(){
        if (isset($_COOKIE['port']) && isset($_COOKIE['key'])) {
            $port = $_COOKIE['port'];
            $key = $_COOKIE['key'];
            // Ambil username berdasarkan port
            $userLogin = $this->model('User_model')->getIdPort($port); 
            if (!empty($userLogin)) {
                // Cek cookie dan username
                if ($key === hash('sha256', $userLogin['username'])) {
                    $_SESSION['islogin'] = true;
                    $_SESSION['username'] = $userLogin["username"];
                } else {
                    setcookie('port', '', 0, '/');
                    setcookie('key', '', 0, '/');
                    header("Location:" . PATH . "/logout");
                    exit;
                }
            } else {
                setcookie('port', '', 0, '/');
                setcookie('key', '', 0, '/');
                header("Location:" . PATH . "/logout");
                exit;
            }
        }
    }
}
