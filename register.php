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

        <form class="administracija_forma" id="forma" enctype="multipart/form-data" action="" method="POST">
            <div class="form-item">
                <label for="ime">Ime: </label>
                <div class="form-field">
                    <input type="text" name="ime" id="ime" class="form-fieldtextual">
                </div>
                <span id="porukaIme" class="bojaPoruke"></span>
            </div>
            <div class="form-item">
                <label for="prezime">Prezime: </label>
                <div class="form-field">
                    <input type="text" name="prezime" id="prezime" class="formfield-textual">
                </div>
                <span id="porukaPrezime" class="bojaPoruke"></span>
            </div>
            <div class="form-item">
                <label for="username">Korisničko ime:</label>
                <div class="form-field">
                    <input type="text" name="username" id="username" class="formfield-textual">
                </div>
                <span id="porukaUsername" class="bojaPoruke"></span>
            </div>
            <div class="form-item">
                <label for="pass">Lozinka: </label>
                <div class="form-field">
                    <input type="password" name="pass" id="pass" class="formfield-textual">
                </div>
            </div>
            <div class="form-item">
                <label for="pass">Ponovite lozinku: </label>
                <div class="form-field">
                    <input type="password" name="passRep" id="passRep"
                           class="form-field-textual">
                </div>
                <span id="porukaPass" class="bojaPoruke"></span>
            </div>

            <div class="form-item">
                <button type="submit" value="submit"
                        id="slanje">Registracija</button>
            </div>
        </form>
    <script type="text/javascript">
        document.getElementById("slanje").onclick = function(event) {

            var slanjeForme = true;

            // Ime korisnika mora biti uneseno
            var poljeIme = document.getElementById("ime");
            var ime = document.getElementById("ime").value;
            if (ime.length == 0) {
                slanjeForme = false;
                poljeIme.style.border="1px dashed red";
                document.getElementById("porukaIme").style.color="red";
                document.getElementById("porukaIme").innerHTML="Unesite ime!";
            } else {
                poljeIme.style.border="2px solid lightblue";
                document.getElementById("porukaIme").innerHTML="";
            }
            // Prezime korisnika mora biti uneseno
            var poljePrezime = document.getElementById("prezime");
            var prezime = document.getElementById("prezime").value;
            if (prezime.length == 0) {
                slanjeForme = false;
                poljePrezime.style.border="1px dashed red";
                document.getElementById("porukaPrezime").style.color="red";
                document.getElementById("porukaPrezime").innerHTML="Unesite prezime!";
            } else {
                poljePrezime.style.border="2px solid lightblue";
                document.getElementById("porukaPrezime").innerHTML="";
            }

            // Korisničko ime mora biti uneseno
            var poljeUsername = document.getElementById("username");
            var username = document.getElementById("username").value;
            if (username.length == 0) {
                slanjeForme = false;
                poljeUsername.style.border="1px dashed red";
                document.getElementById("porukaUsername").style.color="red";
                document.getElementById("porukaUsername").innerHTML="Unesite korisničko ime!";
            } else {
                poljeUsername.style.border="2px solid lightblue";
                document.getElementById("porukaUsername").innerHTML="";
            }

            // Provjera podudaranja lozinki
            var poljePass = document.getElementById("pass");
            var pass = document.getElementById("pass").value;
            var poljePassRep = document.getElementById("passRep");
            var passRep = document.getElementById("passRep").value;
            if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
                slanjeForme = false;
                poljePass.style.border="1px dashed red";
                poljePassRep.style.border="1px dashed red";
                document.getElementById("porukaPass").style.color="red";
                document.getElementById("porukaPass").innerHTML="Lozinke moraju biti iste!";
            } else {
                poljePass.style.border="2px solid lightblue";
                document.getElementById("porukaPass").innerHTML="";
                poljePassRep.style.border="2px solid lightblue";
            }

            if (slanjeForme !== true) {
                event.preventDefault();
            }

        };

    </script>

    <?php
    if(isset($_POST['ime']) and isset($_POST['prezime']) and isset($_POST['username']) and isset($_POST['pass'])  ) {
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $username = $_POST['username'];
        $lozinka = $_POST['pass'];
        $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
        $registriranKorisnik = '';
        //Provjera postoji li u bazi već korisnik s tim korisničkim imenom
        $sql = "SELECT korisnickoIme FROM korisnik WHERE korisnickoIme = ?";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        if (mysqli_stmt_num_rows($stmt) > 0) {
            echo " <div class='administracija_forma'>Korisnicko ime je zauzeto!</div>";
        } else {
            // Ako ne postoji korisnik s tim korisničkim imenom - Registracija korisnika
            //u bazi pazeći na SQL injection
            $sql = "INSERT INTO korisnik (ime, prezime,korisnickoIme, lozinka)VALUES (?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssss', $ime, $prezime, $username,
                    $hashed_password);
                mysqli_stmt_execute($stmt);
                $registriranKorisnik = true;
                echo " <div class='administracija_forma'>Registracija je uspjela, sada se mozete prijaviti!</div>";
                echo "<script type='text/javascript'>document.getElementById('forma').style.display='none'</script>";
                echo "<div class='administracija_forma'>
                        <form action='login.php'>
                             <input type='submit' value='Prijava'/> </form> ";



            }
        }
    }
        mysqli_close($dbc);

    ?>


</main>
    <?php
require_once("footer.php");
?>
</body>
