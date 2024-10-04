<?php
include '../../db_connector.php'; // Assicurati che il percorso sia corretto

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $educatore = $_POST['educatore'];
    $prezzo = floatval($_POST['prezzo']);

    $query = "INSERT INTO fs_educatori (educatore, prezzo) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sd', $educatore, $prezzo);

    if ($stmt->execute()) {
        echo "Educatore aggiunto con successo";
    } else {
        echo "Errore nell'aggiunta dell'educatore";
    }

    $stmt->close();
}

$conn->close();
?>
