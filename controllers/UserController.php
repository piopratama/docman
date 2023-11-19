<?php
require_once 'models/User.php';

class UserController {
    public function index() {
        require_once 'views/user.php';
    }
}