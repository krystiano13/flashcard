<?php
    session_start();

    if(!isset($_SESSION['deck'])) {
        header('Location: /flashcard/panel.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./components/head.php"; ?>
    <link rel="stylesheet" href="./styles/deck.css?v=11"/>
    <script defer src="dist/deck.js"></script>
</head>
<body>
    <main class="width-100 height-100 d-flex jc-center ai-center">
        <div id="start" class="el bg-hover bg-accent-hover d-flex br-rad-2 jc-center ai-center font-head m-2 bg-primary color-bg f-600 f-xl c-pointer">
            Start Learning
        </div>
        <div id="add" class="el bg-hover bg-accent-hover d-flex br-rad-2 jc-center ai-center font-head m-2 bg-primary color-bg f-600 f-xl c-pointer">
            Add/Remove Cards
        </div>
        <div id="back" class="el bg-hover bg-accent-hover d-flex br-rad-2 jc-center ai-center font-head m-2 bg-primary color-bg f-600 f-xl c-pointer">
            Go Back
        </div>
    </main>
</body>
</html>