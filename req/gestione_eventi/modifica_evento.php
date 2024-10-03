<?php
// Connessione al database
include '../../db_connector.php';

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Recupera i dati dal form
$evento_id = $_POST['evento_id'];
$data = $_POST['data'];
$tipo_evento = $_POST['tipo_evento'];

// Prepara e esegui la query di aggiornamento
$sql = "UPDATE fs_eventi SET data = ?, tipo_evento = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $data, $tipo_evento, $evento_id); // 'ssi' indica i tipi di dati: string, string, integer

if ($stmt->execute()) {
    echo "Evento modificato con successo!";
} else {
    echo "Errore durante la modifica dell'evento: " . $stmt->error;
}

// Chiudi la connessione
$stmt->close();
$conn->close();

// Reindirizza a una pagina di conferma o all'elenco eventi
header("Location: ../../templates/reg_eventi.php"); // Modifica il percorso come necessario
exit();
?>
