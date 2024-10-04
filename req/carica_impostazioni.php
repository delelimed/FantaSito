<?php
// Includi il file di connessione al database
require_once '../db_connector.php'; // Assicurati di avere un file di configurazione per la connessione al DB

// Prepara la query per ottenere i valori attuali
$query = "SELECT nome_impostazione, valore FROM fs_impostazioni WHERE nome_impostazione IN ('prezzo_massimo', 'numero_educatori', 'consenti_cambio')";
$result = $conn->query($query);

// Inizializza le variabili per le impostazioni
$impostazioni = [
    'prezzo_massimo' => null,
    'numero_educatori' => null,
    'consenti_cambio' => null,
];

// Controlla se ci sono risultati e imposta i valori appropriati
if ($result) {
    while ($row = $result->fetch_assoc()) {
        if ($row['nome_impostazione'] === 'prezzo_massimo') {
            $impostazioni['prezzo_massimo'] = $row['valore'];
        } elseif ($row['nome_impostazione'] === 'numero_educatori') {
            $impostazioni['numero_educatori'] = $row['valore'];
        } elseif ($row['nome_impostazione'] === 'consenti_cambio') {
            $impostazioni['consenti_cambio'] = $row['valore'];
        }
    }
}

// Restituisci i valori come JSON
echo json_encode(['success' => true] + $impostazioni);
$conn->close();
?>
