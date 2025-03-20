<?php
require_once 'functions_active_navbar.php';
session_start();
$logged_in = isset($_SESSION['nome']); // L'utente è loggato se la variabile di sessione esiste
?>

<div class="navbar">
    <div class="nav-left">
        <a href="home.php" class="<?= isActive('home.php') ?>">Home</a>
        <a href="inserimento_cliente.php" class="<?= isActive('inserimento_cliente.php') ?>">Inserimento cliente</a>
        <a href="visualizza_clienti.php" class="<?= isActive('visualizza_clienti.php') ?>">Visualizza Clienti</a>
        <a href="inserimento_consegna.php" class="<?= isActive('inserimento_consegna.php') ?>">Nuova Consegna</a>
        <a href="visualizza_plichi.php" class="<?= isActive('visualizza_plichi.php') ?>">Visualizza Plichi</a>
    </div>
    <div class="nav-right">
        <?php if ($logged_in): ?>
            <!-- Mostra l'immagine utente -->
            <div class="user-info">
                <img src="../images/P2.png" alt="Immagine Utente" class="user-img">
                <?php
                $nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Nome non disponibile';
                $cognome = isset($_SESSION['cognome']) ? $_SESSION['cognome'] : 'Cognome non disponibile';
                echo htmlspecialchars($nome) . ' ' . htmlspecialchars($cognome);
                ?>
                <a href="../utenti/logout.php" class="logout">Esci</a>
            </div>
        <?php else: ?>
            <!-- Mostra i tasti Accedi e Registrati -->
            <a href="../utenti/registrazione.html" class="btn btn-outline-primary me-2">Registrati</a>
            <a href="../utenti/accedi.html" class="btn btn-outline-success">Accedi</a>
        <?php endif; ?>
    </div>
</div>
