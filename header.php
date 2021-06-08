<header>
    <?php
    session_start();
    $link1="loginregister.php";
    $tekst1="Login/Register";
    $username='';
    if (isset($_SESSION['logged']) and isset($_SESSION['loggedUsername'])) {
        if($_SESSION['logged']==true) {
            $link1 = "logout.php";
            $tekst1 = "Odjava";
            $username=$_SESSION['loggedUsername'];
            if ($_SESSION['razina']=='A') {
                $link1 = "administracija.php";
                $tekst1= "Administracija";
            }
        }

    }
    ?>
    <a href="index.php"><img id="header_img" src="img/naslov.png" alt="Le Monde" width="50%"></a>
    <hr>
        <nav>
            <ul class="flexnav">
                <li><a href="index.php">Home</a></li>
                <li><a href="kategorija.php?kategorija=politika">Politika</a></li>
                <li><a href="kategorija.php?kategorija=sport">Sport</a></li>
                <?php
                echo '<li ><a id="lr" href="'.$link1 .'">'.$tekst1.'</a></li>';
                ?>


            </ul>
        </nav>
</header>
<?php

?>

