<?php

require_once '../connessione_db/operazioni.php';

$mittente = $_POST['id_mittente'];
$dest = $_POST['id_destinatario'];


consegna($mittente, $dest);

?>



