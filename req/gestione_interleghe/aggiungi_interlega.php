<?php
// Connessione al database
include('../../db_connector.php');

// Controlla se i dati sono stati inviati tramite POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ottieni i dati inviati tramite AJAX
    $nome_interlega = mysqli_real_escape_string($conn, $_POST['nome_interlega']);
    $partecipanti = $_POST['partecipanti']; // Array di ID dei partecipanti

    // Inserisci la nuova lega nella tabella fs_leghe
    $insertinterLegaQuery = "INSERT INTO fs_interleghe (nome_interlega) VALUES ('$nome_interlega')";

    if (mysqli_query($conn, $insertinterLegaQuery)) {
        // Ottieni l'ID della nuova lega
        $id_interlega = mysqli_insert_id($conn);

        // Inserisci i partecipanti
        if (!empty($partecipanti)) {
            foreach ($partecipanti as $id_user) {
                $id_user = intval($id_user); // Assicurati che l'ID sia un numero intero
                $insertPartecipanteQuery = "INSERT INTO fs_appaia_user_interlega (id_user, id_interlega) VALUES ($id_user, $id_interlega)";
                mysqli_query($conn, $insertPartecipanteQuery);
            }
        }

        // Restituisci una risposta di successo
        echo json_encode(['success' => true, 'message' => 'Interlega aggiunta con successo.']);
    } else {
        // Restituisci un errore se qualcosa è andato storto
        echo json_encode(['success' => false, 'message' => 'Errore durante l\'aggiunta della interlega.']);
    }
}
?>
