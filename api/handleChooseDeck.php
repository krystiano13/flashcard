<?php

session_start();

if(isset($_POST['deck_id'])) {
    $_SESSION['deck'] = $_POST['deck_id'];
}

echo json_encode(['status'=>true]);