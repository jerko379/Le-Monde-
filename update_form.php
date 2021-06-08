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

    $query = "SELECT * FROM clanak";
    $result = mysqli_query($dbc, $query);
    while($row = mysqli_fetch_array($result)) {

        echo '<form  class="administracija_forma"  enctype="multipart/form-data" action="update.php" method="POST">
        <div class="form-item">
            <label for="title">Naslov vjesti:</label>
            <div class="form-field">
                <input type="text" name="title" size="30" class="form-field-textual"
                       value="'.$row['naslov'].'">
            </div>
        </div>
        <div class="form-item">
            <label for="about">Kratki sadržaj vijesti ::</label>
            <div class="form-field">
                <textarea name="about" id="" cols="40" rows="10" class="formfield-textual">'.$row['sazetak'].'</textarea>
            </div>
        </div>
        <div class="form-item">
            <label for="content">Sadržaj vijesti:</label>
            <div class="form-field">
                <textarea name="content" id="" cols="40" rows="10" class="formfield-textual">'.$row['tekst'].'</textarea>
            </div>
        </div>
        <div class="form-item">
            <label for="pphoto">Slika:</label>
            <div class="form-field">
                <input type="file" class="input-text" id="pphoto"
                       value="'.$row['slika'].'" name="pphoto"/> <br><img src="img/'  .
            $row['slika'] . '" width=100px>
            </div>
        </div>
        <div class="form-item">
            <label for="category">Kategorija vijesti:</label>
            <div class="form-field">
                <select name="category" id="" class="form-field-textual"
                        value="'.$row['kategorija'].'">
                    <option value="Sport">Sport</option>
                    <option value="Politika">Politika</option>
                </select>
            </div>
        </div>
        <div class="form-item">
            <label>Spremiti u arhivu:
                <div class="form-field">';
        if($row['arhiva'] == 'N') {
            echo '<input type="checkbox" name="archive" id="archive"/>
                    Arhiviraj?';
        } else {
            echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';
        }
        echo '</div>
            </label>
        </div>
        </div>
        <div class="form-item">
            <input type="hidden" name="id" class="form-field-textual"
                   value="'.$row['id'].'">
            <button type="reset" value="Poništi">Poništi</button>
            <button type="submit" name="update" value="Prihvati">
                Izmjeni</button>
        </div>
    </form>';
    }

    ?>
</main>';

<?php
require_once("footer.php");
?>

</body>
