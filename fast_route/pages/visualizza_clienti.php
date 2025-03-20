<?php
require_once '../strutture_pagina/functions_active_navbar.php';
$content = "Visualizza Clienti";
require_once "../connessione_db/operazioni.php";
require '../strutture_pagina/navbar.php';

if(!isset($_SESSION['email']))
{
    header("Location: ../utenti/accedi.html");
    exit;
}
?>

    <!doctype html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Visualizza Clienti</title>
        <link rel="stylesheet" href="../style/style.css">
    </head>
<body>
    <h2><?=$content?></h2>
<?php

visualizza_clienti();

?>

<?php
require '../strutture_pagina/footer.php';
?>