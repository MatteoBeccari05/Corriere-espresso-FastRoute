<?php
// Configurazione del DB
$config = require '../connessione_db/db_config.php';
require '../connessione_db/DB_Connect.php';
require_once '../connessione_db/functions.php';

// Connessione al DB
$db = DataBase_Connect::getDB($config);

// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    try
    {
        // Prepara la query per cercare l'utente nel database
        $query = "SELECT * FROM corriere.personale WHERE email = :email";

        // Prepara la query SQL
        $stmt = $db->prepare($query);

        // Lega i parametri
        $stmt->bindParam(':email', $email);

        // Esegui la query
        $stmt->execute();

        // Recupera i dati dell'utente (se esiste)
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se l'utente esiste
        if ($user)
        {
            // Verifica la password
            if (password_verify($password, $user['password']))
            {
                // Login riuscito, l'utente è autenticato
                session_start();

                // Memorizza i dati dell'utente nella sessione
                $_SESSION['email'] = $email;
                $_SESSION['nome'] = $user['nome']; // Recupera il nome dal database
                $_SESSION['cognome'] = $user['cognome']; // Recupera il cognome dal database

                // Redirigi l'utente a una pagina protetta (ad esempio, il pannello utente)
                header("Location: ../pages/home.php");
                exit;
            }
            else
            {
                header("Location: ../redirect/error_password.html");
            }
        }
        else
        {
            header("Location: ../redirect/error_password.html");
        }
    }
    catch (PDOException $e)
    {
        logError($e);
    }
}
?>
