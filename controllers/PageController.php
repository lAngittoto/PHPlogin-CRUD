<?php
class PageController {
    public function register() {
        require __DIR__ . '/../views/register.php';
    }

    public function login() {
        require __DIR__ . '/../views/login.php';
    }
    public function dashboard() {
        require __DIR__."/../views/dashboard.php";
    }
}
