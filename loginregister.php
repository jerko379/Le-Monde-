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
    <div class="administracija_forma">
    <form action='login.php'>
        <input type='submit' value='Prijava' />
    </form>
        <br>
    <form action='register.php'>
        <input type='submit' value='Registracija' />
    </form>
    </div>

</main>

<?php
require_once("footer.php");
?>
</body>
