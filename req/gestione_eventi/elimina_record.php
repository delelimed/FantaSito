<?php
// Connessione al database (modifica i parametri con i tuoi)
include '../../db_connector.php';

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Recupera i dati dal modulo
$data = $_POST['data']; // Formato: aaaa-mm-gg
$tipo_evento = $_POST['tipo_evento'];

// Prepara la query di eliminazione
$sql = "DELETE FROM fs_eventi WHERE data = '$data' AND tipo_evento = '$tipo_evento'";

// Esegui la query
if ($conn->query($sql) === TRUE) {
    // Reindirizza di nuovo alla pagina principale
    header("Location: ../../templates/reg_eventi.php?msg=Evento eliminato con successo.");
} else {
    echo "Errore durante l'eliminazione: " . $conn->error;
}

// Chiudi la connessione
$conn->close();
?>
