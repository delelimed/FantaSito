<?php
// Includi il file di connessione al database
require_once '../db_connector.php'; // Assicurati di avere un file di configurazione per la connessione al DB

// Recupera i dati inviati tramite POST
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['prezzo_massimo']) && isset($data['numero_educatori']) && isset($data['consenti_cambio'])) {
    $prezzoMassimo = $data['prezzo_massimo'];
    $numeroEducatori = $data['numero_educatori'];
    $consentiCambio = $data['consenti_cambio'];

    // Prepara la query per eliminare i dati esistenti
    $conn->begin_transaction();

    try {
        // Elimina i valori esistenti per prezzo_massimo, numero_educatori, consenti_cambio
        $deleteQuery = "DELETE FROM fs_impostazioni WHERE nome_impostazione IN ('prezzo_massimo', 'numero_educatori', 'consenti_cambio')";
        $conn->query($deleteQuery);

        // Inserisci il nuovo prezzo massimo
        $query1 = "INSERT INTO fs_impostazioni (nome_impostazione, valore) VALUES ('prezzo_massimo', ?)";
        $stmt1 = $conn->prepare($query1);
        $stmt1->bind_param('s', $prezzoMassimo);
        $stmt1->execute();

        // Inserisci il nuovo numero educatori
        $query2 = "INSERT INTO fs_impostazioni (nome_impostazione, valore) VALUES ('numero_educatori', ?)";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bind_param('s', $numeroEducatori);
        $stmt2->execute();

        // Inserisci la nuova possibilità di modifica
        $query3 = "INSERT INTO fs_impostazioni (nome_impostazione, valore) VALUES ('consenti_cambio', ?)";
        $stmt3 = $conn->prepare($query3);
        $stmt3->bind_param('s', $consentiCambio);
        $stmt3->execute();

        $conn->commit();
        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Dati non validi.']);
}

$conn->close();
?>
