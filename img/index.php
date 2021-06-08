<!DOCTYPE html>

<head>
    <title>Le Monde</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <meta name="author" content="Jerko Josipović">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">


</head>


<header>
    <a href="../index.php"><img id="header_img" src="../img/naslov.png" alt="Le Monde" width="50%"></a>
    <hr>
    <nav>
        <ul class="flexnav">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../kategorija.php?kategorija=politika">Politika</a></li>
            <li><a href="../kategorija.php?kategorija=sport">Sport</a></li>
            <li><a href="../administracija.php">Administracija</a></li>
        </ul>
    </nav>
</header>



<body>
<main id="article_main">


    <p id="razbojnik">Nećeš razbojniče!</p>
    <br>
    <form class='administracija_forma' action='../index.php'>
        <input class='button_povratak' type='submit' value='Povratak na glavnu stranicu' />
    </form>


</main>




<?php
require_once("../footer.php");
?>

