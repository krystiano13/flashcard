<?php

session_start();

if(
    !isset($_POST['id']) ||
    !isset($_POST['name'])
) {
    echo json_encode(['status' => false]);
    return;
}

require_once "../classes/Deck.php";
use App\Deck;

$id = $_POST['id'];
$name = $_POST['name'];

$deck = new Deck();
$deck -> renameDeck($name, (int)$id);
