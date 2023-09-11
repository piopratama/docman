<?php
require_once __DIR__ . '/../database.php';

class User {

    public static function authenticate($username, $password) {
        $conn = Database::getConnection();
        
        $stmt = $conn->prepare("SELECT * FROM tb_login WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
}