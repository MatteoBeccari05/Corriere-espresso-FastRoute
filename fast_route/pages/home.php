<?php

$content = 'Corriere Fast Route';
require_once '../strutture_pagina/functions_active_navbar.php';
require '../strutture_pagina/navbar.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/style.css">
    <title>Home</title>
</head>
<body>


<!-- Sezione immagine e descrizione -->
<div class="home-content">
    <div class="image-container">
        <img src="../images/corriere.jpg" alt="Corriere Fast Route" class="corriere-img">
    </div>
    <div class="description-container">
        <h2 class="titolo"><?=$content?></h2>
        <p>
            Il nostro servizio di corriere Fast Route è progettato per offrire una spedizione veloce, sicura e conveniente.
            Con anni di esperienza nel settore, garantiamo la massima affidabilità per tutte le tue consegne urgenti.
            Che si tratti di documenti, pacchi o merci delicate, il nostro team è pronto a consegnare rapidamente e in modo sicuro.
        </p>
        <p>
            Offriamo una vasta gamma di soluzioni personalizzate per soddisfare le tue esigenze, con opzioni di tracking in tempo reale e un supporto clienti sempre disponibile. Affidati a Fast Route per spedire i tuoi pacchi ovunque, con la certezza di un servizio impeccabile e tempi di consegna rapidi.
        </p>
    </div>
</div>

<?php
require '../strutture_pagina/footer.php';
?>

</body>
</html>
