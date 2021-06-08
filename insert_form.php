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

    <form  class="administracija_forma" id="insert_forma" action="insert.php" method="POST" enctype="multipart/form-data">
        <div class="form-item">
            <label for="title">Naslov vijesti:</label>
            <div class="form-field">
                <input type="text" id="title" name="title" size="30" class="form-field-textual">
            </div>
            <span id="porukaTitle" class="bojaPoruke"></span>
        </div>
        <div class="form-item">
            <label for="about">Kratki sadržaj vijesti:</label>
            <div class="form-field">
                <textarea name="about" id="about" cols="40" rows="5" class="formfield-textual"></textarea>
            </div>
            <span id="porukaAbout" class="bojaPoruke"></span>
        </div>
        <div class="form-item">
            <label for="content">Sadržaj vijesti:</label>
            <div class="form-field">
 <textarea name="content" id="content" cols="40" rows="10"
           class="form-field-textual"></textarea>
            </div>
            <span id="porukaContent" class="bojaPoruke"></span>
        </div>
        <div class="form-item">
            <label for="photo">Slika: </label>
            <div class="form-field">
                <input id="photo" type="file" accept="image/jpg,image/jpeg,image/png"
                       class="input-text" name="photo" />
            </div>
            <span id="porukaSlika" class="bojaPoruke"></span>
        </div>
        <div class="form-item">
            <label for="kategorija">Kategorija vijesti:</label>
            <div class="form-field">
                <select  name="category" id="kategorija" class="form-field-textual">
                    <option value="" disabled selected>Odabir
                        kategorije</option>
                    <option value="sport">Sport</option>
                    <option value="politika">Politika</option>
                </select>
            </div>
            <span id="porukaKategorija" class="bojaPoruke"></span>
        </div>
        <div class="form-item">
            <label>Spremiti u arhivu:
                <div class="form-field">
                    <input type="checkbox" name="archive">
                </div>
            </label>
        </div>
        <div class="form-item">
            <button id="slanje" type="submit" value="Prihvati">Prihvati</button>
            <button type="reset" value="Poništi">Poništi</button>
        </div>
    </form>
    </main>

<script type="text/javascript">
    // Provjera forme prije slanja
    document.getElementById("slanje").onclick = function(event) {

        var slanjeForme = true;

        // Naslov vjesti (5-30 znakova)
        var poljeTitle = document.getElementById("title");
        var title = document.getElementById("title").value;

        if (title.length < 5 || title.length > 30) {
            slanjeForme = false;
            poljeTitle.style.border="1px dashed red";
            document.getElementById("porukaTitle").style.color="red";
            document.getElementById("porukaTitle").innerHTML="Naslov vijesti mora imati između 5 i 30 znakova!<br>";
        } else {
            poljeTitle.style.border="2px solid lightblue";
            document.getElementById("porukaTitle").innerHTML="";
        }

        // Kratki sadržaj (10-100 znakova)
        var poljeAbout = document.getElementById("about");
        var about = document.getElementById("about").value;
        if (about.length < 10 || about.length > 200) {
            slanjeForme = false;
            poljeAbout.style.border="1px dashed red";
            document.getElementById("porukaAbout").style.color="red";
            document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 200 znakova!<br>";
        } else {
            poljeAbout.style.border="2px solid lightblue";
            document.getElementById("porukaAbout").innerHTML="";
        }
        // Sadržaj mora biti unesen
        var poljeContent = document.getElementById("content");
        var content = document.getElementById("content").value;
        if (content.length == 0) {
            slanjeForme = false;
            poljeContent.style.border="1px dashed red";
            document.getElementById("porukaContent").style.color="red";
            document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>";
        } else {
            poljeContent.style.border="2px solid lightblue";
            document.getElementById("porukaContent").innerHTML="";
        }
        // Slika mora biti unesena
        var poljeSlika = document.getElementById("photo");
        var pphoto = document.getElementById("photo").value;
        if (pphoto.length == 0) {
            slanjeForme = false;
            document.getElementById("porukaSlika").style.color="red";
            document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
        } else {
            poljeSlika.style.border="2px solid lightblue";
            document.getElementById("porukaSlika").innerHTML="";
        }

        // Kategorija mora biti odabrana
        var poljeCategory = document.getElementById("kategorija");
        if(document.getElementById("kategorija").value =="") {
            slanjeForme = false;
            poljeCategory.style.border="1px dashed red";
            document.getElementById("porukaKategorija").style.color="red";
            document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
        } else {
            poljeCategory.style.border="2px solid lightblue";
            document.getElementById("porukaKategorija").innerHTML="";
        }


        if (slanjeForme !== true) {
            event.preventDefault()
        }

    };
</script>



<?php
require_once("footer.php");
?>
</body>
