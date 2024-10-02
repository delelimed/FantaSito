<?php
session_start();
require '../../db_connector.php'; // Includi il tuo file di connessione al database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']); // Assicurati di filtrare l'input

    // Query per ottenere i dettagli del giocatore, il nome dell'interlega e il nome della lega
    $query = "
        SELECT u.id, u.nome, u.utente, u.cognome, u.admin, 
               i.id_interlega, inter.nome_interlega, 
               l.id_lega, leg.nome_lega 
        FROM fs_users AS u 
        LEFT JOIN fs_appaia_user_interlega AS i ON u.id = i.id_user 
        LEFT JOIN fs_interleghe AS inter ON i.id_interlega = inter.id 
        LEFT JOIN fs_appaia_user_lega AS l ON u.id = l.id_user 
        LEFT JOIN fs_leghe AS leg ON l.id_lega = leg.id 
        WHERE u.id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $giocatore = $result->fetch_assoc();

        // Aggiungi l'ID del giocatore all'array di risposta
        $giocatore['id'] = $giocatore['id']; // Aggiungi l'ID del giocatore

        // Includi anche la lega nel risultato
        $giocatore['id_lega'] = $giocatore['id_lega'] ?? null; // Se non esiste, imposta a null
        $giocatore['nome_lega'] = $giocatore['nome_lega'] ?? 'N/A'; // Se non esiste, mostra N/A

        echo json_encode($giocatore); // Restituisci i dati in formato JSON
    } else {
        echo json_encode(['error' => 'Giocatore non trovato.']);
    }

    $stmt->close();
}
?>
