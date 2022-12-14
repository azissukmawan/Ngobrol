<?php
class AuthController extends Controller
{
    public function register()
    {
        $jk = $_POST["jk"];
        if (!$jk || $_POST["jk"] === "") {
            Flasher::setFlash('Invalid', ' Pilih jenis kelamin terlebih dahulu', 'danger');
            header('location: ' . PATH . '/');
            exit;
        }

        if ($_POST['password'] == $_POST['password2']) {
            $row = $this->model('User_model')->getInfo($_POST['username']);
            if ($row['username'] == $_POST['username']) {
                Flasher::setFlash('Username udah ada yg duluan pake sob! ', 'Coba lagi', 'danger');
                header('location: ' . PATH . '/');
                exit;
            } else {
                if ($this->model('User_model')->regist($_POST) > 0) {
                    Flasher::setFlash('Mantapp sob! ', 'silahkan login, enjoyy!', 'success');
                    header('location: ' . PATH . '/');
                    exit;
                } else {
                    Flasher::setFlash('Gagal', 'Register', 'danger');
                    header('location: ' . PATH . '/');
                    exit;
                }
            }
        } else {
            Flasher::setFlash('Gagal', 'password tidak sama.', 'danger');
            header('location: ' . PATH . '/');
            exit;
        }
    }

    public function loginKuy()
    {
        $row = $this->model('User_model')->getInfo($_POST['username']);
        if (!empty($row)) {
            if (password_verify($_POST['password'], $row['password'])) {
                $_SESSION["username"] = $row["username"];
                $_SESSION["id"] = $row["id"];
                $nama = $row['nama'];
                $date = date('Y-m-d H:i:s');
                $_SESSION['islogin'] = true;
                $_SESSION['success'] = true;

                // recent login
                $this->model('User_model')->setLogin($nama, $date);
                header('location: ' . PATH . '/set');
            } else {
                Flasher::setFlash('Password lu salah sob!', ' Coba inget inget', 'danger');
                header('location: ' . PATH . '/');
                exit;
            }
        } else {
            Flasher::setFlash('Lu belum regist sob!', ' Kuy regist!', 'danger');
            header('location: ' . PATH . '/');
            exit;
        }
    }
}
