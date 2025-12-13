<?php
class AuthController extends Controller
{
    public function register()
    {
        $jk = $_POST["jk"] ?? null;
        if (!$jk || $_POST["jk"] === "") {
            Flasher::setFlash('Pilih jenis kelamin terlebih dahulu', 'danger');
            header('location: ' . PATH . '/');
            exit;
        }

        if ($_POST['password'] != $_POST['password2']) {
            Flasher::setFlash('Gagal, password tidak sama.', 'danger');
            header('location: ' . PATH . '/');
            exit;
        }

        $row = $this->model('User_model')->getInfo($_POST['username']);
        if (!empty($row) && isset($row['username']) && $row['username'] === $_POST['username']) {
            Flasher::setFlash('Username udah ada yg duluan pake sob!', 'danger');
            header('location: ' . PATH . '/');
            exit;
        }

        try {
            $rc = $this->model('User_model')->regist($_POST);
            error_log('[auth] register username=' . ($_POST['username'] ?? '-') . ' rc=' . $rc);
            if ($rc > 0) {
                Flasher::setFlash('Mantapp sob! silahkan login, enjoyy!', 'success');
            } else {
                Flasher::setFlash('Gagal Register', 'danger');
            }
        } catch (Throwable $e) {
            error_log('[auth] register failed username=' . ($_POST['username'] ?? '-') . ' err=' . $e->getMessage());
            Flasher::setFlash('Gagal Register: ' . $e->getMessage(), 'danger');
        }
        header('location: ' . PATH . '/');
        exit;
    }

    public function loginKuy()
    {
        date_default_timezone_set("Asia/Jakarta");
        $row = $this->model('User_model')->getInfo($_POST['username']);
        if (!empty($row)) {
            if (password_verify($_POST['password'], $row['password'])) {
                error_log('[auth] login success username=' . $row['username']);
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
                error_log('[auth] login wrong-password username=' . $_POST['username']);
                Flasher::setFlash('Password lu salah sob! Coba inget inget', 'danger');
                header('location: ' . PATH . '/');
                exit;
            }
        } else {
            error_log('[auth] login user-not-found username=' . $_POST['username']);
            Flasher::setFlash('Lu belum regist sob! Kuy regist!', 'danger');
            header('location: ' . PATH . '/');
            exit;
        }
    }
}
