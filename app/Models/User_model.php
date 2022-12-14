<?php
class User_model
{
    private $table = 'users_tb';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function regist($data)
    {
        // filter data yang diinputkan
        $name = filter_input(INPUT_POST, "nama", FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        // enkripsi password
        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $fpDefault = 'bahan.jpg';
        if ($_FILES['fp']['error'] === 4) {
            $fp = $fpDefault;
        } else {
            $fp = $this->uploadFp();
        }

        // enkripsi password
        // $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users_tb
                    VALUES
                  ('', :nama, :username, :password, :jk, :fp)";

        $this->db->query($query);
        $this->db->bind('nama', $name);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->bind('jk', $data["jk"]);
        $this->db->bind('fp', $fp);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function setLogin($nama, $date){
        $query = "INSERT INTO login_tb VALUES('', :nama, :tgl)";

        $this->db->query($query);
        $this->db->bind('nama', $nama);
        $this->db->bind('tgl', $date);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getIdPort($port){
        $this->db->query('SELECT username FROM'. $this->table .'WHERE id=:id');
        $this->db->bind('id', $port);

        $data = $this->db->execute();

        return $data;
    }

    public function getInfo($data)
    {

        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username=:username');
        $this->db->bind('username', $data);
        $data = $this->db->single();
        return $data;
    }

    public function updateData($data)
    {
        $username = $data["username"];
        $nama = htmlspecialchars($data["nama"]);
        $jk = $data["jk"];
        $fpLama = $data["fpLama"];
        if ($_FILES['fp']['error'] === 4) {
            $fp = $fpLama;
        } else {
            $fp = $this->uploadFp();
        }
        $query = 'UPDATE ' . $this->table . ' SET nama=:nama, jk=:jk, fp=:fp WHERE username=:username';
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->bind('nama', $nama);
        $this->db->bind('jk', $jk);
        $this->db->bind('fp', $fp);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function pwUpdate($data)
    {
        $query = 'UPDATE '.  $this->table .' SET password=:password WHERE username=:username';
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', password_hash($data['pwBaru1'], PASSWORD_DEFAULT));


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function showData($data)
    {

        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username=:username');
        $this->db->bind('username', $data);
        return $this->db->resultSet();
    }

    function uploadFp()
    {
        $namaFile = $_FILES['fp']['name'];
        $ukuranFile = $_FILES['fp']['size'];
        $error = $_FILES['fp']['error'];
        $tmpName = $_FILES['fp']['tmp_name'];
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
        $namaFileBaru = 'profil-';
        $namaFileBaru .= uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        move_uploaded_file($tmpName, LOCALURL . '/img/logo/' . $namaFileBaru);
        return $namaFileBaru;
    }
}
