<?php

session_start();

if(isset($_POST['card_id'])) {
    $_SESSION['card_id'] = $_POST['card_id'];
    echo json_encode(['status' => true]);
    return;
}

else {
    echo json_encode(['status' => false]);
}