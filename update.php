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

if(isset($_POST['update'])){
    $title=mysqli_real_escape_string($dbc,$_POST['title']);
    $about=mysqli_real_escape_string($dbc, $_POST['about']);;
    $content=mysqli_real_escape_string($dbc, $_POST['content']);;
    $category=mysqli_real_escape_string($dbc, $_POST['category']);
    if(isset($_POST['archive'])){
        $archive='Y';
    }else{
        $archive='N';
    }
    $id=$_POST['id'];
    if($_FILES['pphoto']['size'] != 0){
        $picture = $_FILES['pphoto']['name'];
        $target_dir = 'img/'.$picture;
        move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
        $query = "UPDATE clanak SET naslov='$title', sazetak='$about', tekst='$content',
        slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
        $result = mysqli_query($dbc, $query) or die ('Error updating database<br />' . mysqli_errno($dbc) . ": " . mysqli_error($dbc));;

    }else{
        $query = "UPDATE clanak SET naslov='$title', sazetak='$about', tekst='$content', kategorija='$category', arhiva='$archive' WHERE id=$id ";
        $result = mysqli_query($dbc, $query) or die ('Error updating database<br />'.  mysqli_error($dbc));;
    }
    if ($result) {
        echo' <div class="after_message">Clanak uspjesno uređen! </div>';
        echo '<form class="administracija_forma" action="administracija.php" >
                    <input class="button_povratak" type="submit" value="Povratak na stranicu administracije" />
                </form>';

    }
}
?>

</main>;

<?php
require_once("footer.php");
?>

</body>
