<!DOCTYPE html>

<head>
    <title>Le Monde</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="author" content="Jerko Josipović">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>


<?php
require_once("header.php");
?>

<body>
<main id="article_main">

<?php
require 'connect.php';
$picture = $_FILES['photo']['name'];
$title=mysqli_real_escape_string($dbc,$_POST['title']);
$about=mysqli_real_escape_string($dbc, $_POST['about']);;
$content=mysqli_real_escape_string($dbc, $_POST['content']);;
$category=mysqli_real_escape_string($dbc, $_POST['category']);
if(isset($_POST['archive'])){
    $archive='Y';
}else{
    $archive='N';
}
$target_dir = 'img/'.$picture;
move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir);
$query = "INSERT INTO clanak ( naslov, sazetak, tekst, slika, kategorija,
arhiva ) VALUES ( '$title', '$about', '$content', '$picture',
'$category', '$archive')";
$result = mysqli_query($dbc, $query) or die ('Error querying database<br />'.  mysqli_error($dbc));;
mysqli_close($dbc);
if ($result) {
    echo' <div class="after_message">Clanak uspjesno objavljen! </div>';
    echo " <br><form class='administracija_forma' action='administracija.php'>
                <input class='button_povratak' type='submit' value='Povratak na stranicu administracije' />
                    </form>";
}

?>

</main>;

<?php
require_once("footer.php");
?>

</body>
