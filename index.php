<?php

$title = "Formulár BMI";

include "conDB.php";
include "spolecna_hlavicka.php";

?>


<?php
if (isset($_GET['ulozit'])) {
    $zadanyEmail = $_GET['email'];
    $zadanyVek = $_GET['vek'];
    $zadanaVyska = $_GET['vyska'];
    $zadanaVaha = $_GET['vaha'];
    $zadanaAdresa = $_GET['adresa'];
    $zadaneMesto = $_GET['mesto'];
    $zadanyStat = $_GET['stat'];
    $zadanePSC = $_GET['psc'];
    $zadanePohlavie = $_GET['inlineRadioOptions'];

    try {
        $sql = "INSERT INTO formular_bmi (email,vek,vyska,vaha,adresa,mesto,stat,psc,pohlavi) VALUES ('$zadanyEmail','$zadanyVek','$zadanaVyska','$zadanaVaha','$zadanaAdresa','$zadaneMesto','$zadanyStat','$zadanePSC','$zadanePohlavie')";
        $result = pg_query($sql);
        //echo "Záznamy byly úspěšně vloženy do databáze";

        header('Location: vysledky.php');
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>


<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <h1 class="display-4 font-weight-normal">Formulár na výpočet BMI</h1>
    <p class="lead font-weight-normal">Zkratka BMI (Body mass index) označuje index tělesné hmotnosti a používá se jako měřítko obezity. Tento index se vypočítá vydělením tělesné hmotnosti v kilogramech výšky daného člověka umocněné na druhou. BMI tak umožňuje statisticky porovnat různě vysoké lidi.</p>
    <a class="btn btn-outline-secondary" href="https://cs.wikipedia.org/wiki/Index_t%C4%9Blesn%C3%A9_hmotnosti">Zistiť viac</a>
  </div>
  <div class="product-device shadow-sm d-none d-md-block"></div>
  <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>

<div class="container">
    <form action="" method="get">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail">
            </div>
            <div class="form-group col-md-2">
                <label for="inputVek">Vek</label>
                <input type="number" name="vek" class="form-control" id="inputVek">
            </div>
            <div class="form-group col-md-2">
                <label for="inputVyska">Výška [m]</label>
                <input type="number" name="vyska" step="any" class="form-control" id="inputVyska">
            </div>
            <div class="form-group col-md-2">
                <label for="inputVaha">Váha [kg]</label>
                <input type="number" name="vaha" step="any" class="form-control" id="inputVaha">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAdresa">Adresa</label>
            <input type="text" name="adresa" class="form-control" id="inputAddress" placeholder="17. listopadu 1266/17">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Mesto</label>
                <input type="text" name="mesto" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Štát</label>
                <select id="inputState" name="stat" class="form-control">
                    <option selected>Česká republika</option>
                    <option>Slovenská republika</option>
                    <option>Iné</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputPSC">PSČ</label>
                <input type="text" name="psc" class="form-control" id="inputPSC">
            </div>
        </div>
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="muž">
                <label class="form-check-label" for="inlineRadio1">Muž</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="žena">
                <label class="form-check-label" for="inlineRadio2">Žena</label>
            </div>
        </div>
        <button type="submit" name="ulozit" class="btn btn-primary">Vypočítaj BMI</button>
    </form>
</div>


<?php

include "footer.php";

?>