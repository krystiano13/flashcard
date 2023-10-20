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
    <link rel="stylesheet" href="./styles/login.css?v=11"/>
    <script defer src="dist/addCard.js"></script>
</head>
<body>
<main id="<?php echo $_SESSION['deck']; ?>" class="width-100 height-100 d-flex flex-col jc-center ai-center bg">
    <?php
        require_once './classes/Form.php';
        use App\Form;
        $form = new Form();
        $form -> setMethod("post") ->setId('cardForm') -> setButton('Add')
        ->addInput('text', 'oneSide', "Card's first side", 'cardInput',"")
        ->addInput('text', 'secondSide',"Card's second side", 'cardInput2',"");
        echo $form -> render();
    ?>
</main>
</body>
</html>
