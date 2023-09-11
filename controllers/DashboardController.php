<?php
require_once 'models/User.php';

class DashboardController {
    public function index() {
        require_once 'views/dashboard.php';
    }
}