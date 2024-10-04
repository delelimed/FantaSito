<?php
include '../db_connector.php'; // Assicurati che il percorso sia corretto

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Recupera i dati JSON dalla richiesta POST
$data = json_decode(file_get_contents("php://input"), true);
$utente = $conn->real_escape_string($data['utente']); // Sanifica l'input dell'utente

// Genera la nuova password
$nuovaPassword = '123'; // Puoi personalizzare questa logica per generare una password più sicura
$hashedPassword = password_hash($nuovaPassword, PASSWORD_DEFAULT, ['cost' => 15]);

// Prepara le query per aggiornare la password e la tabella di recupero
$queryUpdatePassword = "UPDATE fs_users SET password = ? WHERE utente = ?";
$stmtUpdatePassword = $conn->prepare($queryUpdatePassword);
$stmtUpdatePassword->bind_param("ss", $hashedPassword, $utente);

$queryUpdateRecupero = "UPDATE fs_recupero_pssw SET eseguita = 1, data_eseguito = NOW() WHERE utente = ?";
$stmtUpdateRecupero = $conn->prepare($queryUpdateRecupero);
$stmtUpdateRecupero->bind_param("s", $utente);

// Esegui entrambe le query all'interno di una transazione
$conn->begin_transaction();

try {
    // Aggiorna la password nel database degli utenti
    $stmtUpdatePassword->execute();

    // Aggiorna la tabella sx_recupero_pssw
    $stmtUpdateRecupero->execute();

    // Conferma la transazione
    $conn->commit();

    // Risposta JSON di successo
    echo json_encode(['success' => true, 'message' => 'Password aggiornata con successo!']);
} catch (Exception $e) {
    // Rollback in caso di errore
    $conn->rollback();

    // Risposta JSON di errore
    echo json_encode(['success' => false, 'message' => 'Errore durante l\'aggiornamento delle tabelle: ' . $e->getMessage()]);
}

// Chiudi gli statement e la connessione al database
$stmtUpdatePassword->close();
$stmtUpdateRecupero->close();
$conn->close();
?>
