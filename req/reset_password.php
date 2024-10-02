<?php
// update_password.php
include "../../db_connector.php";

// Recupera la matricola dalla richiesta POST
$matricola = $_POST['matricola'];

// Genera la nuova password
$nuovaPassword = $matricola; // Usando la matricola come nuova password
$hashedPassword = password_hash($nuovaPassword, PASSWORD_DEFAULT, ['cost' => 15]);

// Verifica eventuali errori di connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Prepara e esegui la query per aggiornare la password nel database utilizzando prepared statements
$queryUpdatePassword = "UPDATE sx_users SET password = ? WHERE matricola = ?";
$stmtUpdatePassword = $conn->prepare($queryUpdatePassword);
$stmtUpdatePassword->bind_param("ss", $hashedPassword, $matricola);

// Prepara e esegui la query per aggiornare la tabella sx_recupero_pssw
$queryUpdateRecupero = "UPDATE sx_recupero_pssw SET eseguita = 1, data_eseguito = NOW() WHERE matricola = ?";
$stmtUpdateRecupero = $conn->prepare($queryUpdateRecupero);
$stmtUpdateRecupero->bind_param("s", $matricola);

// Esegui entrambe le query all'interno di una transazione
$conn->begin_transaction();

try {
    // Aggiorna la password nel database degli utenti
    $stmtUpdatePassword->execute();

    // Aggiorna la tabella sx_recupero_pssw
    $stmtUpdateRecupero->execute();

    // Conferma la transazione
    $conn->commit();

    // Password aggiornata con successo
    echo "Password aggiornata con successo!";
} catch (Exception $e) {
    // Rollback in caso di errore
    $conn->rollback();

    // Errore durante l'aggiornamento delle tabelle
    echo "Errore durante l'aggiornamento delle tabelle: " . $e->getMessage();
}

// Chiudi gli statement e la connessione al database
$stmtUpdatePassword->close();
$stmtUpdateRecupero->close();
$conn->close();
?>

