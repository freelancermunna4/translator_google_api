<?php

require_once ('vendor/autoload.php');
use \Statickidz\GoogleTranslate;
if(isset($_POST['translate'])){
    if(!empty($_POST['left_inp']) && empty($_POST['right_inp'])){
    $source = 'en';
    $target = 'bn';
    $text = $_POST['left_inp'];
    $trans = new GoogleTranslate();
    $result = $trans->translate($source, $target, $text);

    $a = $text;
    $b = $result;
    }elseif(empty($_POST['left_inp']) && !empty($_POST['right_inp'])){
    $source = 'bn';
    $target = 'en';
    $text = $_POST['right_inp'];
    $trans = new GoogleTranslate();
    $result = $trans->translate($source, $target, $text);

    $b = $text;
    $a = $result;
    }else{
        header("location:index.php");
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Translator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section>
    <div class="box">
            <h1>Translate App With Google API</h1>
        <form action="" method="POST">
            <div class="top">
                <div class="left_box">
                    <textarea name="left_inp"><?php if(isset($_POST['translate'])){echo $a; }?></textarea>
                </div>
                <div  class="right_box">
                <textarea name="right_inp"><?php if(isset($_POST['translate'])){echo $b; }?></textarea>
                </div>
            </div>
            <div class="botton">
                <div class="btn">
                    <button name="translate" type="submit">Translate</button>
                    <a href="index.php">&#x21bb;</a>
                </div>
            </div>
        </form>
    </div>
</section>

</body>
</html>