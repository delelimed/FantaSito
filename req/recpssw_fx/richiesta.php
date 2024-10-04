<?php
include '../../db_connector.php';

// Abilita la visualizzazione degli errori
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Imposta l'header per il contenuto JSON
header('Content-Type: application/json');

// Elimina eventuali output precedenti
ob_clean();

// Recupera i dati dalla richiesta POST
$data = json_decode(file_get_contents("php://input"));
$username = $conn->real_escape_string($data->username); // Corretta la chiave
$data_inserimento = date("Y-m-d H:i:s");

// Verifica della connessione
if ($conn->connect_error) {
    echo json_encode(array('success' => false, 'message' => 'Connessione al database fallita: ' . $conn->connect_error));
    exit;
}

// Verifica se la username esiste nel database "sx_users"
$verifica_query = "SELECT utente FROM fs_users WHERE utente = ?";
$verifica_stmt = $conn->prepare($verifica_query);
$verifica_stmt->bind_param("s", $username);
$verifica_stmt->execute();
$verifica_stmt->store_result();

if ($verifica_stmt->num_rows > 0) {
    // La username esiste, verifica duplicato in fs_recupero_pssw
    $verifica_stmt->close();

    $verifica_duplicato_query = "SELECT utente FROM fs_recupero_pssw WHERE utente = ? AND eseguita = 0";
    $verifica_duplicato_stmt = $conn->prepare($verifica_duplicato_query);
    $verifica_duplicato_stmt->bind_param("s", $username);
    $verifica_duplicato_stmt->execute();
    $verifica_duplicato_stmt->store_result();

    if ($verifica_duplicato_stmt->num_rows > 0) {
        echo json_encode(array('success' => true, 'message' => 'Richiesta già inoltrata. Contatta il tuo educatore per procedere.'));
    } else {
        // Non esiste duplicato, procedi con l'inserimento
        $verifica_duplicato_stmt->close();

        $sql = "INSERT INTO fs_recupero_pssw (utente, data_inserimento) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $data_inserimento);

        if ($stmt->execute()) {
            echo json_encode(array('success' => true, 'message' => 'Richiesta ricevuta. Contatta il responsabile per procedere.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Errore durante il salvataggio della username: ' . $stmt->error));
        }

        $stmt->close();
    }

    $verifica_duplicato_stmt->close();
} else {
    echo json_encode(array('success' => false, 'message' => 'Username non presente nel database.'));
}

$verifica_stmt->close();
$conn->close();
?>
