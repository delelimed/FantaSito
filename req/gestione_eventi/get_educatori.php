<?php
// Connessione al database
include '../../db_connector.php';

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Esegui la query per ottenere gli educatori
$sql = "SELECT id, nome, cognome FROM fs_educatori";
$result = $conn->query($sql);

$educatori = [];

// Verifica se ci sono risultati
if ($result->num_rows > 0) {
    // Aggiungi ogni educatore all'array
    while ($row = $result->fetch_assoc()) {
        $educatori[] = $row; // Aggiunge ogni riga come array associativo
    }
}

// Imposta l'intestazione del contenuto a JSON
header('Content-Type: application/json');

// Restituisci i dati in formato JSON
echo json_encode($educatori);

// Chiudi la connessione
$conn->close();
?>
