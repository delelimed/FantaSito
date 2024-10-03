<?php
// Connessione al database
include('../../db_connector.php');

// Controlla se i dati sono stati inviati tramite POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ottieni i dati inviati tramite AJAX
    $id_lega = intval($_POST['id_lega']);
    $nome_lega = mysqli_real_escape_string($conn, $_POST['nome_lega']);
    $partecipanti = $_POST['partecipanti']; // Array di ID dei partecipanti

    // Aggiorna il nome della lega nella tabella fs_leghe
    $updateLegaQuery = "UPDATE fs_leghe SET nome_lega = '$nome_lega' WHERE id = $id_lega";

    if (mysqli_query($conn, $updateLegaQuery)) {
        // Elimina i partecipanti esistenti associati alla lega
        $deletePartecipantiQuery = "DELETE FROM fs_appaia_user_lega WHERE id_lega = $id_lega";
        mysqli_query($conn, $deletePartecipantiQuery);

        // Inserisci i nuovi partecipanti
        if (!empty($partecipanti)) {
            foreach ($partecipanti as $id_user) {
                $id_user = intval($id_user); // Assicurati che l'ID sia un numero intero
                $insertPartecipanteQuery = "INSERT INTO fs_appaia_user_lega (id_user, id_lega) VALUES ($id_user, $id_lega)";
                mysqli_query($conn, $insertPartecipanteQuery);
            }
        }

        // Restituisci una risposta di successo
        echo json_encode(['success' => true, 'message' => 'Modifiche salvate con successo.']);
    } else {
        // Restituisci un errore se qualcosa è andato storto
        echo json_encode(['success' => false, 'message' => 'Errore durante il salvataggio delle modifiche.']);
    }
}
?>
