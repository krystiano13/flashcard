<?php

session_start();

if(isset($_POST['deck_id']) && isset($_POST['deckName'])) {
    $_SESSION['deck'] = $_POST['deck_id'];
    $_SESSION['deckName'] = $_POST['deckName'];
}

echo json_encode(['status'=>true]);