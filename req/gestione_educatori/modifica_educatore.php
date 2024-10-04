<?php
include '../../db_connector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $educatore = $_POST['educatore'];
    $prezzo = floatval($_POST['prezzo']);

    $query = "UPDATE fs_educatori SET educatore = ?, prezzo = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sdi', $educatore, $prezzo, $id);

    if ($stmt->execute()) {
        echo "Modifica avvenuta con successo";
    } else {
        echo "Errore nella modifica";
    }

    $stmt->close();
}

$conn->close();
?>
