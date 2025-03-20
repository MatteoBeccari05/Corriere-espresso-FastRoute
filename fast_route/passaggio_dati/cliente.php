<?php

require_once '../connessione_db/operazioni.php';

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$indirizzo = $_POST['indirizzo'];
$tel = $_POST['telefono'];
$email = $_POST['email'];

inserimento_cliente($nome, $cognome, $indirizzo, $tel, $email);

?>



