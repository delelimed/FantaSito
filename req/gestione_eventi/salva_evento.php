<?php
// Include il file di configurazione per la connessione al database
include '../../db_connector.php';

// Controlla se sono stati forniti i parametri
if (isset($_POST['data']) && isset($_POST['tipo_evento']) && isset($_POST['id_evento'])) {
    $data = $_POST['data'];
    $tipo_evento = $_POST['tipo_evento'];
    $id_evento = $_POST['id_evento'];

    // Recupera i bonus/malus selezionati
    $bonusmalus_selezionati = $_POST['bonusmalus'] ?? []; // Ottiene l'array di bonusmalus dal form

    // Ottieni gli ID dei bonus/malus già presenti nel database per l'evento
    $bonusmalus_assoc = [];
    $bonusmalus_sql = "SELECT bonusmalus FROM fs_registra_eventi WHERE evento = ?";
    $stmt = $conn->prepare($bonusmalus_sql);
    $stmt->bind_param("i", $id_evento);
    $stmt->execute();
    $result_bonusmalus = $stmt->get_result();

    while ($row = $result_bonusmalus->fetch_assoc()) {
        $bonusmalus_assoc[] = $row['bonusmalus'];
    }
    $stmt->close();

    // Eliminare i bonus/malus non selezionati
    foreach ($bonusmalus_assoc as $bonusmalus_id) {
        if (!in_array($bonusmalus_id, array_merge(...array_values($bonusmalus_selezionati)))) {
            $delete_sql = "DELETE FROM fs_registra_eventi WHERE evento = ? AND bonusmalus = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("ii", $id_evento, $bonusmalus_id);
            $delete_stmt->execute();
            $delete_stmt->close();
        }
    }

    // Aggiungere i nuovi bonus/malus selezionati
    foreach ($bonusmalus_selezionati as $id_educatore => $bonusmalus_ids) {
        foreach ($bonusmalus_ids as $bonusmalus_id) {
            // Recupera il punteggio associato al bonus/malus
            $punti_sql = "SELECT punti FROM fs_bonusmalus WHERE id = ?";
            $punti_stmt = $conn->prepare($punti_sql);
            $punti_stmt->bind_param("i", $bonusmalus_id);
            $punti_stmt->execute();
            $punti_result = $punti_stmt->get_result();
            $punti_row = $punti_result->fetch_assoc();
            $punti = $punti_row['punti'] ?? 0; // Usa 0 se non trovato
            $punti_stmt->close();

            // Controlla se già esiste il record
            $check_sql = "SELECT * FROM fs_registra_eventi WHERE evento = ? AND bonusmalus = ? AND id_educatore = ?";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->bind_param("iii", $id_evento, $bonusmalus_id, $id_educatore);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();

            if ($check_result->num_rows == 0) {
                // Se non esiste, inserisci il nuovo record con il punteggio
                $insert_sql = "INSERT INTO fs_registra_eventi (evento, bonusmalus, id_educatore, punti) VALUES (?, ?, ?, ?)";
                $insert_stmt = $conn->prepare($insert_sql);
                $insert_stmt->bind_param("iiii", $id_evento, $bonusmalus_id, $id_educatore, $punti);
                $insert_stmt->execute();
                $insert_stmt->close();
            }
            $check_stmt->close();
        }
    }

    // Reindirizza a una pagina di conferma o visualizza un messaggio di successo
    header("Location: success_page.php"); // Cambia con la pagina che desideri
    exit();
} else {
    // Reindirizza a una pagina di errore o alla pagina principale
    header("Location: reg_eventi.php");
    exit();
}

// Chiudi la connessione al database
$conn->close();
?>
