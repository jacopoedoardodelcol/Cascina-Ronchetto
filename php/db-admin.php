<!DOCTYPE html>
<html>
    <head>
        <title>Prenotazioni</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            session_start();
            include("password-admin.php");
            check_logged();
        ?>
        <h1>Database prenotazioni</h1>
        <form name="f1" action="db-request.php" method="post">
            Mostra tutte le prenotazioni
            <input type="hidden" name="action" id="action" value="1">
            <input type="submit" value="Ok">
        </form><br><br>
        <form name="f2" action="db-request.php" method="post">
            Mostra prenotazioni per la data 
            <input type="hidden" name="action" id="action" value="2">
            <input type="date" name="date" id="date">
            <input type="submit" value="Ok">
        </form><br>
        <form name="f3" action="db-request.php" method="post">
            Mostra prenotazioni dall'indirizzo email
            <input type="hidden" name="action" id="action" value="3">
            <input type="text" name="email" id="email">
            <input type="submit" value="Ok">
        </form><br><br>
        <form name="f4" action="db-request.php" method="post">
            Elimina prenotazioni per la data 
            <input type="hidden" name="action" id="action" value="4">
            <input type="date" name="date" id="date">
            <input type="submit" value="Ok">
        </form><br>
        <form name="f5" action="db-request.php" method="post">
            Elimina prenotazioni dall'indirizzo email
            <input type="hidden" name="action" id="action" value="5">
            <input type="text" name="email" id="email">
            <input type="submit" value="Ok">
        </form>
        <br>
        <a href="../Contact.php">Ritorna alla pagina "Contatti"</a>
    </body>
</html>