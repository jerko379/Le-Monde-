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

    if(isset($_POST['delete'])){
        $id=$_POST['id'];
        $query = "DELETE FROM clanak WHERE id=$id ";
        $result = mysqli_query($dbc, $query) or die ('Error updating database<br />'.  mysqli_error($dbc));
    }

    if ($result) {
        echo' <div class="after_message">Clanak uspjesno izbrisan! </div>';
        echo '<form class="administracija_forma" action="administracija.php" >
                    <input  class="button_povratak"  type="submit" value="Povratak na stranicu administracije" />
                </form>';

    }

    ?>
</main>;

<?php
require_once("footer.php");
?>

</body>
