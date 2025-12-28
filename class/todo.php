<?php
require_once 'Database.php';

class Todo extends Database {

    private $db;

    public function __construct() {
        parent::__construct();
        $this->db = $this->getConnection();
    }

    /* GET ALL TODOS BY USER */
    public function getAll($userId) {
        $stmt = $this->db->prepare(
            "SELECT * FROM todos WHERE user_id = :user_id ORDER BY created_at DESC"
        );
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /* GET TODO BY ID */
    public function getById($id) {
        $stmt = $this->db->prepare(
            "SELECT * FROM todos WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /* CREATE TODO */
    public function create($data, $userId) {
        $stmt = $this->db->prepare(
            "INSERT INTO todos (user_id, title, description)
             VALUES (:user_id, :title, :description)"
        );

        return $stmt->execute([
            'user_id'     => $userId,
            'title'       => $data['title'],
            'description' => $data['description']
        ]);
    }

    /* UPDATE TODO */
    public function update($data) {
        $stmt = $this->db->prepare(
            "UPDATE todos
             SET title = :title,
                 description = :description,
                 status = :status
             WHERE id = :id"
        );

        return $stmt->execute([
            'id'          => $data['id'],
            'title'       => $data['title'],
            'description' => $data['description'],
            'status'      => $data['status']
        ]);
    }

    /* DELETE TODO */
    public function delete($id) {
        $stmt = $this->db->prepare(
            "DELETE FROM todos WHERE id = :id"
        );
        return $stmt->execute(['id' => $id]);
    }
}