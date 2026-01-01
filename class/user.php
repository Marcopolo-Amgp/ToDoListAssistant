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

    /* REGISTER USER */
public function register($data) {
    // cek email sudah terdaftar atau belum
    $check = $this->db->prepare(
        "SELECT id FROM users WHERE email = :email"
    );
    $check->execute(['email' => $data['email']]);

    if ($check->rowCount() > 0) {
        return "Email already registered";
    }

    // hash password
    $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

    // insert user baru
    $stmt = $this->db->prepare(
        "INSERT INTO users (username, email, password)
         VALUES (:username, :email, :password)"
    );

    return $stmt->execute([
        'username' => $data['username'],
        'email'    => $data['email'],
        'password' => $hashedPassword
    ]);
}


    /* LOGOUT USER */
    public function logout() {
        session_destroy();
        return true;
    }
}