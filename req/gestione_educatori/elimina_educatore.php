<?php
include '../../db_connector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);

    $query = "DELETE FROM fs_educatori WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "Eliminazione avvenuta con successo";
    } else {
        echo "Errore nell'eliminazione";
    }

    $stmt->close();
}

$conn->close();
?>
