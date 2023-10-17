<?php

session_start();

if(!isset($_POST['id'])) {
    echo json_encode(['status' => false]);
    return;
}

require_once "../classes/Deck.php";
use App\Deck;

$id = $_POST['id'];

$deck = new Deck();
$deck -> deleteDeck($id);

