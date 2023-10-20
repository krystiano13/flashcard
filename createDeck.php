<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./components/head.php"; ?>
    <link rel="stylesheet" href="./styles/login.css?v=11"/>
    <script defer src="dist/deckCreate.js"></script>
</head>
<body>
<main class="width-100 height-100 d-flex flex-col jc-center ai-center bg">
    <?php
    require_once './classes/Form.php';
    use App\Form;
    $form = new Form();
    $form -> setMethod("post") ->setId('form') -> setButton('Create')
        ->addInput('text', 'name', "deck name", 'deckInput', "");
    echo $form -> render();
    ?>
</main>
</body>
</html>