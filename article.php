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
<?php
$id=$_GET['id'];
$query = "SELECT * FROM clanak WHERE id=$id";
$result = mysqli_query($dbc, $query);

$row = mysqli_fetch_array($result);
$date = date_create($row['datum']);
    echo '
<body>
<main id="article_main">

    <div id="clanak_top">
        <p id="clanak_kategorija">'.$row['kategorija'].'</p>
        <h1 id="clanak_naslov">'.$row['naslov'].'</h1>
        <h2 id="clanak_sazetak">'. nl2br($row['sazetak']).'</h2>
        <p id="datum_objave"> Objavljeno : '.date_format($date,'d.m.Y H:i:s') .'</p>
    </div>

    <img id ="clanak_slika" src="img/' . $row['slika'] . '" alt="slika">
    <article id="clanak_tekst">'.nl2br($row['tekst']).'
    </article>
    </main>';

mysqli_close($dbc);

?>




<?php
require_once("footer.php");
?>

