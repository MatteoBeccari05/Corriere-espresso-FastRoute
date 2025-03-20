<?php
$content = 'Inserimento Cliente';
require_once '../strutture_pagina/functions_active_navbar.php';
require '../strutture_pagina/navbar.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/style.css">
    <title>Inserimento cliente</title>
</head>
<body>
<h2 class="titolo"><?=$content?></h2>
<br>

<form action="../passaggio_dati/cliente.php" method="POST">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="cognome">Cognome:</label><br>
    <input type="text" id="cognome" name="cognome" required><br><br>

    <label for="indirizzo">Indirizzo:</label><br>
    <input type="text" id="indirizzo" name="indirizzo" required><br><br>

    <label for="telefono">Numero di telefono:</label>
    <input type="tel" id="telefono" name="telefono" pattern="[0-9]{10}" required><br><br>

    <label for="email">E-mail:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <input type="submit" value="Aggiungi cliente">
</form>


<?php
require '../strutture_pagina/footer.php';
?>
