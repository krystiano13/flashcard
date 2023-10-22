<?php
session_start();
if(!isset($_SESSION['deck'])) {
    header("Location: /flashcard/panel.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./components/head.php"; ?>
</head>
<body>
    <main class="width-100 height-100 d-flex ai-center jc-center">
        <button id="left">Previous</button>
        <div id="card">
            <p>Tekst</p>
            <label>click to swipe</label>
        </div>
        <button id="right">Next</button>
    </main>
</body>
</html>