<?php

namespace App;

$_SESSION['username'] = NULL;
if(!isset($_SESSION['username'])) {
    echo json_encode(['status' => true]);
}