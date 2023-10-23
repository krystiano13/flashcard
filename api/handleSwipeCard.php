<?php

session_start();

if(
    !isset($_SESSION['username'])
) {
    echo json_encode(['status' => false]);
}

require_once "../classes/Card.php";
use App\Card;
$card = new Card();

$card -> swipeCards($_SESSION['username']);
