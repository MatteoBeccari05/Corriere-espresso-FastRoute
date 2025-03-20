<?php
require_once '../strutture_pagina/functions_active_navbar.php';
$content = "Nuova Consegna";
require '../strutture_pagina/navbar.php';

$config = require '../connessione_db/db_config.php';
require '../connessione_db/DB_Connect.php';
require_once '../connessione_db/functions.php';

$db = DataBase_Connect::getDB($config);


$query = "SELECT id, nome, cognome FROM clienti";
$stmt = $db->query($query);
$clienti = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Verifica se l'utente è loggato
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
    <title>Inserimento Consegna</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<h2 class="titolo"><?=$content?></h2>

<form action="../passaggio_dati/consegna.php" method="POST">
    <div class="form-group">
        <label for="id_mittente" class="form-label">Mittente:</label>
        <select id="id_mittente" name="id_mittente" class="form-control" required>
            <option value="">-- Seleziona il mittente --</option>
            <?php foreach ($clienti as $cliente): ?>
                <option value="<?= $cliente['id'] ?>">
                    <?= $cliente['nome'] . ' ' . $cliente['cognome'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <a href="inserimento_cliente.php">Nuovo Cliente</a>
    </div>

    <div class="form-group">
        <label for="id_destinatario" class="form-label">Destinatario:</label>
        <select id="id_destinatario" name="id_destinatario" class="form-control" required>
            <option value="">-- Seleziona il destinatario --</option>
            <?php foreach ($clienti as $cliente): ?>
                <option value="<?= $cliente['id'] ?>">
                    <?= $cliente['nome'] . ' ' . $cliente['cognome'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <a href="inserimento_cliente.php">Nuovo Cliente</a>
    </div>

    <button type="submit" class="add-to-cart-btn">Registra Consegna</button>
</form>



<?php
require '../strutture_pagina/footer.php';
?>
</body>
</html>