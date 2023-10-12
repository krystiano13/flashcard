<?php

namespace App;
require_once '../classes/User.php';

use App\User;

$username = "";
$password = "";

if(isset($_POST['username'])) {
    $username = $_POST['username'];
}

if(isset($_POST['password'])) {
    $password = $_POST['password'];
}

$user = new User();
$user->setUsername($username);
$user->setPassword($password);
$user->login();

