<?php
session_start(); // Assicurati che la sessione sia avviata
include '../../db_connector.php'; // Include il file di configurazione con la connessione al database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])) {
        $id_user = intval($_POST['id']);

        // Iniziare una transazione
        $conn->begin_transaction();

        try {
            // Eliminare gli appaiamenti
            $query_appaiamenti_interlega = "DELETE FROM fs_appaia_user_interlega WHERE id_user = ?";
            $stmt_interlega = $conn->prepare($query_appaiamenti_interlega);
            $stmt_interlega->bind_param("i", $id_user);
            $stmt_interlega->execute();
            $stmt_interlega->close();

            $query_appaiamenti_lega = "DELETE FROM fs_appaia_user_lega WHERE id_user = ?";
            $stmt_lega = $conn->prepare($query_appaiamenti_lega);
            $stmt_lega->bind_param("i", $id_user);
            $stmt_lega->execute();
            $stmt_lega->close();

            // Eliminare il giocatore
            $query_elimina_giocatore = "DELETE FROM fs_users WHERE id = ?";
            $stmt_giocatore = $conn->prepare($query_elimina_giocatore);
            $stmt_giocatore->bind_param("i", $id_user);
            $stmt_giocatore->execute();
            $stmt_giocatore->close();

            // Commit della transazione
            $conn->commit();

            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            // Rollback in caso di errore
            $conn->rollback();
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Richiesta non valida.']);
}
