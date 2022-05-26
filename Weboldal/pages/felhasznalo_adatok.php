<?php
    session_start();
    if(empty($_SESSION["adatok"]["id"])) {
        header("Location: kezdolap");
    }

    $adatok = $_SESSION["adatok"];

    if(isset($_POST["kijelentkezes"])) {
        header("Location: kezdolap");
        session_unset();
        session_destroy();
    }
?>


<link href="CSS/regisztracio.css" type="text/css" rel="stylesheet">
<div class="container">
  <form method="post" autocomplete="off">

      <?php
      try {
          if (isset($_POST["id"])) {
              include_once "scripts/Muveletek.php";
              $tisztitott_adatok = new Muveletek();
              $tisztitott_adatok->valtozokTisztitas();
              $tisztitott_adatok->userModositas("UPDATE VASARLO SET FELHASZNALONEV=:felhasznalonev, NEV=:nev, 
                   EMAIL=:email, SZULDATUM=TO_DATE(:szuldatum, 'yyyy-mm-dd'), SZALLITASICIM=:szallitasicim, 
                   SZAMLASZAM=:szamlaszam WHERE ID=:id", "felhasznalo_adatok", "adatok");
          }
      } catch (Exception $e) {
          echo "<p id='errorMessage'>" . $e->getMessage() . "</p>";
      }
      ?>

        <h2 style="text-align:center">Adataid</h2>

        <div class="col">

            <table>
                <?php
                    echo '<input type="hidden" name="id" value="'.$adatok["id"].'">';
                ?>

                <tr>
                    <td>
                        <h3>Felhasználóneved</h3>
                        <input type="text" class="inputs" name="felhasznalonev" value="<?php echo $adatok["felhasznalonev"]; ?>">
                    </td>

                    <td>
                        <h3>E-mail címed</h3>
                        <input type="text" class="inputs" name="email" value="<?php echo $adatok["email"]; ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <h3>Neved</h3>
                        <input type="text" class="inputs" name="nev" value="<?php echo $adatok["nev"]; ?>">
                    </td>

                    <td>
                        <h3>Születési dátumod</h3>
                        <input type="date"
                               name="szuldatum" value="<?php echo $adatok["szuldatum"]; ?>"
                               max="<?php echo date('Y-m-d') ?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        <h3>Szállítási címed</h3>
                        <input type="text" class="inputs" name="szallitasiCim" value="<?php echo $adatok["szallitasiCim"]; ?>">
                    </td>

                    <td>
                        <h3>Számlaszámod</h3>
                        <input type="text" class="inputs" name="szamlaszam" value="<?php echo $adatok["szamlaszam"]; ?>">
                    </td>
                </tr>

            </table>

            <input type="submit" value="Adataim módosítása">
            <input type="submit" value="Kijelentkezés" href="?kijelentkezes=true" name="kijelentkezes">
        </div>
  </form>
</div>