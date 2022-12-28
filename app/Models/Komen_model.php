<?php
class Komen_model
{
    private $db;
    private $table = 'komen_tb';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function dataKomen($data)
    {
        $query = "SELECT id, username, komen, time FROM " . $this->table . " WHERE id_post=:id_post";
        $this->db->query($query);
        $this->db->bind('id_post', $data);

        return $this->db->resultSet();
    }

    // public function deletePost($id)
    // {
    //     $query = "DELETE FROM " . $this->table . " WHERE id=:id";
    //     $this->db->query($query);
    //     $this->db->bind('id', $id);
    //     $this->db->execute();

    //     $this->db->rowCount();
    // }

    public function getInfoKomen($data)
    {
        // $this->db->query('SELECT nama, fp FROM users_tb, komen_tb WHERE users_tb.username=:komen_tb.username ORDER BY id_post DESC');
        // $this->db->bind('komen_tb.username', $data);
        // $data = $this->db->single();
        // return $data;
        $this->db->query("SELECT nama, fp FROM users_tb WHERE username:=username");
        $this->db->bind('username', $data);
        $data = $this->db->single();
        return $data;
    }

    public function ngomen($id_post, $user, $komen, $timePosting)
    {

        $query = "INSERT INTO " . $this->table .  " VALUES('', :id_post, :username, :komen, :time)";
        $this->db->query($query);
        $this->db->bind('id_post', $id_post);
        $this->db->bind('username', $user);
        $this->db->bind('komen', $komen);
        $this->db->bind('time', $timePosting);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
