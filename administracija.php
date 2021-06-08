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

if (isset($_SESSION['logged']) and isset($_SESSION['razina'])) {
            if ($_SESSION['logged'] == true) {
                if($_SESSION['razina']== 'A') {
                    echo '
                            <div class="administracija_forma">
                            <form action="insert_form.php">
                                <input type="submit" value="Novi članak" />
                            </form>
                                <br>
                            <form action="update_form.php">
                                <input type="submit" value="Uređivanje članaka" />
                            </form>
                                <br>
                            <form action="delete_form.php">
                                <input type="submit" value="Brisanje članaka" />
                            </form>
                            <br>
                            <br>
                            <br>
                            <form action="logout.php">
                                <input type="submit" value="Odjava" />
                            </form>
                            </div>';
                } else {
                    echo "<div class='administracija_forma'>
                        <form action='logout.php'>
                                <input type='submit' value='Odjava' />
                            </form> ";

                }
            }
            }

?>
</main>

<?php
require_once("footer.php");
?>
</body>
