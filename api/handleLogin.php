<?php

namespace App;
require_once '../classes/Login.php';

use App\Login;

session_start();

$username = "";
$password = "";

if(isset($_POST['username'])) {
    $username = $_POST['username'];
}

if(isset($_POST['password'])) {
    $password = $_POST['password'];
}

$user = new Login();
$user->setUsername($username);
$user->setPassword($password);
$user->login();

