<?php
// Connessione al database
include('../../db_connector.php');

// Controlla se i dati sono stati inviati tramite POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ottieni i dati inviati tramite AJAX
    $nome_lega = mysqli_real_escape_string($conn, $_POST['nome_lega']);
    $partecipanti = $_POST['partecipanti']; // Array di ID dei partecipanti

    // Inserisci la nuova lega nella tabella fs_leghe
    $insertLegaQuery = "INSERT INTO fs_leghe (nome_lega) VALUES ('$nome_lega')";

    if (mysqli_query($conn, $insertLegaQuery)) {
        // Ottieni l'ID della nuova lega
        $id_lega = mysqli_insert_id($conn);

        // Inserisci i partecipanti
        if (!empty($partecipanti)) {
            foreach ($partecipanti as $id_user) {
                $id_user = intval($id_user); // Assicurati che l'ID sia un numero intero
                $insertPartecipanteQuery = "INSERT INTO fs_appaia_user_lega (id_user, id_lega) VALUES ($id_user, $id_lega)";
                mysqli_query($conn, $insertPartecipanteQuery);
            }
        }

        // Restituisci una risposta di successo
        echo json_encode(['success' => true, 'message' => 'Lega aggiunta con successo.']);
    } else {
        // Restituisci un errore se qualcosa è andato storto
        echo json_encode(['success' => false, 'message' => 'Errore durante l\'aggiunta della lega.']);
    }
}
?>
