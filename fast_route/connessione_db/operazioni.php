<?php
$config = require 'db_config.php';

require 'DB_Connect.php';
require_once 'functions.php';

$db = DataBase_Connect::getDB($config);


function inserimento_cliente($nome, $cognome, $indirizzo, $tel, $email)
{
    $punti_fedelta = 0;

    $sql = "INSERT INTO corriere.clienti (nome, cognome, indirizzo, telefono, email, punti_fedelta) 
            VALUES (:nome, :cognome, :indirizzo, :telefono, :email, :punti_fedelta)";

    global $db;

    try
    {
        // Prepariamo la dichiarazione
        $stmt = $db->prepare($sql);

        // Bind dei parametri
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cognome', $cognome);
        $stmt->bindParam(':indirizzo', $indirizzo);
        $stmt->bindParam(':telefono', $tel);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':punti_fedelta', $punti_fedelta);

        // Eseguiamo la query
        $stmt->execute();

        header('location:../redirect/confirm.html');
    }
    catch (PDOException $e)
    {
        // Se c'è un errore, visualizziamo il messaggio
        echo "Errore nell'inserimento del cliente: " . $e->getMessage();
    }

}

function visualizza_clienti()
{
    $query = "select * from clienti";
    global $db;
    try
    {
        $stm = $db->prepare($query);
        $stm->execute(); // eseguo
        echo '<table>';
        echo '<tr><th>Nome</th><th>Cognome</th><th>Indirizzo</th><th>Telefono</th><th>Email</th></tr>';

        while ($cliente = $stm->fetch())
        {
            echo '<tr>';
            echo '<td>' . $cliente->nome . '</td>';
            echo '<td>' . $cliente->cognome . '</td>';
            echo '<td>' . $cliente->indirizzo . '</td>';
            echo '<td>' . $cliente->telefono . '</td>';
            echo '<td>' . $cliente->email . '</td>';
            echo '</tr>';
        }
        echo '</table>';

        $stm->closeCursor();  // chiudo la connessione
    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}

?>

