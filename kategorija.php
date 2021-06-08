
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
$kategorija=$_GET['kategorija'];
$query = "SELECT * FROM clanak WHERE arhiva='N' AND kategorija='$kategorija' ORDER BY datum DESC ";
$result = mysqli_query($dbc, $query);

?>

<main>
    <hr>
    <section id="kategorija">
        <h1 class="naslov_main"><?php echo ucfirst($kategorija) ?></h1>
        <div  class="flexmain_kategorija">
            <?php
            while($row = mysqli_fetch_array($result)) {
                echo '<article> <a href="article.php?id='.$row['id'].'">
            <img src="img/' . $row['slika'] . '" alt=" ' . $row['slika'] . ' ">
            <p>   ' . $row['sazetak'] . '</p></a>
        </article>'; }
            ?>
        </div>
    </section>

</main>

<?php
mysqli_close($dbc);
require_once("footer.php");
?>

</body>
