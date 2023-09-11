<?php
require_once 'models/User.php';

class LoginController {
    public function index() {
        require_once 'views/login.php';
    }

    public function authenticate() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = User::authenticate($username, $password);

        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: dashboard');
        } else {
            echo "Invalid credentials";
        }
    }
}