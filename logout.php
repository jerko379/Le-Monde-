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

<body>
<main id="article_main">

    <?php
    $_SESSION['logged']=false;
    echo " <div class='administracija_forma'>Uspjesno ste odjavljeni! </div>";
    echo "<br><div class='administracija_forma'>
                     <form action='index.php'>
                      <input type='submit' value='Home'/> </form> ";
    ?>
    <script type=text/javascript>
        document.getElementById('lr').href='loginregister.php'
        document.getElementById('lr').innerHTML="Login/Register";
    </script>

</main>;

<?php
require_once("footer.php");
?>

</body>