<?php
require_once 'Database.php';

class User extends Database {

    private $db;

    public function __construct() {
        parent::__construct();
        $this->db = $this->getConnection();
    }

    /* LOGIN USER */
    public function login($data) {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE email = :email LIMIT 1"
        );
        $stmt->execute(['email' => $data['email']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($data['password'], $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }

        return false;
    }

    /* LOGOUT USER */
    public function logout() {
        session_destroy();
        return true;
    }
}