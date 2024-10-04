<?php
require_once('../../db_connector.php'); // Assicurati che il percorso sia corretto

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Controlla se il form è stato inviato
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $activationKey = $_POST['activationKey'];
    $machineCode = $_POST['machineCode'];

    // Rimuovi i valori esistenti per Key_Att e machine_code
    $deleteQuery = "DELETE FROM fs_impostazioni WHERE nome_impostazione IN ('Key_Att', 'machine_code')";
    if ($conn->query($deleteQuery) === TRUE) {
        // Prepara la query per inserire i dati
        $stmt = $conn->prepare("INSERT INTO fs_impostazioni (nome_impostazione, valore) VALUES (?, ?) ON DUPLICATE KEY UPDATE valore = ?");
        $stmt->bind_param('sss', $keyName, $value, $value);

        // Inserisci la chiave di attivazione
        $keyName = 'Key_Att';
        $value = $activationKey;
        if (!$stmt->execute()) {
            echo "Errore nel salvataggio della chiave di attivazione: " . $stmt->error;
        }

        // Inserisci il machine code
        $keyName = 'machine_code';
        $value = $machineCode;
        if (!$stmt->execute()) {
            echo "Errore nel salvataggio del codice macchina: " . $stmt->error;
        }

        // Chiudi la dichiarazione
        $stmt->close();
    } else {
        echo "Errore nel rimuovere i valori esistenti: " . $conn->error;
    }

    // Chiudi la connessione
    $conn->close();

    // Reindirizza a una pagina di successo o al login
    header("Location: ../../templates/login.php");
    exit();
} else {
    echo "Richiesta non valida.";
}
?>
