<?php
    session_start();
    if(!isset($_SESSION['deck']) || !isset($_SESSION['card_id'])) {
        header('Location: /flashcard/cards.php');
    }

    require_once "classes/Card.php";
    use App\Card;

    $card = new Card();
    $data = $card -> getOneCard($_SESSION['card_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./components/head.php"; ?>
    <link rel="stylesheet" href="./styles/login.css?v=11"/>
    <script defer src="dist/editCard.js"></script>
</head>
<body>
<main id="<?php echo $data['id']; ?>" class="width-100 height-100 d-flex flex-col jc-center ai-center bg">
    <?php
    require_once './classes/Form.php';
    use App\Form;
    $form = new Form();
    $form -> setMethod("post") ->setId('cardForm') -> setButton('Edit')
        ->addInput('text', 'oneSide',
            "Card's first side", 'cardInput',$data['one'])
        ->addInput('text', 'secondSide',
            "Card's second side", 'cardInput2',$data['second']);
    echo $form -> render();
    ?>
</main>
</body>
</html>
