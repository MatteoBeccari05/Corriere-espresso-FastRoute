<?php
require_once 'functions_active_navbar.php';
session_start();
$logged_in = isset($_SESSION['username']); // L'utente è loggato se la variabile di sessione esiste
?>

<div class="navbar">
    <div class="nav-left">
        <a href="home.php" class="<?= isActive('home.php') ?>">Home</a>
        <a href="inserimento_cliente.php" class="<?= isActive('inserimento_cliente.php') ?>">Inserimento cliente</a>
        <a href="visualizza_clienti.php" class="<?= isActive('visualizza_clienti.php') ?>">Visualizza Clienti</a>
        <a href="form_elimina.php" class="<?= isActive('form_elimina.php') ?>">Modifica</a>
        <a href="visualizza_plichi.php" class="<?= isActive('visualizza_plichi.php') ?>">Visualizza Plichi</a>
    </div>
    <div class="nav-right">
        <?php if ($logged_in): ?>
            <!-- Mostra l'immagine utente -->
            <img src="../images/persona.jpg" alt="Immagine Utente" class="rounded-circle" style="width: 40px; height: 40px;">
            <span class="ms-2" style="color: white">
                <?php
                // Verifica se le variabili di sessione 'nome' e 'cognome' sono definite
                $nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Nome non disponibile';
                $cognome = isset($_SESSION['cognome']) ? $_SESSION['cognome'] : 'Cognome non disponibile';
                echo htmlspecialchars($nome) . ' ' . htmlspecialchars($cognome); // Uso htmlspecialchars per evitare attacchi XSS
                ?>
            </span>
            <!-- Pulsante Esci -->
            <a href="../utenti/logout.php" class="btn btn-outline-danger ms-3">Esci</a>
        <?php else: ?>
            <!-- Mostra i tasti Accedi e Registrati -->
            <a href="../utenti/registrazione.html" class="btn btn-outline-primary me-2">Registrati</a>
            <a href="../utenti/accedi.html" class="btn btn-outline-success">Accedi</a>
        <?php endif; ?>
    </div>
</div>

