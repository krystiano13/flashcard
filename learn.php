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
    <link rel="stylesheet" href="./styles/learn.css" />
    <script defer src="dist/learn.js"></script>
</head>
<body>
    <main class="width-100 height-100 d-flex ai-center jc-center">
        <button class="br-rad-1 c-pointer width-10 color-bg bg-primary font-head br-none p-2 m-1" id="left">Previous</button>
        <div class="br-rad-2 c-pointer m-1 bg-primary color-bg width-25 height-75 d-flex flex-col jc-evenly ai-center" id="card">
            <p class="font-head">Tekst</p>
            <label class="font-other">click to swipe</label>
        </div>
        <button class="br-rad-1 c-pointer width-10 color-bg bg-primary font-head br-none p-2 m-1" id="right">Next</button>
    </main>
</body>
</html>