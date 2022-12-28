<?php
class Post_model
{
    private $table = "postingan_tb";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function posting($usernameUser, $teks, $timePosting)
    {
        $imgDefault = "";
        if ($_FILES['img']['error'] === 4) {
            $img = $imgDefault;
        } else {
            $img = $this->uploadImg();
        }

        $query = "INSERT INTO " . $this->table . " VALUES('', :username, :teks, :img, :time)";
        $this->db->query($query);
        $this->db->bind('username', $usernameUser);
        $this->db->bind('teks', $teks);
        $this->db->bind('img', $img);
        $this->db->bind('time', $timePosting);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updatePost($data)
    {
        $id = $data["id"];
        $teks = $data["teks"];
        $imgLama = $data["imgLama"];
        if ($_FILES['img']['error'] === 4) {
            $img = $imgLama;
        } else {
            $img = $this->uploadImg();
        }
        $query = "UPDATE " . $this->table . " SET teks=:teks, img=:img WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('teks', $teks);
        $this->db->bind('img', $img);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePost($id)
    {

        $query = "DELETE postingan_tb, like_tb, komen_tb
        FROM postingan_tb
        LEFT JOIN komen_tb ON postingan_tb.id = komen_tb.id_post
        LEFT JOIN like_tb ON postingan_tb.id = like_tb.id_post
        WHERE postingan_tb.id = :id OR komen_tb.id_post IS NULL AND like_tb.id_post IS NULL
        ";

        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->execute();

        $this->db->rowCount();
    }

    public function postingan()
    {
        $query = "SELECT id, username, teks, img, time FROM " . $this->table . " ORDER BY id DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function personalPostingan($username)
    {
        $query = "SELECT id, username, teks, img, time FROM " . $this->table . " WHERE username=:username ORDER BY id DESC";
        $this->db->query($query);
        $this->db->bind('username', $username);
        return $this->db->resultSet();
    }

    public function getPost($id)
    {
        $query = "SELECT id, username, teks, img, time FROM " . $this->table . " WHERE id=:id ORDER BY id DESC";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function uploadImg()
    {
        $namaFile = $_FILES['img']['name'];
        $ukuranFile = $_FILES['img']['size'];
        $error = $_FILES['img']['error'];
        $tmpName = $_FILES['img']['tmp_name'];
        // cek apakah yang diupload adalah file gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
				alert('Format Gambar Tidak Didukung! Format Yang Didukung (jpg/jpeg/png).');
			</script>";
            return false;
        }
        // cek jika ukurannya terlalu besar
        if ($ukuranFile > 5000000) {
            echo "<script>
				alert('Ukuran File Terlalu Besar!');
			</script>";
            return false;
        }

        // lolos pengecekan, gambar siap diupload
        // generate nama gambar baru
        $namaFileBaru = 'img-';
        $namaFileBaru .= uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        move_uploaded_file($tmpName, LOCALURL . '/img/post/' . $namaFileBaru);
        return $namaFileBaru;
    }
}
