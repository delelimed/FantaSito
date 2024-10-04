<?php
require_once('../Cryptolens.php');
include '../db_connector.php'; // Assicurati che il percorso sia corretto

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

$query = "SELECT nome_impostazione, valore FROM fs_impostazioni WHERE nome_impostazione IN ('Key_Att', 'machine_code')";
$result = $conn->query($query);

// Inizializza le variabili per la chiave di attivazione e il codice macchina
$activationKey = null;
$machineCode = null;

// Controlla se ci sono risultati e imposta i valori appropriati
if ($result) {
    while ($row = $result->fetch_assoc()) {
        // Verifica il nome dell'impostazione e assegna il valore corrispondente
        if ($row['nome_impostazione'] === 'Key_Att') {
            $activationKey = $row['valore'];
        } elseif ($row['nome_impostazione'] === 'machine_code') {
            $machineCode = $row['valore'];
        }
    }

    // Controlla se abbiamo recuperato entrambe le variabili
    if ($activationKey === null || $machineCode === null) {
        echo "Chiave di attivazione o codice macchina non trovati.";
    }
} else {
    echo "Errore nel recupero della chiave di attivazione o del codice macchina: " . $conn->error;
}

// Ora puoi utilizzare $activationKey e $machineCode nel tuo script


    // Sostituisci i valori di access token, product ID e machine code
    $accessToken = 'WyI5NDg3Njc2NSIsIm5RZnFndU9xbUs3Y3NxR1g0Nzl3UHordlFwMlYyU3c1QWJVVU1MR1UiXQ==';
    $productId = 27532; // ID del prodotto

    // Funzione per attivare la licenza
    function checkActivation($accessToken, $productId, $activationKey, $machineCode) {
        return cryptolens_activate($accessToken, $productId, $activationKey, $machineCode);
    }

    // Controlla la chiave di attivazione
    if (checkActivation($accessToken, $productId, $activationKey, $machineCode)) {
        // Reindirizza alla pagina di login se la chiave è valida
        #header("Location: ../templates/login.php");
        exit();
    } else {
        // Se la chiave non è valida, reindirizza a hehehe.php
        header("Location: key_error.php");
        exit();
    }


$conn->close();
?>
