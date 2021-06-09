<!DOCTYPE html>

<head>
    <title>Le Monde</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="author" content="Jerko Josipović">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>


<?php
require_once("header.php");
?>

<?php
require_once("connect.php");
?>

<body>
<main id="article_main">
<?php

    $query = "SELECT * FROM clanak ORDER BY datum DESC";
    $result = mysqli_query($dbc, $query);
    while($row = mysqli_fetch_array($result)) {
        $date = date_create($row['datum']);

        echo' <div id="clanak_top">
        <p id="clanak_kategorija">'.$row['kategorija'].'</p>
        <h1 id="clanak_naslov">'.$row['naslov'].'</h1>
        <h2 id="clanak_sazetak">'.$row['sazetak'].'</h2>
        <p id="autor"> Autor: </p> 
        <p id="datum_objave"> Objavljeno : '.date_format($date,'d.m.Y H:i:s') .'</p>
    </div>

    <img id ="clanak_slika" src="img/' . $row['slika'] . '" alt="slika">
    <article id="clanak_tekst">'.$row['tekst'].'
    </article>';

    echo '<form  class="administracija_forma"   action="delete.php" method="POST">
        
        <div class="form-item">
            <input type="hidden" name="id" class="form-field-textual"
                   value="'.$row['id'].'">
            <button id="delete_button" type="submit" name="delete" value="Izbriši">
                Izbriši</button>
        </div>
    </form>';
    }


?>
</main>';
<?php
require_once("footer.php");
?>

</body>