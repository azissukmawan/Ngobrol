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
        $query = "SELECT users_tb.*, komen_tb.*
        FROM users_tb
        JOIN komen_tb ON users_tb.username = komen_tb.username
        WHERE komen_tb.id_post=:id
        ";
        $this->db->query($query);
        $this->db->bind('id', $data);

        return $this->db->resultSet();
    }


    public function getInfoKomen($data)
    {
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
