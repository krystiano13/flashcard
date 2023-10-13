<?php

namespace App;
require_once '../classes/Register.php';

use App\Register;

$username = "";
$email = "";
$password = "";
$rep_password = "";

if(isset($_POST['username'])) $username = $_POST['username'];
if(isset($_POST['email'])) $email = $_POST['email'];
if(isset($_POST['password'])) $password = $_POST['password'];
if(isset($_POST['rep_password'])) $rep_password = $_POST['rep_password'];

$user = new Register();
$user -> setUsername($username);
$user -> setEmail($email);
$user -> setPassword($password);
$user -> setRep_Password($rep_password);

$user -> register();