<?php

session_start();

if(!isset($_SESSION['deck'])) {
    header('Location: /flashcard/panel.php');
    return;
}

require_once "../classes/Card.php";
use App\Card;

$id = $_SESSION['id'];

$card = new Card();
$result =
    $card
    ->setDeckId((int)$id)
    ->showCards();