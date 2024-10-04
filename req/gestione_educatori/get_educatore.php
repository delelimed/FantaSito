<?php
include '../../db_connector.php'; // Assicurati che il percorso sia corretto

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT id, educatore, prezzo FROM fs_educatori WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $row = $result->fetch_assoc()) {
        echo json_encode($row);
    }

    $stmt->close();
}

$conn->close();
?>
