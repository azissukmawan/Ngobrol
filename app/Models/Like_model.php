<?php
class Like_model
{
    private $db;
    private $table = 'like_tb';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function rowsLike($id_post, $usernameUser)
    {
        $query = "SELECT COUNT(*) FROM " . $this->table . " WHERE id_post=:id_post AND username=:username";
        $this->db->query($query);
        $this->db->bind('id_post', $id_post);
        $this->db->bind('username', $usernameUser);
        return (int) $this->db->rowColumn();
    }

    public function deletePost($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        $this->db->rowCount();
    }

    public function like($postId)
    {
        $query = "SELECT id FROM " . $this->table . " WHERE id_post=:id_post";
        $this->db->query($query);
        $this->db->bind('id_post', $postId);
        return $this->db->resultSet();
    }

    public function ngelike($id_post, $usernameUser)
    {
        if ($this->rowsLike($id_post, $usernameUser) > 0) {
            return false;
        } else {
            $query1 = "INSERT INTO " . $this->table . " (id_post, username) VALUES(:id_post, :username)";
            $this->db->query($query1);
            $this->db->bind('id_post', $id_post);
            $this->db->bind('username', $usernameUser);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }
}
