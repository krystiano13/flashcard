<?php

session_start();

if(!isset($_SESSION['deck'])) {
    header('Location: /flashcard/panel.php');
    return;
}

require_once "./classes/Card.php";
use App\Card;

$id = $_SESSION['deck'];
$card = new Card();
$result = (array)$card -> setDeckId($id) -> showCards();