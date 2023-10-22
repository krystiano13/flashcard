<?php

session_start();


require_once "../classes/Card.php";
use App\Card;
$card = new Card();
$card -> setDeckId(1);
$results = $card -> showCards();

echo json_encode(['status' => true, 'result' => $results]);

