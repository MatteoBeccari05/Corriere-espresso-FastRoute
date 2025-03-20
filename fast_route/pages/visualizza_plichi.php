<?php
require_once '../strutture_pagina/functions_active_navbar.php';
$content = "Visualizza Plichi";
require_once "../connessione_db/operazioni.php";
require '../strutture_pagina/navbar.php';

if(!isset($_SESSION['email']))
{
    header("Location: ../utenti/accedi.html");
    exit;
}
$plichi = visualizzaPlichi();
?>

    <!doctype html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Visualizza Piloti</title>
        <link rel="stylesheet" href="../style/style.css">
    </head>
    <body>
    <h2>Lista delle Consegne (Plichi)</h2>

    <table border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Stato</th>
            <th>Data Consegna</th>
            <th>Data Spedizione</th>
            <th>Data Ritiro</th>
            <th>Mittente</th>
            <th>Destinatario</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($plichi as $pacco): ?>
            <tr>
                <td><?= $pacco['id'] ?></td>
                <td><?= $pacco['stato'] ?></td>
                <td><?= $pacco['data_consegna'] ?></td>
                <td><?= $pacco['data_spedizione'] ?></td>
                <td><?= $pacco['data_ritiro'] ?></td>
                <td><?= $pacco['mittente_nome'] . ' ' . $pacco['mittente_cognome'] ?></td>
                <td><?= $pacco['destinatario_nome'] . ' ' . $pacco['destinatario_cognome'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </body>




<?php
require '../strutture_pagina/footer.php';
?>