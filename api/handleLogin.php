<?php

namespace App;
require_once '../classes/User.php';

use App\User;

if(isset($_POST['username']) && isset($_POST['password'])) {
    $user = new User();
    $user -> setUsername($_POST['username']);
    $user -> setPassword($_POST['password']);
    $user -> login();
}
