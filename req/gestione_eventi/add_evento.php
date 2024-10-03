<?php
// Include il file di configurazione per la connessione al database
include '../../db_connector.php'; // Assicurati di avere un file di configurazione per la connessione al database

// Controlla se il metodo di richiesta è POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati inviati dal modulo
    $data = $_POST['data'];
    $tipo_evento = $_POST['tipo_evento'];

    // Verifica che i dati non siano vuoti
    if (!empty($data) && !empty($tipo_evento)) {
        // Prepara la query di inserimento
        $stmt = $conn->prepare("INSERT INTO fs_eventi (data, tipo_evento) VALUES (?, ?)");
        $stmt->bind_param("ss", $data, $tipo_evento);

        // Esegui la query
        if ($stmt->execute()) {
            // Inserimento riuscito, puoi reindirizzare o mostrare un messaggio
            echo "<script>alert('Evento registrato con successo!'); window.location.href='../../templates/reg_eventi.php';</script>";
        } else {
            // Errore nell'inserimento
            echo "<script>alert('Errore nella registrazione dell'evento: " . $stmt->error . "');</script>";
        }

        // Chiudi il prepared statement
        $stmt->close();
    } else {
        // Se i dati non sono validi
        echo "<script>alert('Per favore, compila tutti i campi.');</script>";
    }
}

// Chiudi la connessione al database
$conn->close();
?>
