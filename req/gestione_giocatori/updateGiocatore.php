<?php
// Includi la connessione al database
include '../../db_connector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera i dati inviati tramite POST
    $giocatoreId = isset($_POST['giocatoreId']) ? intval($_POST['giocatoreId']) : 0;
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $cognome = isset($_POST['cognome']) ? trim($_POST['cognome']) : '';
    $uname = isset($_POST['uname']) ? trim($_POST['uname']) : '';
    $interlega = isset($_POST['interlega']) ? intval($_POST['interlega']) : 0;
    $lega = isset($_POST['lega']) ? intval($_POST['lega']) : 0;

    // Verifica che il giocatoreId non sia vuoto e che i campi necessari siano presenti
    if ($giocatoreId == 0 || empty($nome) || empty($cognome) || empty($uname)) {
        echo json_encode(['status' => 'error', 'message' => 'Dati mancanti.']);
        exit;
    }

    // Avvia una transazione
    $conn->begin_transaction();

    try {
        // 1. Aggiorna i dati del giocatore nella tabella fs_users
        $query_update_user = "UPDATE fs_users SET nome = ?, cognome = ?, utente = ? WHERE id = ?";
        $stmt_update_user = $conn->prepare($query_update_user);
        $stmt_update_user->bind_param("sssi", $nome, $cognome, $uname, $giocatoreId);
        $stmt_update_user->execute();

        // 2. Aggiorna la lega nella tabella fs_appaia_user_lega
        $query_check_lega = "SELECT COUNT(*) FROM fs_appaia_user_lega WHERE id_user = ?";
        $stmt_check_lega = $conn->prepare($query_check_lega);
        $stmt_check_lega->bind_param("i", $giocatoreId);
        $stmt_check_lega->execute();
        $stmt_check_lega->bind_result($lega_exists);
        $stmt_check_lega->fetch();
        $stmt_check_lega->close();

        if ($lega_exists > 0) {
            // Se esiste una lega per l'utente, aggiorna
            $query_update_lega = "UPDATE fs_appaia_user_lega SET id_lega = ? WHERE id_user = ?";
            $stmt_update_lega = $conn->prepare($query_update_lega);
            $stmt_update_lega->bind_param("ii", $lega, $giocatoreId);
            $stmt_update_lega->execute();
        } else {
            // Altrimenti, inserisci un nuovo record
            $query_insert_lega = "INSERT INTO fs_appaia_user_lega (id_user, id_lega) VALUES (?, ?)";
            $stmt_insert_lega = $conn->prepare($query_insert_lega);
            $stmt_insert_lega->bind_param("ii", $giocatoreId, $lega);
            $stmt_insert_lega->execute();
        }

        // 3. Aggiorna la interlega nella tabella fs_appaia_user_interlega
        $query_check_interlega = "SELECT COUNT(*) FROM fs_appaia_user_interlega WHERE id_user = ?";
        $stmt_check_interlega = $conn->prepare($query_check_interlega);
        $stmt_check_interlega->bind_param("i", $giocatoreId);
        $stmt_check_interlega->execute();
        $stmt_check_interlega->bind_result($interlega_exists);
        $stmt_check_interlega->fetch();
        $stmt_check_interlega->close();

        if ($interlega_exists > 0) {
            // Se esiste un'interlega per l'utente, aggiorna
            $query_update_interlega = "UPDATE fs_appaia_user_interlega SET id_interlega = ? WHERE id_user = ?";
            $stmt_update_interlega = $conn->prepare($query_update_interlega);
            $stmt_update_interlega->bind_param("ii", $interlega, $giocatoreId);
            $stmt_update_interlega->execute();
        } else {
            // Altrimenti, inserisci un nuovo record
            $query_insert_interlega = "INSERT INTO fs_appaia_user_interlega (id_user, id_interlega) VALUES (?, ?)";
            $stmt_insert_interlega = $conn->prepare($query_insert_interlega);
            $stmt_insert_interlega->bind_param("ii", $giocatoreId, $interlega);
            $stmt_insert_interlega->execute();
        }

        // Conferma la transazione
        $conn->commit();

        // Risposta di successo
        echo json_encode(['status' => 'success', 'message' => 'Giocatore aggiornato con successo.']);
    } catch (Exception $e) {
        // Rollback in caso di errore
        $conn->rollback();

        // Risposta di errore
        echo json_encode(['status' => 'error', 'message' => 'Errore durante l\'aggiornamento: ' . $e->getMessage()]);
    } finally {
        // Chiudi gli statement
        if (isset($stmt_update_user)) $stmt_update_user->close();
        if (isset($stmt_update_lega)) $stmt_update_lega->close();
        if (isset($stmt_insert_lega)) $stmt_insert_lega->close();
        if (isset($stmt_update_interlega)) $stmt_update_interlega->close();
        if (isset($stmt_insert_interlega)) $stmt_insert_interlega->close();
        $conn->close();
    }
}
?>

