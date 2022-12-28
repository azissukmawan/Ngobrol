<?php
class KomenController extends Controller
{

    public function index()
    {
        return $this->showKomen();
    }

    public function showKomen()
    {

        date_default_timezone_set("Asia/Jakarta");
        $time = date('d F Y H:i');
        $user = $_SESSION['username'];
        $id_post = $_POST['idpost'];
        $komen = $_POST['komen'];

        if (strlen($komen) > 1021) {
            Flasher::setFlash('Komentar tidak boleh melebihi 1000 karakter.', 'danger');
            header('Location: ' . PATH . '/');
            exit;
        } else if (!$komen) {
            Flasher::setFlash('Komentar tidak boleh kosong.', 'danger');
            header('Location: ' . PATH . '/');
            exit;
        }

        try {
            if ($this->model('Komen_model')->ngomen($id_post, $user, $komen, $time) > 0) {
                header("Location: " . PATH . "/#" . $id_post . "");
                exit;
            }
        } catch (Exception $e) {
            echo "NOT FOUND" . $e->getMessage();
        }
    }
}
