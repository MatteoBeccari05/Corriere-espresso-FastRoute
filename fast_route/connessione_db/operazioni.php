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



// Funzione per inserire la consegna (pacco) nel database
function consegna($id_mittente, $id_destinatario)
{
    global $db; // Assicurati che $db sia la connessione al database

    try {
        // Preparazione della query per inserire la consegna nella tabella "plichi"
        $query = "INSERT INTO corriere.plichi (id_mittente, id_destinatario, stato, data_spedizione) 
                  VALUES (:id_mittente, :id_destinatario, 'in_transito', NOW())";

        // Prepara la query
        $stmt = $db->prepare($query);

        // Associa i parametri alla query
        $stmt->bindParam(':id_mittente', $id_mittente, PDO::PARAM_INT);
        $stmt->bindParam(':id_destinatario', $id_destinatario, PDO::PARAM_INT);

        // Esegui la query
        $stmt->execute();
        header('location:../redirect/confirm.html');

    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}

function visualizzaPlichi()
{
    global $db;

    try
    {
        // Query per selezionare i dati dalla tabella plichi, unendo i dati dei clienti
        $query = "SELECT p.id, 
                         p.stato, 
                         p.data_consegna, 
                         p.data_spedizione, 
                         p.data_ritiro,
                         mittente.nome AS mittente_nome, 
                         mittente.cognome AS mittente_cognome, 
                         destinatario.nome AS destinatario_nome, 
                         destinatario.cognome AS destinatario_cognome
                  FROM corriere.plichi p
                  JOIN corriere.clienti mittente ON p.id_mittente = mittente.id
                  JOIN corriere.clienti destinatario ON p.id_destinatario = destinatario.id";

        // Preparazione della query
        $stmt = $db->prepare($query);

        // Esegui la query
        $stmt->execute();

        // Recupera i risultati
        $plichi = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Restituisce i dati
        return $plichi;
    }
    catch (Exception $eccezione)
    {
        logError($eccezione);
    }
}







?>

