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
            <label for="username">Korisničko ime:</label>
            <!-- Ispis poruke nakon provjere korisničkog imena u bazi -->
            <div class="form-field">
                <input type="text" name="username" id="username" class="formfield-textual" >
            </div>
            <span id="porukaUsername" class="bojaPoruke"></span>
        </div>
        <div class="form-item">
            <label for="pass">Lozinka: </label>
            <div class="form-field">
                <input type="password" name="pass" id="pass" class="formfield-textual" >
            </div>
            <span id="porukaPass" class="bojaPoruke"></span>
        </div>
        <div class="form-item">
            <button type="submit" value="Prijava"
                    id="slanje">Prijava</button>
        </div>
    </form>
    <?php
    if (isset($_POST['username'] )and isset($_POST['pass'] ) ) {
        $username=$_POST['username'];
        $password=$_POST['pass'];
        $sql="SELECT korisnickoIme, lozinka, ime, prezime , razina FROM korisnik WHERE korisnickoIme = ? ";
        $stmt=mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt,$sql)) {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);
            if ($user) {
                $sUsername=$user['korisnickoIme'];
                $sPassword=$user['lozinka'];
                $sIme=$user['ime'];
                $sPrezime=$user['prezime'];
                $sRazina=$user['razina'];
                if (password_verify($password,$sPassword) and $username==$sUsername) {
                    $_SESSION['loggedUsername'] = $sUsername;
                    $_SESSION['loggedIme'] = $sIme;
                    $_SESSION['loggedPrezime'] = $sPrezime;
                    $_SESSION['razina'] = $sRazina;
                    $_SESSION['logged']=true;
                    echo " <div class='administracija_forma'>Dobrodošli " .$_SESSION['loggedUsername']."! </div>";
                    if ($_SESSION['razina']=='A') {
                        echo "<script type='text/javascript'>
                        document.getElementById('forma').style.display='none'
                        document.getElementById('lr').href='administracija.php'
                        document.getElementById('lr').innerHTML='Administracija' </script>";
                        echo "<br><div class='administracija_forma'>
                        <form action='administracija.php'>
                             <input type='submit' value='Administracija'/> </form> ";

                    } else {
                        echo "<script type='text/javascript'>
                        document.getElementById('forma').style.display='none'
                        document.getElementById('lr').href='logout.php'
                        document.getElementById('lr').innerHTML='Odjava' </script>";

                    }




                }
                else {
                    echo " <div class='administracija_forma'>Pogresno korisnicko ime ili lozinka!</div><br>";

                }
            }
            else {
                echo " <div class='administracija_forma'>Pogresno korisnicko ime ili lozinka!</div><br>";
            }

        }
    }
    mysqli_close($dbc);
    ?>

<script type="text/javascript">
    // Provjera forme prije slanja
    document.getElementById("slanje").onclick = function(event) {

        var slanjeForme = true;
        // Sadržaj mora biti unesen
        var poljeUsername = document.getElementById("username");
        var username = document.getElementById("username").value;
        if (username.length == 0) {
            slanjeForme = false;
            poljeUsername.style.border="1px dashed red";
            document.getElementById("porukaUsername").style.color="red";
            document.getElementById("porukaUsername").innerHTML="Unesite korisničko ime!<br>";
        } else {
            poljeUsername.style.border="2px solid lightblue";
            document.getElementById("porukaUsername").innerHTML="";
        }

        // Sadržaj mora biti unesen
        var poljePassword = document.getElementById("pass");
        var pass = document.getElementById("pass").value;
        if (pass.length == 0) {
            slanjeForme = false;
            poljePassword.style.border="1px dashed red";
            document.getElementById("porukaPass").style.color="red";
            document.getElementById("porukaPass").innerHTML="Unesite lozinku!<br>";
        } else {
            poljePassword.style.border="2px solid lightblue";
            document.getElementById("porukaPass").innerHTML="";
        }


        if (slanjeForme !== true) {
            event.preventDefault()
        }

    };
</script>
</main>


<?php
require_once("footer.php");
?>
</body>
