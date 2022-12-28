<?php
class LikeController extends Controller
{
    public function likee()
    {
        $usernameUser = $_SESSION['username'];
        $id_post = $_POST['id_post'];
        if ($this->model('Like_model')->ngelike($id_post, $usernameUser) > 0) {
            header("Location: " . PATH . "/#" . $id_post . "");
            exit;
        } else {
            $gagalLike = false;
        }
    }

    public function likeProfile()
    {
        $usernameUser = $_SESSION['username'];
        $id_post = $_POST['id_post'];
        if ($this->model('Like_model')->ngelike($id_post, $usernameUser) > 0) {
            header("Location: " . PATH . "/profil/#" . $id_post . "");
            exit;
        } else {
            $gagalLike = false;
        }
    }

    public function likeUser()
    {
        $usernameUser = $_SESSION['username'];
        $id_post = $_POST['id_post'];
        $user = $_POST['userName'];
        if ($this->model('Like_model')->ngelike($id_post, $usernameUser) > 0) {
            header("Location: " . PATH . "/user/" . $user . "/#" . $id_post . "");
            exit;
        } else {
            $gagalLike = false;
        }
    }
}
