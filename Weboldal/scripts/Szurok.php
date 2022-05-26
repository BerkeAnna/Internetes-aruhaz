<?php
// ide jön az űrlapot feldolgozó PHP kód...
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Regisztráció</title>
    <meta charset="UTF-8"/>
</head>
<body>
<form action="signup.php" method="POST">
    <label>Felhasználónév: <input type="text" name="felhasznalonev"/></label> <br/>
    <label>Jelszó: <input type="password" name="jelszo"/></label> <br/>
    <label>Jelszó ismét: <input type="password" name="jelszo2"/></label> <br/>
    <label>Életkor: <input type="number" name="eletkor"/></label> <br/>
    Nem:
    <label><input type="radio" name="nem" value="F"/> Férfi</label>
    <label><input type="radio" name="nem" value="N"/> Nő</label>
    <label><input type="radio" name="nem" value="E"/> Egyéb</label> <br/>
    Hobbik:
    <label><input type="checkbox" name="hobbik[]" value="programozás"/> <?php if (isset($_POST['hobbik']) && in_array('programozás', $_POST['hobbik'])) echo 'checked'; ?>Programozás</label>
    <label><input type="checkbox" name="hobbik[]" value="főzés"/> Főzés</label>
    <label><input type="checkbox" name="hobbik[]" value="macskázás"/> Macskázás</label>
    <label><input type="checkbox" name="hobbik[]" value="mémnézegetés"/> Mémnézegetés</label>
    <label><input type="checkbox" name="hobbik[]" value="alvás"/> Alvás</label> <br/>
    <input type="submit" name="regiszt" value="Regisztráció"/> <br/><br/>
</form>
</body>
</html>
