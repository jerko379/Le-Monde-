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

<body>

<?php
    require_once("header.php");
?>

<?php
require_once("connect.php");

$query = "SELECT * FROM clanak WHERE arhiva='N' AND kategorija='politika' ORDER BY datum DESC LIMIT 3 ";
$result = mysqli_query($dbc, $query);

?>

<main>
<hr>
    <section id="politika">
        <a href="kategorija.php?kategorija=politika"><h1 class="naslov_main">Politika</h1></a>
        <div class="flexmain">
            <?php

            while($row = mysqli_fetch_array($result)) {
                $sazetak=$row['sazetak'];
                if (strlen($sazetak) >200) {
                    $sazetak = substr($sazetak,0,200) . '...';
                }
            echo '<article> <a href="article.php?id='.$row['id'].'">
            <img src="img/' . $row['slika'] . '" alt=" ' . $row['slika'] . ' ">
            <p>   ' . $sazetak . '</p></a>
        </article>'; }
            ?>
        </div>
    </section>
    <hr>

    <?php
    $query = "SELECT * FROM clanak WHERE arhiva='N' AND kategorija='sport' ORDER BY datum DESC LIMIT 3";
    $result = mysqli_query($dbc, $query);
    ?>
    <section id="Sport" >
        <a href="kategorija.php?kategorija=sport"><h1 class="naslov_main">Sport</h1></a>
        <div class="flexmain">
            <?php
            while($row = mysqli_fetch_array($result)) {
                $sazetak = $row['sazetak'];
                if (strlen($sazetak) > 255) {
                    $sazetak = substr($sazetak, 0, 100) . '...';
                }
                echo '<article> <a href="article.php?id=' . $row['id'] . '">
            <img src="img/' . $row['slika'] . '" alt=" ' . $row['slika'] . ' ">
            <p>   ' . $sazetak . '</p></a>
        </article>';
            }
            ?>
        </div>
    </section>

</main>
<script>
    prijavljen=false;
    if (prijavljen) {
        document.getElementById("lr").innerText="ODJAVA";
    }
</script>

<?php
mysqli_close($dbc);
require_once("footer.php");
?>

</body>
