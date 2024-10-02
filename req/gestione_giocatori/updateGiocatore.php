<?php
// updateGiocatore.php
include '../../db_connector.php'; // Assicurati di includere la tua connessione al database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera i dati dal POST
    $giocatoreId = isset($_POST['giocatoreId']) ? $_POST['giocatoreId'] : '';
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $cognome = isset($_POST['cognome']) ? $_POST['cognome'] : '';
    $uname = isset($_POST['uname']) ? $_POST['uname'] : ''; // Recupera anche lo username

    // Verifica se i campi sono vuoti
    if (empty($giocatoreId) || empty($nome) || empty($cognome) || empty($uname)) {
        echo 'Errore: uno o più campi sono vuoti.';
        exit;
    }

    // Query per aggiornare il nome, cognome e username
    $query = "UPDATE fs_users SET nome = ?, cognome = ?, utente = ? WHERE id = ?"; // Assicurati che la colonna username esista nella tua tabella
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        echo 'Errore nella preparazione della query: ' . $conn->error;
        exit;
    }

    // Lega i parametri e verifica se ci sono errori
    if (!$stmt->bind_param("sssi", $nome, $cognome, $uname, $giocatoreId)) { // Aggiungi uname come parametro
        echo 'Errore nella binding dei parametri: ' . $stmt->error;
        exit;
    }

    // Esegui la query e controlla il risultato
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo 'Modifiche salvate con successo!';
        } else {
            echo 'Nessuna modifica effettuata. Controlla che l\'ID sia corretto.';
        }
    } else {
        echo 'Errore nel salvataggio delle modifiche: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Errore: richiesta non valida.';
}
?>
