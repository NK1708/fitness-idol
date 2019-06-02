<?
    if ($_GET['i']) {
        $filename = $_SERVER['DOCUMENT_ROOT'].'uploads/' . $_GET['i'] . '.png';

        if (file_exists($filename)) {
            $img = '../uploads/'. $_GET['i'] . '.png';
            //var_dump($filename);
        } else {
            var_dump($filename);
            die();
        }
        
    } 
?>

<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="shortcut icon" href="../img/favicon/fire.png" type="image/x-icon">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#fff">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#fff">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#fff">

    <meta name="format-detection" content="telephone=no">
    
    <title>Тебе открытка-приглашение! Открой!</title>
    
    <meta property="og:title" content="Тебе открытка-приглашение! Открой!" />
    <meta property="og:description" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="/o/?i=11943.077280184842" />
    <meta property="og:image" content="<?=$img?>" />


</head>

<body>


    <div class="done-box">
        <img src="<?=$img?>" class="done-img">
        <ul>
            <li>1. Распечатай или сохрани приглашение в телефон</li>
            <li>2. Запишись на целый день бесплатного фитнеса в любом удобном Drive Fitness</li>
            <li>3. Предъяви купон в день посещения клуба</li>
            <li>4. Start Your Drive!</li>
        </ul>
        <a href="http://invite.drivefitness.ru" class="book_button">Вернуться на главную</a>
    </div>


    <link rel="stylesheet" href="../css/main.min.css">
    <link rel="stylesheet" href="../css/dop.min.css">
    <script src="../js/scripts.min.js"></script>
  
</body>
</html>

